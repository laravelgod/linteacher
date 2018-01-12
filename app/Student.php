<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'born_at',
        'teacher_id'
    ];

    use SoftDeletes;

    protected $dates = ['born_at', 'deleted_at'];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}
