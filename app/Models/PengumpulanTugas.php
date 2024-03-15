<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;
       protected $fillable = [
        'user_id',
        'tugas_id',
        'kelas_id',
        'file_submisson',
        'nilai',
    ];
    
    protected $table = 'pengumpulan_tugas';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}