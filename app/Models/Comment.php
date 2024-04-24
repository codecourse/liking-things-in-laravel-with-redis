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
        Redis::sadd($this->getLikesKey(), $user->id);
    }

    public function likedBy(User $user)
    {
        return Redis::sismember($this->getLikesKey(), $user->id);
    }

    public function getLikeCount()
    {
        return Redis::scard($this->getLikesKey());
    }

    protected function getLikesKey()
    {
        return 'comments.' . $this->id . '.likes';
    }
}
