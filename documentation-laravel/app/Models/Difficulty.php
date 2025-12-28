<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model {
    
    public function arguments(){

        return $this->hasMany(Argument::class);
    }
}
