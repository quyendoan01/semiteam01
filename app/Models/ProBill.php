<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProBill extends Model
{
    use HasFactory;

    protected $table = 'pro-bill';

    protected $fillable = [
        'pro_id','bill_id','pro_amount','pro_cur_price'
    ];
}
