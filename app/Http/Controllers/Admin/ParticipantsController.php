<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    /** LIST USER & MEMBER */
    public function index()
    {
        $users = User::whereIn('role', ['user', 'member'])
                      ->orderBy('name')
                      ->paginate(10);

        return view('admin.participants.index', compact('users'));
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
            'name'      => 'required|string|max:200',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'no_telp'   => 'nullable|string|max:20',
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'no_telp'   => $request->no_telp,
            'role'      => 'user',
        ]);

        return redirect()->route('admin.participants.index')
                         ->with('success', 'Akun peserta berhasil dibuat.');
    }

    /** EDIT FORM */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.participants.edit', compact('user'));
    }

    /** UPDATE USER */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:200',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'no_telp'   => 'nullable|string|max:20',
        ]);

        $data = $request->only('name', 'email', 'no_telp');

        if ($request->password) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.participants.index')
                         ->with('success', 'Data peserta berhasil diperbarui.');
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
