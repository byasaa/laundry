<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
