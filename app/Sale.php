<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsToMany(User::class);
    }

    public function items()
    {
      return $this->belongsToMany(Item::class);
    }
}
