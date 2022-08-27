<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    //create an arbitrary formatted amount attribute
    public function getAmountAttribute()
    {
        return 'N'.number_format($this->attributes['amount_paid'], 2);
    }

    //create an arbitrary formatted ref. attribute
    public function getRefAttribute()
    {
        return '#'.$this->attributes['uid'];
    }
}
