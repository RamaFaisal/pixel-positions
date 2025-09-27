<?php

namespace App\Observers;

use App\Models\Job;
use Illuminate\Support\Facades\Log;

class JobObserver
{
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        Log::info('Job created: ' . $job->title);
    }

    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        Log::info('Job updated: ' . $job->title);
    }

    /**
     * Handle the Job "deleted" event.
     */
    public function deleted(Job $job): void
    {
        Log::info('Job deleted: ' . $job->title);
    }

    /**
     * Handle the Job "restored" event.
     */
    public function restored(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "force deleted" event.
     */
    public function forceDeleted(Job $job): void
    {
        //
    }
}
