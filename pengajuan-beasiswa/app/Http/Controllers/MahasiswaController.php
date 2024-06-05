<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index (){
        return view('pages.mahasiswa.main');
    }

    public function create(Request $request){
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'phone_number' => ['required', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'password' => ['required','min:8'],
            'jurusan' => ['required'],
        ]);

        if ($validation) {
            $user = new User();
            $user->role_id = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->password);
            $user->isActive = true;
            $user->save();

            $mahasiswa = new Mahasiswa();
            $mahasiswa->user_id = $user->id;
            $mahasiswa->jurusan_id = $request->jurusan;
            $mahasiswa->save();

            return redirect()->route('listMahasiswa')->with(['status' => 'success', 'title' => 'Daftar Akun Mahasiswa','message' => 'Pendaftaran akun mahasiswa berhasil']);
        }
    }

    public function edit(Request $request,$id){
        $thisAccount = Mahasiswa::findOrFail($id);
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . $thisAccount->user_id],
            'phone_number' => ['required', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'password' => ['required','min:8'],
            'jurusan' => ['required'],
        ]);

        if ($validation) {
            $mahasiswa = Mahasiswa::find($id)->update([
                'jurusan_id' => $request->jurusan,
            ]);
            $user = User::find($thisAccount->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('listMahasiswa')->with(['status' => 'success', 'title' => 'Edit Akun Mahasiswa','message' => 'Akun mahasiswa berhasil diubah']);
        }
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('listMahasiswa')->with(['status' => 'success', 'title' => 'Delete Akun Mahasiswa','message' => 'Akun mahasiswa berhasil dihapus']);
    }
}
