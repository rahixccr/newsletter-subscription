<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id_site', 'title', 'body', 'sent'];

    public function site()
    {
        return $this->belongsTo(Site::class, 'id_site');
    }

    public function recipients()
    {
        return $this->belongsToMany(Susbscriber::class, 'sent_history', 'id_post', 'id_subscriber');
    }
}
