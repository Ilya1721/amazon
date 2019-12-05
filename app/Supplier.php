<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];

    public function country()
    {
      return $this->belongsTo(Country::class);
    }
}
