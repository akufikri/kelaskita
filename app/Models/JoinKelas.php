<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas_id',
        'user_id',
        'siswa_id',
        'kode_kelas'
    ];
    protected $table = 'join_kelas';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function siswa_id()
    {
        return $this->belongsTo(User::class,'siswa_id');
    }
}