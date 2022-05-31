<?php

namespace App\Models;

use App\Models\SPP;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Month extends Model
{
    use HasFactory;
    protected $table = "month";

    protected $fillable =
    [
        'id',
        'nama_bulan',
    ];

    public function spps(){
        return $this->hasMany(SPP::class, 'id_bulan');
    }
}
