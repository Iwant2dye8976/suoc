<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'price'
    ];
    /*public function product(){ //Sử dụng khi thao tác với Store
        return $this->hasMany(Product::class);
    } */
}
