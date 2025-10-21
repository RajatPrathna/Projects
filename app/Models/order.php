<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use hasfactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'delivery_address',
        'pin_code',
        'contact_number',
        'total_items',
        'product_ids',
        'status'
    ];  
    public function user(){
       return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
}
