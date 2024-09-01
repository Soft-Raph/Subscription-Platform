<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function website() {
        return $this->belongsTo(Website::class);
    }

    public function sentPosts()
    {
        return $this->hasMany(SentPost::class, 'subscriber_id');
    }
}
