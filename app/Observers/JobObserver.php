<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class JobObserver
{
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Job created: ' . $job->title,
                'ip_address' => Request::ip(),
                'browser' => Request::header('User-Agent'),
            ]);
        }
    }

    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Job updated: ' . $job->title,
                'ip_address' => Request::ip(),
                'browser' => Request::header('User-Agent'),
            ]);
        }
    }

    /**
     * Handle the Job "deleted" event.
     */
    public function deleted(Job $job): void
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::user()->id,
                'activity' => 'Job deleted: ' . $job->title,
                'ip_address' => Request::ip(),
                'browser' => Request::header('User-Agent'),
            ]);
        }
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
