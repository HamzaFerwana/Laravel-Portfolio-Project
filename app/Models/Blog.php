<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function replies() {
        return $this->hasMany(Reply::class);
    }
}
