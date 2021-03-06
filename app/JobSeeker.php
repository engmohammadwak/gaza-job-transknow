<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;

class JobSeeker extends Authenticatable
{
    use Notifiable;

    protected $table = 'job_seekers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstName', 'lastName', 'email', 'password', 'verified'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute() {
        return "$this->firstName  $this->lastName";
    }

    public function information() {
        return $this->hasOne(JobSeekerInformation::class);
    }
    public function socials() {
        return $this->hasOne(JobSeekerSocial::class);
    }
    public function verify() {
        return $this->hasOne(JobSeekerVerify::class);
    }
    public function education() {
        return $this->hasMany(JobSeekerEducation::class);
    }
    public function experience() {
        return $this->hasMany(JobSeekerExperience::class);
    }
    public function training() {
        return $this->hasMany(JobSeekerTraining::class);
    }
    public function teamLeader() {
        return $this->belongsTo(Team::class, 'id', 'leader_id');
    }
    public function team() {
        return $this->belongsToMany(Team::class, 'team_members', 'job_seeker_id');
    }

    public function ScopeVerified()
    {
        return $this->where('verified', 1);
    }
    public function ScopeNotVerified()
    {
        return $this->where('verified', 0);
    }


}
