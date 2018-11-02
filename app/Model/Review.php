<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = ['start', 'customer', 'review'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
