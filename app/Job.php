<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'employer_id', 'salary', 'minimum_degree', 'gender', 'closing_date', 'type', 'status', 'description', 'city'
    ];

}
