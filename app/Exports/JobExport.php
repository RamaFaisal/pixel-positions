<?php

namespace App\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Job::select('title', 'employer_id', 'location', 'salary', 'schedule', 'created_at')
            ->with('employer:id,name')
            ->latest()
            ->get()
            ->map(function ($job) {
                return [
                    'title' => $job->title,
                    'employer' => $job->employer->name,
                    'location' => $job->location,
                    'salary' => $job->salary,
                    'schedule' => $job->schedule,
                    'created_at' => $job->created_at->format('Y-m-d'),
                ];
            });
    }

    public function headings(): array
    {
        return ['Job Title', 'Employer', 'Location', 'Salary', 'Schedule', 'Created At'];
    }
}
