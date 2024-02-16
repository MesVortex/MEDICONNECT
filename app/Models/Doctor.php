<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'userID',
        'specialityID'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'userID');
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class, 'specialityID');
    }

    public function appointement(){
        return $this->hasMany(Appointement::class, 'doctorID');
    }

    public function review(){
        return $this->hasMany(Review::class, 'doctorID');
    }
    public function isFavori($userId)
    {
        return $this->favoris()->where('patientID', $userId)->exists();
    }


}
