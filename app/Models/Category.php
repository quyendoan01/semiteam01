<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $primaryKey = 'id';

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    protected $fillable = [
        'cat_name'
    ];
<<<<<<< HEAD
=======

>>>>>>> df4c2f1c0071e6b21cc049277395c7d03eedc9e3
}
