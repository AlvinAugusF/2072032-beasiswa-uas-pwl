<?php

namespace App\Http\Controllers;

use App\Models\KategoriBeasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function create(Request $request){
        $validation = $request->validate([
            'create_name' => ['required'],
        ]);
        if($validation){
            KategoriBeasiswa::insert([
                "name" => $request->create_name,
            ]); 
            return redirect()->route('listBeasiswa')->with(['status'=> 'success','message'=> 'Data beasiswa berhasil dibuat']);
        }
    }
    public function edit(Request $request, $id){
        $validation = $request->validate([
            'edit_name' => ['required'],
        ]);
        if($validation){
            $beasiswa = KategoriBeasiswa::find($id)->update([
                'name' => $request->edit_name
            ]);
            return redirect()->route('listBeasiswa')->with(['status'=> 'success','message'=> 'Data beasiswa berhasil diedit']);
        }
    
    }
    public function delete($id){
        $beasiswa = KategoriBeasiswa::findOrFail($id);
        $beasiswa->delete();
        return back()->with(['status'=> 'success','message'=> 'Data beasiswa berhasil dihapus']);;
    }
}
