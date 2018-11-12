<?php


namespace V1\Tests\Feature;


use Tests\TestCase as LaravelTestCase;

class TestCase extends LaravelTestCase
{
    protected static $migrated = false;

    public function createApplication()
    {
        $app = parent::createApplication();
        if (static::$migrated === false) {
            $this->afterApplicationCreated(function() {
                $this->artisan('migrate:fresh', ['--seed' => true]);
            });

            static::$migrated = true;
        }

        return $app;
    }

    /**
     * @param string|null $key
     * @return array
     */
    protected function bearerHeader(string $key = null): array
    {
        if (is_null($key)) {
            $key = env('API_KEY');
        }

        return [
            'authorization' => "Bearer {$key}"
        ];
    }
}
