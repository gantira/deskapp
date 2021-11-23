<?php

use App\Http\Livewire\Emails\BatchList;
use App\Http\Livewire\Emails\BatchView;
use App\Http\Livewire\Emails\Compose;
use App\Http\Livewire\Emails\EmailList;
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

Route::get('/', fn () =>  redirect('dashboard'));

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/email', EmailList::class)->name('email');
    Route::get('/email/compose', Compose::class)->name('email.compose');
    Route::get('/email/batch', BatchList::class)->name('email.batch');
    Route::get('/email/{batch}/batch', BatchView::class)->name('email.batch.view');

    Route::get('/dashboard', fn () =>  view('dashboard'))->name('dashboard');
});

require __DIR__ . '/auth.php';
