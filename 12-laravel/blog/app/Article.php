<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['date'];

    public function scopeUser($query, $userId){
            return $query->where('user_id', '=' , $userId);
    }

    public function getAll(int $userId = null)
    {
        $query = static::query()->orderByDesc('date');

        if($userId != null){
            $query->user($userId);
        }

        return $query->get();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
