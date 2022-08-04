<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profil';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class)->withTrashed();
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class)->withTrashed();
    }

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class)->withTrashed();
    }

    public function getTanggalLahirAttribute($value)
    {
        return $this->attributes['tanggal_lahir'] = Carbon::parse($value)->format('d-m-Y');
    }
}
