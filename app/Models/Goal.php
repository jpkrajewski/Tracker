<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description', 
        'status',
    ];

    protected $attributes = [ 
        'status' => 'active' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDoneInTimeAttribute()
    {
        return Carbon::create($this->updated_at)->diffForHumans(Carbon::create($this->created_at));
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status)->orderBy('updated_at', 'DESC');
    }
}
