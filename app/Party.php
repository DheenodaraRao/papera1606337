<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'id', 
        'name'
    ];
    
    public function candidates(){
        return $this->hasMany('App\Candidate');
    }
}
