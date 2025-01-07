<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_option_id', 'quantity'];

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class);
    }
}
