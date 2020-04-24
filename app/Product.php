<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'outlet_id', 'name', 'type', 'price'
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
