<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailorder extends Model
{
    protected $table = 'detail_order';
    protected $fillable = ['order_id','product_id','qty','harga_id'];
}
