<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\TicketController;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
});


Route::middleware(['auth', 'admin'])->group(function () {

    
    
   
    Route::get('tickets/{ticket}/edit', [TicketController::class, 'edit'] )->name('tickets.edit');
    Route::put('tickets/{ticket}', [TicketController::class, 'update' ])->name('tickets.update');

    Route::delete('tickets/{ticket}/delete', [TicketController::class, 'destroy' ] )->name('tickets.destroy');
});

require __DIR__.'/settings.php';
