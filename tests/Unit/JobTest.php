<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    // expect(true)->toBeFalse();

    $employer = Employer::factory()->create();
    $job = Job::factory()->create(
        ['employer_id' => $employer->id]
    );

    // Act
    expect($job->employer->is($employer))->toBeTrue();
});

it('Can have tags', function () {
    $job = Job::factory()->create();

    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});