<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Argument extends Model {
    
    public function difficulty(){

        return $this->belongsTo(Difficulty::class);
    }

    public function technologies(){

        return $this->belongsToMany(Technology::class);
    }
}
