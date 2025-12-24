<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model {
    
    public function argument(){

        return $this->hasMany(Argument::class);
    }
}
