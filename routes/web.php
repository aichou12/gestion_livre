<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\BookController;

Route::get('/', fn() => view('welcome'))->name('home');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Livre routes (web interface)
Route::middleware('auth')->group(function () {
    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::put('/livres/{livre}', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');
});
Route::resource('livres', LivreController::class);

// Exports
Route::get('books/export-excel', [BookController::class, 'exportExcel'])->name('books.export.excel');
Route::get('books/export-pdf', [LivreController::class, 'exportPdf'])->name('books.export.pdf');

// API routes
Route::middleware('auth:sanctum')->apiResource('livres', LivreController::class);


