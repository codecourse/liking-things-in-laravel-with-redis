<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Redis;

trait Likeable
{
    public function addLike(User $user)
    {
        Redis::sadd($this->getLikesKey(), $user->id);
    }

    public function removeLike(User $user)
    {
        Redis::srem($this->getLikesKey(), $user->id);
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
        return sprintf('%s.%s.likes', $this->getTable(), $this->id);
    }
}
