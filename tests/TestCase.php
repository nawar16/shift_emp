<?php

namespace Tests;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
=======
use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    private Generator $faker;
    
    public function setUp()
    : void {
    
        parent::setUp();
        $this->faker = Factory::create();
        Artisan::call('migrate:refresh');
    }
    
    public function __get($key) {
    
        if ($key === 'faker')
            return $this->faker;
        throw new Exception('Unknown Key Requested');
    }
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
}
