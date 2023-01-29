<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'letter_id',
        'agency_id',
        'tgl_surat',
        'no_agenda',
        'tgl_diterima',
        'tgl_penyelesaian',
        'hal',
        'diteruskan_kpd',
        'instruksi',
        'letter_file'
    ];
    // protected $dates = ['tgl_selesai','tgl_aju_kembali','tgl_selesai_2','tgl_selesai_3'];
    protected $hidden = [];

    public function letter()
    {
        return $this->belongsTo(Letter::class, 'letter_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(Agencies::class, 'agency_id', 'id');
    }
}
