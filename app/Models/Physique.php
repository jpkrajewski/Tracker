<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\CarbonImmutable;
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

    public function scopeUserStrengh($query, $userId)
    {
        return $query->select('weight','benchpress','deadlift','squat','created_at')
                        ->where('user_id', $userId)
                        ->orderBy('created_at','desc');
    }

    public function scopeEstimateDays($query, int $getBetweenFromDay)
    {
        return $query->whereBetween('created_at', [CarbonImmutable::now()->sub($getBetweenFromDay - 4, 'day'), CarbonImmutable::now()->sub($getBetweenFromDay + 2, 'day')]);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
}
