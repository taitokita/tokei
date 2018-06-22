<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    public function bijos()
    {
        return $this->hasMany(Bijo::class);
    }
    
    public function bijo()
    {
//        return $this->belongsToMany(Bijo::class)->withPivot('type')->withTimestamps();
        return $this->belongsToMany(Bijo::class);
    }

    public function like_bijos()
    {
        return $this->bijos()->where('type', 'like');
    }

    public function like($bijoId)
    {
        // Is the user already "like"?
        $exist = $this->is_likeing($bijoId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "like"
            $this->bijos()->attach($bijoId, ['type' => 'like']);
            return true;
        }
    }

    public function dont_like($bijoId)
    {
        // Is the user already "like"?
        $exist = $this->is_likeing($bijoId);

        if ($exist) {
            // remove "like"
            \DB::delete("DELETE FROM bijo_user WHERE user_id = ? AND bijo_id = ? AND type = 'like'", [\Auth::id(), $bijoId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_likeing($bijoIdOrId)
    {
        if (is_numeric($bijoIdOrId)) {
            $bijo_id_exists = $this->like_bijos()->where('id', $bijoIdOrId)->exists();
            return $bijo_id_exists;
        } else {
            $bijo_id_exists = $this->like_bijos()->where('id', $bijoIdOrId)->exists();
            return $bijo_id_exists;
        }
    }
}
