<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function doctor(){
        return $this->hasMany(Doctor::class, 'specialityID');
    }
    
    public function medicin(){
        return $this->hasMany(Medicin::class, 'specialityID');
    }
}
