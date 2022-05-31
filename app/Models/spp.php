<?php

namespace App\Models;

use App\Models\Month;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SPP extends Model
{
    use HasFactory;
    protected $table = "spps";

    protected $fillable =
    [
        'id',
        'id_siswa',
        'id_bulan',
        'nominal',
    ];

    public function bulan(){
        return $this->belongsTo(Month::class);
    }
}
