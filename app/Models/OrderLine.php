<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $primaryKey = "id";

    protected $table = "order_lines";
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
    ];
}
