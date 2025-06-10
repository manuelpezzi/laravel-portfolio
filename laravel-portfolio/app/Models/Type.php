<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Type extends Model
{
     protected $fillable = ['name', 'description'];

    // Relazione one-to-many con Project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

  
   
}
