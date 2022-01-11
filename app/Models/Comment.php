<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Article;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    public function articles() {
        return $this->belongsTo(Article::class);
    }

    public function comments() {
        return $this->belongsTo(User::class);
    }
}
