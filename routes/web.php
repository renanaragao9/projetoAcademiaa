<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\GroupMuscleController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/alunos', [AdminController::class, 'users'])->name('admin.users');
    route::get('/estatistica', [AdminController::class, 'statistic'])->name('admin.statistic');
    route::get('/chamados', [AdminController::class, 'called'])->name('admin.called');
});

Route::prefix('admin/grupo_muscular/')->group(function() {
    Route::get('/tabela', [GroupMuscleController::class, 'show_table_groupMuscles'])->name('admin.table.groupmuscle');
    Route::get('/create', [GroupMuscleController::class, 'create'])->name('admin.register.groupmuscle');
    Route::post('/store', [GroupMuscleController::class, 'store'])->name('admin.register.groupmuscle.create');
    Route::get('/edit/{id}', [GroupMuscleController::class, 'edit'])->name('admin.edit.groupmuscle');
    Route::put('/update/{id}', [GroupMuscleController::class, 'update'])->name('admin.edit.groupmuscle.update');
    Route::delete('/delete/{id}', [GroupMuscleController::class, 'destroy'])->name('admin.groupmuscle.destroy');
    
});

Route::prefix('admin/exercicios/')->group(function() {
    route::get('/tabela', [TableController::class, 'exercise'])->name('admin.table.exercise');
    route::get('/create', [ExerciseController::class, 'index'])->name('admin.register.exercise');
    Route::post('/store', [ExerciseController:: class, 'create'])->name('admin.register.exercise.create');

});

Route::prefix('admin/fichas/')->group(function() {
    route::get('/ficha', [FichaController::class, 'index'])->name('admin.register.ficha');
    route::post('/ficha', [FichaController::class, 'create'])->name('admin.register.ficha.create');
});

Route::prefix('admin/alunos')->group(function() {
    Route::get('/aluno', [UserController::class, 'index'])->name('admin.register.user');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
