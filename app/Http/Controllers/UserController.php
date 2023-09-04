<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admin = Auth::user();
        $users = User::all();

        return view('admin.manage-user.data-user')->with([
            'admin' => $admin,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $admin = Auth::user();

        return view('admin.manage-user.add-user')->with([
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $fotoName = $data['foto']->getClientOriginalName() . '-' . time() . '.' .$data['foto']->extension();
        $data['foto']->move(public_path('img/profile', $fotoName));

        User::create([
            'nama' => $data['nama'],
            'penempatan' => $data['penempatan'],
            'foto' => $fotoName,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'role' => 'karyawan',
        ]);

        return redirect()->route('manage-users.index')->with('success', 'Data Management User Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
