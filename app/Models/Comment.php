<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function blog() {
        return $this->belongsTo(Blog::class)->withDefault();
    }
}
