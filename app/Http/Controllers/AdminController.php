<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Visitor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {  

        $jumlahBuku = Buku::count();
        $jumlahAnggota = User::count();
        $monthlyVisitors = Visitor::monthlyVisitors();
        $yearlyVisitors = Visitor::yearlyVisitors();

        return view('dashboard/main', [
            'jumlahBuku' => $jumlahBuku,
            'jumlahAnggota' => $jumlahAnggota,
            'monthlyVisitors' => $monthlyVisitors,
            'yearlyVisitors' => $yearlyVisitors
        ]);
    
    }

    function buku()
    {   
        $buku = Buku::all(); 
        return view('dashboard/buku', compact('buku')); 
    }

    function member()
    {   
        $user = User::all(); 
        return view('dashboard/member/anggota', compact('user')); 
    }

    function create()
    {    
        $user = User::all(); 
        return view('dashboard/member/hire');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $username = $request->input('name');

        $user = new User([
            'name' => $username,
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin',
        ]);

        $user->save();

        return redirect()->route('member')->with('success',  'Berhasil menambah ' . $username . '.');
    }

    function edit($id)
    {   
        $user = User::findOrFail($id);
        return view('dashboard/member/edit', compact('user')); 
    }

   function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $generatedPassword,
        ]);

        return redirect()->route('member')->with('success', 'Akun berhasil diperbarui.');
    }

    function destroy($id)
    {
        $user = User::findOrFail($id);
        $namaPengguna = $user->name;

        // Delete the book record from the database
        $user->delete();

        return redirect()->route('member')->with('success', $namaPengguna . ' berhasil dihapus');
    }

}
