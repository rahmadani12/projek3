<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function(){

    Route::resource('notes',NoteController::class);

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $notes = Note::latest()->get();

    return view('dashboard', compact('notes'));

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
