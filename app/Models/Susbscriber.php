<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Susbscriber extends Model
{
    protected $fillable = ['email', 'name'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'id_subscriber');
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'subscriptions', 'id_subscriber', 'id_site');
    }

    public function sentPosts()
    {
        return $this->belongsToMany(Post::class, 'sent_history', 'id_subscriber', 'id_post');
    }
}
