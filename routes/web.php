<?php

use App\Http\Livewire\Emails\Compose;
use App\Http\Livewire\Emails\Inbox;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/email/inbox', Inbox::class)->name('email.inbox');
    Route::get('/email/compose', Compose::class)->name('email.compose');

    Route::get('/dashboard', fn () =>  view('dashboard'))->name('dashboard');
});

require __DIR__ . '/auth.php';
