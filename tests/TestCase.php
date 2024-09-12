<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('DatabaseSeeder');

        $this->admin = User::where('admin', 1)
            ->first();

        $this->customer = User::where('admin', 0)
            ->first();
    }
}
