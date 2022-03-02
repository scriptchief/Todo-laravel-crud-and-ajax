<?php

namespace App\Observers;

use App\Models\todo;
use Illuminate\Support\Str;

class TodoObserver
{
    /**
     * Handle the todo "created" event.
     *
     * @param  \App\Models\todo  $todo
     * @return void
     */
    public function created(todo $todo)
    {
        $todo->slug = Str::slug($todo->title);
    }

    /**
     * Handle the todo "updated" event.
     *
     * @param  \App\Models\todo  $todo
     * @return void
     */
    public function updated(todo $todo)
    {
        $todo->slug = Str::slug($todo->title);
    }

    /**
     * Handle the todo "deleted" event.
     *
     * @param  \App\Models\todo  $todo
     * @return void
     */
    public function deleted(todo $todo)
    {
        //
    }

    /**
     * Handle the todo "restored" event.
     *
     * @param  \App\Models\todo  $todo
     * @return void
     */
    public function restored(todo $todo)
    {
        $todo->slug = Str::slug($todo->title);
    }

    /**
     * Handle the todo "force deleted" event.
     *
     * @param  \App\Models\todo  $todo
     * @return void
     */
    public function forceDeleted(todo $todo)
    {
        //
    }
}
