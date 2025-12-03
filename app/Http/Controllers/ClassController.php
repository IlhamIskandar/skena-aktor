<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /** LIST VIEW */
    public function index()
    {
        $classes = Classes::latest()->paginate(10);
        return view('admin.classes.index', compact('classes'));
    }

    /** CREATE VIEW */
    public function create()
    {
        return view('admin.classes.create');
    }

    /** STORE CLASS */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'mentor'            => 'nullable|string|max:255',
            'day_of_week'       => 'nullable|string',
            'start_time'        => 'nullable',
            'end_time'          => 'nullable',
            'start_date'        => 'nullable|date',
            'duration_weeks'   => 'required|integer|min:1',
            'price'             => 'required|numeric|min:0',
            'max_participant'   => 'required|integer|min:1',
            'status'            => 'required|in:upcoming,ongoing,finished',
            'description'       => 'nullable|string'
        ]);

        Classes::create($request->all());

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Kelas berhasil ditambahkan!');
    }

    /** EDIT VIEW */
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $users = User::all();
        $enrolledUsers = Enrollment::where('id_class', $id)->with('user')->get();

        return view('admin.classes.edit', compact('class', 'users', 'enrolledUsers'));
    }

    /** UPDATE CLASS */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'mentor'            => 'nullable|string|max:255',
            'day_of_week'       => 'nullable|string',
            'start_time'        => 'nullable',
            'end_time'          => 'nullable',
            'start_date'        => 'nullable|date',
            'duration_weeks'   => 'required|integer|min:1',
            'price'             => 'required|numeric|min:0',
            'max_participant'   => 'required|integer|min:1',
            'status'            => 'required|in:upcoming,ongoing,finished',
            'description'       => 'nullable|string'
        ]);

        $class = Classes::findOrFail($id);
        $class->update($request->all());

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Data kelas berhasil diperbarui!');
    }

    /** DELETE CLASS */
    public function destroy($id)
    {
        Classes::findOrFail($id)->delete();

        return redirect()
            ->route('admin.classes.index')
            ->with('success', 'Kelas berhasil dihapus!');
    }

    /** STORE ENROLL PESERTA KE KELAS */
    public function enrollStore(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        // Cek apakah sudah terdaftar
        $already = Enrollment::where('id_user', $request->id)
                             ->where('id_class', $id)
                             ->exists();

        if ($already) {
            return back()->with('error', 'Peserta sudah terdaftar di kelas ini.');
        }

        Enrollment::create([
            'id_user'     => $request->id,
            'id_class'    => $id,
            'status'      => 'approved',
            'progress'    => 0,
            'enrolled_at' => now(),
        ]);

        return back()->with('success', 'Peserta berhasil ditambahkan ke kelas.');
    }

    /** REMOVE STUDENT FROM CLASS */
    public function enrollRemove(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        Enrollment::where('id_user', $request->id)
                  ->where('id_class', $id)
                  ->delete();

        return back()->with('success', 'Peserta dihapus dari kelas.');
    }
}
