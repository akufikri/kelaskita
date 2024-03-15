<?php

namespace App\Http\Controllers;

use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanTugasController extends Controller
{
public function preview($id)
{
    $tugas = Tugas::find($id);
    $pengumpulanTugas = PengumpulanTugas::where('tugas_id', $tugas->id)
        ->where('siswa_id', Auth::user()->id)
        ->first();

    if ($pengumpulanTugas) {
        $status = 'Tugas tuntas';
    } else {
        $status = 'Tugas belum tuntas';
    }

    return view("Page.detail.pengumpulan", compact("tugas", "status","pengumpulanTugas"));
}

      public function pengumpulan(Request $request, $id)
    {
        $request->validate([
            'file_submisson' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,doc,docx|max:2048',
        ]);

      $tugas = Tugas::find($id);
      // Move the uploaded file to the public directory
      $fileName = time() . '_' . $request->file('file_submisson')->getClientOriginalName();
      $request->file('file_submisson')->move(public_path('fotoStoreTugas'), $fileName);
      
        $pengumpulanTugas = new PengumpulanTugas();
        $pengumpulanTugas->user_id = $tugas->user_id;
        $pengumpulanTugas->tugas_id = $tugas->id;
        $pengumpulanTugas->kelas_id = $tugas->kelas_id;
        $pengumpulanTugas->siswa_id = Auth::user()->id; // Assuming you have a 'siswa_id' field
        $pengumpulanTugas->file_submisson = $fileName;
        $pengumpulanTugas->save();

        return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan.');
    }
}