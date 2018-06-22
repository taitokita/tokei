<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bijo extends Model
{
    protected $fillable = [ 'status','content', 'user_id','path','type'];

    public function users()
    {
//        return $this->belongsTo(User::class)->withPivot('type')->withTimestamps();
          return $this->belongsToMany(User::class);
    }

    public function like_users()
    {
        return $this->where('type', 'like');
    }
}