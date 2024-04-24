<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Comment extends Model
{
    use HasFactory;

    public function addLike(User $user)
    {
        Redis::sadd('comments.' . $this->id . '.likes', $user->id);
    }

    public function getLikeCount()
    {
        return Redis::scard('comments.' . $this->id . '.likes');
    }
}
