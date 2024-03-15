<?php

namespace App\Http\Controllers;

use App\Models\JoinKelas;
use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JoinKelasController extends Controller
{
public function join(Request $request)
{
    $request->validate([
        'kode_kelas' => 'required',
    ]);

   
    $kelas = Kelas::where('kode_kelas', $request->kode_kelas)->first();

    if (!$kelas) {
        return redirect()->back()->with('error', 'Kode kelas tidak valid.');
    }

    $siswa = auth()->user();
    $joinKelas = new JoinKelas();
    $joinKelas->kelas_id = $kelas->id;
    $joinKelas->user_id = $kelas->user_id; // Mengambil user_id dari tabel Kelas
    $joinKelas->siswa_id = $siswa->id; // Misalnya, Anda ingin menyimpan ID siswa dari user yang sedang login
    $joinKelas->kode_kelas = $request->kode_kelas;
    $joinKelas->save();

    // Berikan respons atau redirect sesuai kebutuhan
    return redirect()->back()->with('success', 'Anda berhasil bergabung dengan kelas.');
}

public function detail_join($id)
{
    $decryptedId = Crypt::decrypt($id);
    $kelas = Kelas::findOrFail($decryptedId);
    $tugas = Tugas::where('kelas_id', $kelas->id)->get();
    return view('Page.detail.join', compact('kelas','tugas'));
}




}