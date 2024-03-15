<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_kelas',
        'deskripsi_kelas',
        'kode_kelas'
    ];
    protected $table = 'kelas';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function joinKelas()
{
    return $this->hasMany(JoinKelas::class, 'kelas_id');
}
}