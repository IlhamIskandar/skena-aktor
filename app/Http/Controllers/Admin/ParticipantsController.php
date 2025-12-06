<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParticipantsController extends Controller
{
    /** LIST USER & MEMBER */
    public function index()
    {
        $participants = User::whereIn('role', ['user', 'member'])
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('admin.participants.index', compact('participants'));
    }

    /** FORM CREATE */
    public function create()
    {
        return view('admin.participants.create');
    }

    /** STORE NEW PARTICIPANT */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'role'      => 'required|in:user,member',
        ]);

        // dump($request->all());
        // die();

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'no_telp'  => $request->no_telp,
        ]);

        return redirect()->route('admin.participants.index')
                         ->with('success', 'Akun peserta berhasil dibuat.');
    }

    /** EDIT FORM */
    public function edit($id)
    {
        $participant = User::findOrFail($id);

        return view('admin.participants.edit', compact('participant'));
    }

    /** UPDATE USER */
    public function update(Request $request, $id)
    {
        $participant = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $participant->id,
            'no_telp'   => 'nullable|string|max:50',
            'role'      => 'required|in:user,member',
        ]);

       $participant->name = $request->name;
        $participant->email = $request->email;
        $participant->role = $request->role;
        $participant->no_telp = $request->no_telp;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $participant->password = Hash::make($request->password);
        }

        $participant->save();

        return redirect()->route('admin.participants.index')
            ->with('success', 'Data peserta berhasil diperbarui!');
    }

    /** DELETE USER */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Peserta berhasil dihapus.');
    }

    /** PROMOTE USER → MEMBER */
    public function promote($id)
    {
        $user = User::findOrFail($id);

        if ($user->role !== 'member') {
            $user->role = 'member';
            $user->save();
        }

        return back()->with('success', 'Peserta telah dipromosikan menjadi Member.');
    }

    /** DEMOTE MEMBER → USER */
    public function demote($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'member') {
            $user->role = 'user';
            $user->save();
        }

        return back()->with('success', 'Akun member diturunkan menjadi peserta biasa.');
    }
}
