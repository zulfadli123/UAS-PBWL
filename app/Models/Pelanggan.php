<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan_id',
        'no',
        'nama',
        'hp',
        'ktp',
        'seri',
        'meteran',
        'aktif',
        'user_id',
        'alamat'
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
