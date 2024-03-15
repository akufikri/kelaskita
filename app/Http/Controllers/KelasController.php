<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class KelasController extends Controller
{
   public function create(Request $request)
   {
        $request->validate([
            'nama_kelas' => 'required',
            'deskripsi_kelas' => 'required'
        ]);

      
        $kode_kelas = Str::random(5);

       
        $kelas = new Kelas();
        $user = Auth::user();
        
     
        $kelas->user_id = $user->id;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kode_kelas = $kode_kelas;
        $kelas->deskripsi_kelas = $request->deskripsi_kelas;

        $kelas->save();

        return redirect()->back()->with('success', 'sukses membuat kelas baru');
   }
public function detail_kelas(Request $request, $id)
{
    $decryptedId = Crypt::decrypt($id);
    $kelas = Kelas::findOrFail($decryptedId);
    $tugas = Tugas::where('kelas_id', $kelas->id)->get();
    $url_link = $request->input('url');
    $url_document = $request->input('url_document');

    return view('Page.detail.kelas', compact('kelas','tugas','url_link'));
}
}