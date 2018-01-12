<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'professional',
        'url',
        'employed_at'
    ];

    use SoftDeletes;

    protected $dates = ['employed_at', 'deleted_at'];

    public function setEmployedAtAttribute($date) {
        $this->attributes['employed_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopeUnemployed($query) {
        $query->where('employed_at', '>', Carbon::now());
    }

    public function scopeEmployed($query) {
        $query->where('employed_at', '<=', Carbon::now());
    }

    public function students() {

        return $this->hasMany('App\Student');

    }
}
