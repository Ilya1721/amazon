<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function items()
    {
      return $this->belongsToMany(Item::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
