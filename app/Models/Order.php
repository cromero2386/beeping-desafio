<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $table = "orders";
    protected $fillable = [
        'order_ref',
        'customer_name',
    ];

    /**
     * Get the order lines
     */
    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'order_id', 'id');
    }
}
