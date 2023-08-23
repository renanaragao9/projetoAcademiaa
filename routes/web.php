<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\GroupMuscleController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TrainingDivisionController;
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

Route::middleware(['auth'])->group(function() {
    
    Route::prefix('admin')->group(function() {
        Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
        route::get('/estatistica', [AdminController::class, 'statistic'])->name('admin.statistic');
        route::get('/chamados', [AdminController::class, 'called'])->name('admin.called');
    });

    Route::prefix('admin/divisao_do_treino/')->group(function() {
        Route::get('/tabela', [TrainingDivisionController::class, 'show_table_training'])->name('admin.table.training');
        Route::get('/criar', [TrainingDivisionController::class, 'create'])->name('admin.register.training');
        Route::post('/cadastrar', [TrainingDivisionController::class, 'store'])->name('admin.register.training.create');
        Route::get('/editar/{id}', [TrainingDivisionController::class, 'edit'])->name('admin.edit.training');
        Route::put('/atualizar/{id}', [TrainingDivisionController::class, 'update'])->name('admin.edit.training.update');
        Route::delete('/deletar/{id}', [TrainingDivisionController::class, 'destroy'])->name('admin.training.destroy');
    });
    
    Route::prefix('admin/grupo_muscular/')->group(function() {
        Route::get('/tabela', [GroupMuscleController::class, 'show_table_groupMuscles'])->name('admin.table.groupmuscle');
        Route::get('/criar', [GroupMuscleController::class, 'create'])->name('admin.register.groupmuscle');
        Route::post('/cadastrar', [GroupMuscleController::class, 'store'])->name('admin.register.groupmuscle.create');
        Route::get('/editar/{id}', [GroupMuscleController::class, 'edit'])->name('admin.edit.groupmuscle');
        Route::put('/atualizar/{id}', [GroupMuscleController::class, 'update'])->name('admin.edit.groupmuscle.update');
        Route::delete('/deletar/{id}', [GroupMuscleController::class, 'destroy'])->name('admin.groupmuscle.destroy');
    });
    
    Route::prefix('admin/exercicios/')->group(function() {
        route::get('/tabela', [ExerciseController::class, 'show_table_exercises'])->name('admin.table.exercise');
        route::get('/criar', [ExerciseController::class, 'create'])->name('admin.register.exercise');
        Route::post('/cadastrar', [ExerciseController:: class, 'store'])->name('admin.register.exercise.create');
        Route::get('/editar/{id}', [ExerciseController::class, 'edit'])->name('admin.edit.exercise');
        Route::put('/atualizar/{id}', [ExerciseController::class, 'update'])->name('admin.edit.exercise.update');
        Route::delete('/deletar/{id}', [ExerciseController::class, 'destroy'])->name('admin.exercise.destroy');
    
    });
    
    Route::prefix('admin/fichas/')->group(function() {
        route::get('/ficha_aluno/{id}', [FichaController::class, 'create'])->name('admin.register.ficha');
        route::get('ficha_aluno/select/{muscleGroup}', [FichaController::class, 'getSelect'])->name('getSelect');
        route::post('/cadastrar', [FichaController::class, 'store'])->name('admin.register.ficha.create');
        route::get('/tabela/aluno/{id}', [FichaController::class, 'show_table_exercise_user'])->name('admin.ficha.table-user');
        Route::post('tabela/aluno/atualizar-orders', [FichaController::class, 'updateOrder']);
    });

    Route::prefix('admin/alunos')->group(function() {
        Route::get('/tabela', [UserController::class, 'users'])->name('admin.users');
        Route::get('/criar', [UserController::class, 'create'])->name('admin.user.create');
        route::post('/cadastrar', [UserController::class,'store'])->name('admin.user.store');
        route::get('/editar/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/atualizar/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('deletar/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });
});
require __DIR__.'/auth.php';
