<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Pest\Laravel\post;
use App\Models\productimg;

class product extends Model

{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        "product_name",
        "category",
        "price",
        "stock",
        "weight",
        "description",
        "status",
        "type"
    ];

    public function images()
    {
        return $this->hasMany(productimg::class,'product_id');
    }

    //for orders table relation
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }

    public function cart(){
        return $this->hasMany(cart::class,'product_id');
    }

}
