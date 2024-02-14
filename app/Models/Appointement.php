<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientID',
        'status',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctorID');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patientID');
    }
}
