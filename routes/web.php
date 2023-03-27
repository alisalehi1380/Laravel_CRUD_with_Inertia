<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use PHPUnit\Event\Telemetry\StopWatch;


Route::get('login' , [LoginController::class, 'create'])->name('login');
Route::post('login' , [LoginController::class, 'store'])->name('store');
Route::post('logout' , [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group( function () {

    Route::get('/', function () {
        return Inertia::render('Index');
    })->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->name('create');
    Route::post('/users', function () {
        Request::validate([
            'name' => 'required',
            'email' => ['required' , 'email'],
            'password' => 'required',
        ]);
        User::create([
            'name' => Request::input('name'),
            'email' => Request::input('email'),
            'password' => bcrypt(Request::input('name')),
        ]);
        return redirect('/users');
    })->name('insert');
    // can('create' , 'App\Models\User')

    Route::get('users/{user}/edit' , [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/{user}/update' , [UserController::class, 'update'])->name('user.update');
    Route::get('users/{user}/delete' , [UserController::class, 'destroy'])->name('user.delete');
});
