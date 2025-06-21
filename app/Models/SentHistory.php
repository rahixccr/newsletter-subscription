<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentHistory extends Model
{
    protected $table = 'sent_history';

    protected $fillable = ['id_post', 'id_subscriber'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function susbscriber()
    {
        return $this->belongsTo(Susbscriber::class, 'id_subscriber');
    }
}
