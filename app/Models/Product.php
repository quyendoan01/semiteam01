<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo('App\Models\Category', 'cat_id');

    }

    public $fillable = [
        'cat_id','pro_name','unit_price','pro_quantity','pro_origin','pro_discount'
    ];
}
