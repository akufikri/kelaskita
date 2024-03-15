<?php

namespace App\Http\Controllers;

use App\Models\JoinKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
// HomeController.php
public function home()
{
    $userCreatedClasses = Kelas::with('joinKelas')->where('user_id', auth()->user()->id)->get();
    
    $userJoinedClasses = JoinKelas::where('siswa_id', auth()->user()->id)->with('kelas')->get();

    return view('Page.home', compact('userCreatedClasses', 'userJoinedClasses'));
}


}