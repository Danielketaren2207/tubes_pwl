<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_pangkal extends Model
{
    use HasFactory;

    protected $table = "uang_pangkal";

    protected $fillable =
    [
        'id',
        'id_siswa',
        'nominal',
    ];
}
