<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';

    protected $primaryKey = 'id';

    public function product(){
        return $this->belongsTo('App\Models\Product', 'pro_id');

    }

    public $fillable = [
        'img_infor','pro_id'
    ];
}
