<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProgramStudiController extends Controller
{
    public function index (){
        return view('pages.program_studi.main');
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

            $dekan = new ProgramStudi();
            $dekan->user_id = $user->id;
            $dekan->program_studi_id = $request->jurusan;
            $dekan->save();

            return redirect()->route('listPStudi')->with(['status' => 'success', 'title' => 'Daftar Akun Program Studi','message' => 'Pendaftaran akun program studi berhasil']);
        }
    }

    public function edit(Request $request,$id){
        $thisAccount = ProgramStudi::findOrFail($id);
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . $thisAccount->user_id],
            'phone_number' => ['required', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'password' => ['required','min:8'],
            'jurusan' => ['required'],
        ]);
    
        if ($validation) {
            $dekan = ProgramStudi::find($id)->update([
                'program_studi_id' => $request->jurusan,
            ]);
            $user = User::find($thisAccount->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('listPStudi')->with(['status' => 'success', 'title' => 'Edit Akun Program Studi','message' => 'Akun program studi berhasil diubah']);
        }
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('listPStudi')->with(['status' => 'success', 'title' => 'Delete Akun Program Studi','message' => 'Akun program studi berhasil dihapus']);
    }
}
