<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clerk extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','emirate','education','dob','verified','jop_id','status','summury'];

    public function detail(){
        return $this->hasOne(Detail::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
    public function families(){
        return $this->hasMany(Family::class);
    }

    public function jop(){
        return $this->belongsTo(Jop::class);
    }
}
