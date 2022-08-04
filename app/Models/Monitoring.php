<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitoring';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class)->withTrashed();
    }

    public function getTanggalUploadAttribute($value)
    {
        return $this->attributes['tanggal_upload'] = Carbon::parse($value)->format('d-m-Y');
    }
}
