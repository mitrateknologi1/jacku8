<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BahanAjar extends Model
{
    use HasFactory;

    protected $table = 'bahan_ajar';
    // protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class)->withTrashed();
    }

    public function getTanggalUploadAttribute($value)
    {
        return $this->attributes['tanggal_upload'] = Carbon::parse($value)->format('d-m-Y');
    }
}
