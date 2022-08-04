<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;

    protected $table = "pengabdian";

    public function skemaPengabdian()
    {
        return $this->belongsTo(SkemaPengabdian::class)->withTrashed();
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class)->withTrashed();
    }
}
