<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

    public function carts()
    {
      return $this->belongsToMany(Cart::class);
    }

    public function sales()
    {
      return $this->belongsToMany(Sale::class);
    }

    public function orders()
    {
      return $this->belongsToMany(Order::class);
    }
}
