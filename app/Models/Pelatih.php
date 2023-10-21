<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;

    protected $table = "pelatihs";

    protected $fillable = [
        'nama',
        'nama_lengkap',
        'no_wa',
        'foto',
    ];
}
