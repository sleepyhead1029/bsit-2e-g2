<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name','category','unit','in_stock','on_order','image'];

    public $timestamps = false;
}
