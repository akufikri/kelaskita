<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    
    protected $fillable = [ 
        'kelas_id',
        'user_id',
        'nama_tugas',
        'upload',
        'deskripsi_tugas'
    ];
    protected $table = 'tugas';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
// Model Tugas
public function getFileInformation()
{
    return json_decode($this->file_info, true);
}

}