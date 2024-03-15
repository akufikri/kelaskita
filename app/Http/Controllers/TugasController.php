<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PengumpulanTugas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TugasController extends Controller
{
public function create_tugas(Request $request, $id)
{
    $request->validate([
        'nama_tugas' => 'required',
        'deskripsi_tugas' => 'required',
        'upload' => 'required|mimes:jpeg,png,jpg,gif,doc,docx,pdf|max:2048', // Add document file types (e.g., doc, docx, pdf)
    ]);

    // Decrypt the class ID
    $kelasId = Crypt::decrypt($id);

    $kelas = Kelas::find($kelasId);

    if (!$kelas) {
        return redirect()->back()->with('error', 'Class not found.');
    }

    // Move the uploaded file to the public directory
    $fileName = time() . '_' . $request->file('upload')->getClientOriginalName();
    $request->file('upload')->move(public_path('uploadTugas'), $fileName);

    // Create a new Tugas instance
    $tugas = new Tugas();
    $tugas->kelas_id = $kelas->id;
    $tugas->user_id = auth()->user()->id;
    $tugas->nama_tugas = $request->input('nama_tugas');
    $tugas->deskripsi_tugas = $request->input('deskripsi_tugas');
    $tugas->upload = $fileName;
    $tugas->save();

    return redirect()->back()->with('success', 'Tugas berhasil dibuat.');
}

public function index()
{
    $user = Auth::user();
    $pengumpulan = PengumpulanTugas::with('user', 'kelas', 'tugas')->where('user_id', $user->id)->get();

    return view('Page.tugas', compact('pengumpulan'));
}
public function updateNilai(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'nilai' => 'required|numeric',
    ]);

    // Find the PengumpulanTugas record by ID
    $pengumpulan = PengumpulanTugas::findOrFail($id);

    // Update the nilai field
    $pengumpulan->update(['nilai' => $request->nilai]);

    // Redirect back with a success message or any other logic
    return redirect()->back()->with('success', 'Nilai updated successfully');
}

public function send_url(Request $request)
{
    $request->input('url');

    return redirect()->back();
}
public function deleteTugas($id)
{
        $data = Tugas::find($id);
        $data->delete($id);

        return redirect()->back()->with('success', 'sukses menghapus data');
}
}