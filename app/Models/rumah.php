<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rumah extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat',
        'kamar_tidur',
        'desa_id',
        'pemilik_id'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function pemilik()
    {
        return $this->belongsTo(pemilik::class);
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
