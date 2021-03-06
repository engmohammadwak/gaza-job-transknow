<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'applicationable_id', 'applicationable_type'];

    public function applicationable()
    {
        return $this->morphTo();
    }
    public function jobSeeker() {
        return $this->belongsTo(JobSeeker::class);
    }

    public function scopeJobs($query)
    {
        return $query->where('applicationable_type', 'App\Job');
    }
    public function scopeTrainings($query)
    {
        return $query->where('applicationable_type', 'App\Training');
    }
}
