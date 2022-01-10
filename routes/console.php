<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('troplol', function () {
    $this->comment('Now proceeding...');
    $this->comment('(1/2) - Make migration...');
    Artisan::call('migrate');
    $this->comment('(1/2) - Migration process successful.');
    $this->comment('(2/2) - Seed database...');
    Artisan::call('db:seed');
    $this->comment('(2/2) - Seeding process successful.');
})->purpose('Database migration and seed');