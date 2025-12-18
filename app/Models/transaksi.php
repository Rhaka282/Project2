<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'rumah_id',
        'nama_penyewa',
        'tanggal_sewa',
        'harga_sewa',
    ];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
