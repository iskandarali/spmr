<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantities'];

    protected static function booted()
    {
        static::creating(function ($submission) {
            $submission->order_no = RunningNumber::generate('SKU');
        });
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
