<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   
     protected $table = 'customer';
     protected $primaryKey = 'id';
     public function customer(){
         return $this->belongsTo('App\Models\Customer','customer_id');
     }
     
     protected $fillable = [
        'cus_name',
        'cus_address',
        'cus_email',
        'cus_phone',
        
    ];
}
