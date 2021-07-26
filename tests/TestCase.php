<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;
    use WithFaker;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct();
        $this->setUpFaker();
    }

    protected function setUpFaker()
    {
        $this->faker = $this->makeFaker('nl_NL');
    }
}
