<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('admin.manage-user.index')->with([
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

        return view('admin.manage-user.create')->with([
            'admin' => $admin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $fotoName = $data['foto']->getClientOriginalName() . '-' . time() . '.' .$data['foto']->extention();
        $data['foto']->move(public_path('img/profile', $fotoName));

        User::create([
            'nama' => $data['nama'],
            'penempatan' => $data['penempatan'],
            'foto' => $fotoName,
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role'],
        ]);
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
