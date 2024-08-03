<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id','transaction_id','status'];
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    
}
