<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    public function kategoriBerita()
    {
        return $this->belongsTo(KategoriBerita::class)->withTrashed();
    }

    public function getTanggalAttribute($value)
    {
        return $this->attributes['tanggal'] = Carbon::parse($value)->format('d-m-Y');
    }
}
