<?php

namespace App\Exports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JobExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles, WithColumnWidths
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
                    'salary' => '$ ' . $job->salary,
                    'schedule' => $job->schedule,
                    'created_at' => $job->created_at->format('Y-m-d'),
                ];
            });
    }

    public function headings(): array
    {
        return ['Job Title', 'Employer', 'Location', 'Salary', 'Schedule', 'Created At'];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12, // Pastikan 'size' ada di bawah 'font'
                ],
                'background' => [
                    'color' => [
                        'rgb' => 'FFFFF00', // Kuning
                    ],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 50,
        ];
    }
}
