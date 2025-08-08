<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Pest\Laravel\post;

class Product extends Model

{
    use HasFactory;
    protected $fillable = [
        "product_name",
        "category",
        "price",
        "stock",
        "weight",
        "description",
        "image",
        "status"
    ];
}
