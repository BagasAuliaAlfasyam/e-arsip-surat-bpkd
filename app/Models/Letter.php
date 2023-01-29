<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_no',
        'letter_date',
        'date_received',
        'agenda_no',
        'regarding',
        'disposisi',
        'agency_id',
        'sender_id',
        'letter_file',
        'letter_type'
    ];

    protected $hidden = [

    ];
    // protected $dates = ['letter_date','date_received'];

    public function agency()
    {
        return $this->belongsTo(Agencies::class, 'agency_id','id');
    }

    public function sender()
    {
        return $this->belongsTo(Sender::class, 'sender_id','id');
    }
    
}
