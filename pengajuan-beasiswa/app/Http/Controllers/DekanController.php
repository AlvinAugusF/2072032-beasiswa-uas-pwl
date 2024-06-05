<?php

namespace App\Http\Controllers;

use App\Models\Dekan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DekanController extends Controller
{
    public function index (){
        return view('pages.dekan.main');
    }
    public function create(Request $request){
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'phone_number' => ['required', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'password' => ['required','min:8'],
            'fakultas' => ['required'],
            'status' => ['required'],
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

            $dekan = new Dekan();
            $dekan->user_id = $user->id;
            $dekan->fakultas_id = $request->fakultas;
            $dekan->status = $request->status;
            $dekan->save();

            return redirect()->route('listDekan')->with(['status' => 'success', 'title' => 'Daftar Akun Dekan','message' => 'Pendaftaran akun dekan berhasil']);
        }
    }

    public function edit(Request $request,$id){
        $thisAccount = Dekan::findOrFail($id);
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . $thisAccount->user_id],
            'phone_number' => ['required', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'password' => ['required','min:8'],
            'fakultas' => ['required'],
            'status' => ['required'],
        ]);
    
        if ($validation) {
            $dekan = Dekan::find($id)->update([
                'fakultas_id' => $request->fakultas,
                'status' => $request->status,
            ]);
            $user = User::find($thisAccount->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('listDekan')->with(['status' => 'success', 'title' => 'Edit Akun Dekan','message' => 'Akun dekan berhasil diubah']);
        }
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('listDekan')->with(['status' => 'success', 'title' => 'Delete Akun Dekan','message' => 'Akun dekan berhasil dihapus']);
    }
}
