<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    protected $table = 'category';

    protected $primaryKey = 'id';

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    protected $fillable = [
        'cat_name'
    ];
>>>>>>> e1482334f4e53ae18a1167b986fb73fb75b61fad
}
