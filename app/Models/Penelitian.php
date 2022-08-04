<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;
    protected $table = "penelitian";


    public function skemaPenelitian()
    {
        return $this->belongsTo(SkemaPenelitian::class)->withTrashed();
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class)->withTrashed();
    }
}
