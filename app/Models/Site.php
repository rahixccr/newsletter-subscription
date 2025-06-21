<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['name', 'url', 'active'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_site');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'id_site');
    }

    public function susbscribers()
    {
        return $this->belongsToMany(Susbscriber::class, 'subscriptions', 'id_site', 'id_subscriber');
    }
}
