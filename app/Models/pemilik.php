<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'telepon',
    ];

    public function rumahs()
    {
        return $this->hasMany(Rumah::class);
    }
}
