<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['id_subscriber', 'id_site'];
    public $timestamps = false;

    public function site()
    {
        return $this->belongsTo(Site::class, 'id_site');
    }

    public function susbscriber()
    {
        return $this->belongsTo(Susbscriber::class, 'id_subscriber');
    }
}
