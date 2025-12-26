<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model {

    public function arguments(){

        return $this->belongsToMany(Argument::class);
    }
}