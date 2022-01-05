<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthday',
        'thirties_date',
        'deathday',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function physiques()
    {
        return $this->hasMany(Physique::class);
    }

    public function getBirthdayAttribute($value)
    {
        return Carbon::create($value);
    }

    public function getDeathdayAttribute($value)
    {
        return Carbon::create($value);
    } 

    public function getThirtiesDateAttribute($value)
    {
        return Carbon::create($value);
    }

    public function getLifePercentUsedAttribute()
    {
        return 100 - $this->lifePercentRest;  
    }

    public function getLifePercentRestAttribute()
    {
        $full = $this->birthday->diffInYears($this->deathday);
        $passed = Carbon::now()->diffInYears($this->deathday);

        return round($passed * 100 / $full);
    }

    public function getDaysToThirtiesAttribute()
    {
        return Carbon::now()->diffInDays($this->thirties_date);
    }

    public function getDaysSinceBirthAttribute()
    {
        return $this->birthday->diffInDays(Carbon::now());
    }

    public function getLifePercentUsedToThirtiesAttribute()
    {
        return 100 - $this->lifePercentToThirtiesRest;  
    }

    public function getLifePercentRestToThirtiesAttribute()
    {
        $full = $this->birthday->diffInYears($this->thirties_date);
        $passed = Carbon::now()->diffInYears($this->thirties_date);

        return round($passed * 100 / $full);
    }
}
