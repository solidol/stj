<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use stdClass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function userable()
    {
        return $this->morphTo();
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isTeacher()
    {
        return $this->hasRole('teacher');
    }

    public function isCurator()
    {
        return $this->hasRole('curator');
    }

    public function isDispatcher()
    {
        return $this->hasRole('dispatcher');
    }

    public function isStudent()
    {
        return $this->hasRole('student');
    }

    public function isDPScriber()
    {
        return $this->hasRole('dpscriber');
    }

    public function hasRole($role = false)
    {
        if (!$role) return false;
        $roles = explode(',', $this->roles);
        if (in_array($role, $roles)) return true;
        else return false;
    }

    public static function teachers()
    {
        return User::with('userable')->
        join('prepod', 'prepod.kod_prep', '=', 'users.userable_id')->
        where('userable_type', 'App\Models\Teacher')->orderBy('prepod.FIO_prep', 'asc')->get();
    }
    public static function students()
    {
        return User::with('userable')->
        join('spisok_stud', 'spisok_stud.kod_stud', '=', 'users.userable_id')->
        where('userable_type', 'App\Models\Student')->orderBy('spisok_stud.FIO_stud', 'asc')->get();
    }
    public function logins()
    {
        return $this->hasMany(Log::class);
    }
    public function lastLogin()
    {
        if ($this->logins) {
            return $this->logins->last();
        } else {
            return false;
        }
    }

    public function getShortObj(){
        
        $toObj = (object)[];

        $toObj->id = $this->id; 
        $toObj->name = $this->name; 
        $toObj->email = $this->email; 
        $toObj->roles = $this->roles; 
        $toObj->userable = (object)[];
        $toObj->userable->id = $this->userable->id;
        $toObj->userable->fullname = $this->userable->fullname;
        $toObj->userable->shortname = $this->userable->shortname;

        
        if ($this->isStudent()){
            $toObj->userable->group = (object)[];
            $toObj->userable->group->id = $this->userable->group->kod_grup;
            $toObj->userable->group->title = $this->userable->group->title;
        }

        return $toObj;
    }
}
