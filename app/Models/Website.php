<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function subscribers() {
        return $this->hasMany(Subscriber::class);
    }
}
