<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{

    use HandlesAuthorization;

    /**
     * Determine if the given review can be updated by the user.
     *
     * @param User $user
     * @param Review $review
     * @return bool
     */
    public function update(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }

    /**
     * Determine if the given review can be deleted by the user.
     *
     * @param User $user
     * @param Review $review
     * @return bool
     */
    public function delete(User $user, Review $review)
    {
        return $user->id === $review->user_id;
    }
}
