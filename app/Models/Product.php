<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function categorie(){
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

}
