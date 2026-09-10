<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'reviewer_name',
        'rating_score',
        'comment',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}