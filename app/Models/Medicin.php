<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'specialityID',
        'status',
    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class, 'specialityID');
    }
}
