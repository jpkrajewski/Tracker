<?php

namespace App\Observers;

use App\Models\Goal;
use Cache;

class GoalObserver
{
    /**
     * Handle the Goal "created" event.
     *
     * @param  \App\Models\Goal  $goal
     * @return void
     */
    public function created(Goal $goal)
    {
        Cache::forget('goals');
    }

    /**
     * Handle the Goal "updated" event.
     *
     * @param  \App\Models\Goal  $goal
     * @return void
     */
    public function updated(Goal $goal)
    {
        Cache::forget('goals');
    }

    /**
     * Handle the Goal "deleted" event.
     *
     * @param  \App\Models\Goal  $goal
     * @return void
     */
    public function deleted(Goal $goal)
    {
        Cache::forget('goals');
    }
}
