<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Physique extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'weight',
        'deadlift',
        'benchpress',
        'squat',
        'comment',
    ];

    protected $with = [
        'images',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
