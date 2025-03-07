<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\GroupMuscleController;
use App\Http\Controllers\TrainingDivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CalledController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\monthlyTypeController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\ExpensesController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use App\Http\Middleware\CheckCheckerMiddleware;

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
    Route::middleware(['checkProfile'])->group(function() {
    
        Route::prefix('admin')->group(function() {
            Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
            Route::get('/users-por-mes', [AdminController::class, 'usersPorMes']);
        });

        Route::prefix('admin/alunos')->group(function() {
            Route::get('/ver/{id}', [UserController::class, 'view'])->name('admin.users.view');
            Route::get('/tabela', [UserController::class, 'users'])->name('admin.users');
            Route::get('/criar', [UserController::class, 'create'])->name('admin.user.create');
            route::post('/cadastrar', [UserController::class,'store'])->name('admin.user.store')->middleware(CheckCheckerMiddleware::class);
            route::get('/editar/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::put('/atualizar/{id}', [UserController::class, 'update'])->name('admin.user.update')->middleware(CheckCheckerMiddleware::class);
            Route::get('resetar-senha/{id}', [UserController::class, 'resetPassword'])->name('admin.user.resetPassword')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy')->middleware(CheckCheckerMiddleware::class);
            Route::get('/relatorio', [UserController::class, 'report'])->name('admin.user.report');
            Route::post('relatorio-alunos-pdf', [PDFController::class, 'generateReportUser'])->name('admin.user.reportUser-pdf');

        });
        
        Route::prefix('admin/fichas/')->group(function() {
            route::get('/tabela/aluno/{id}', [FichaController::class, 'show_table_exercise_user'])->name('admin.ficha.table-user');
            route::get('/ficha-aluno/{id}', [FichaController::class, 'create'])->name('admin.register.ficha');
            route::get('ficha-aluno/select/{muscleGroup}', [FichaController::class, 'getSelect'])->name('getSelect');
            route::post('ficha-aluno/cadastrar', [FichaController::class, 'store'])->name('admin.register.ficha.create')->middleware(CheckCheckerMiddleware::class);
            route::get('/redirecionando', [FichaController::class, 'redirect_success'])->name('redirect.success');
            route::get('/redirecionandoo', [FichaController::class, 'redirect_error'])->name('redirect.error');
            Route::get('/editar/{id}', [FichaController::class, 'edit'])->name('admin.edit.ficha');
            Route::put('/atualizar/{id}', [FichaController::class, 'update'])->name('admin.update.ficha')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [FichaController::class, 'destroy'])->name('admin.ficha.destroy')->middleware(CheckCheckerMiddleware::class);
            Route::delete('/delete-all/{id}', [FichaController::class, 'destroy_all'])->name('admin.ficha.deletefichas')->middleware(CheckCheckerMiddleware::class);
        });

        Route::prefix('admin/avaliacao')->group(function() {
            Route::get('/tabela-aluno/{id}', [AssessmentController::class, 'show_table_assessment'])->name('admin.table.assessment');
            Route::get('/avaliacao-aluno/{id}', [AssessmentController::class, 'create'])->name('admin.assessment.create');
            route::post('/cadastrar', [AssessmentController::class, 'store'])->name('admin.register.assessment.create')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [AssessmentController::class, 'edit'])->name('admin.edit.assessment');
            Route::put('/atualizar/{id}', [AssessmentController::class, 'update'])->name('admin.assessment.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [AssessmentController::class, 'destroy'])->name('admin.assessment.destroy')->middleware(CheckCheckerMiddleware::class);
        });

        Route::prefix('estatisticas/')->group(function() {
            route::get('/inicio', [StatisticsController::class, 'statistic'])->name('admin.statistic');
            Route::get('/users-por-mes', [StatisticsController::class, 'usersPorMes']);
            Route::get('/payment-por-mes', [StatisticsController::class, 'paymentPorMes']);
            Route::get('/expense-por-mes', [StatisticsController::class, 'expensePorMes']);
            Route::get('/fichas-por-mes', [StatisticsController::class, 'fichasPorMes']);
            Route::get('/assessment-por-mes', [StatisticsController::class, 'assessmentPorMes']);
            Route::get('/called-por-mes', [StatisticsController::class, 'calledPorMes']);
        });

        Route::prefix('admin/desepesas')->group(function() {
            Route::get('lista-depesesas', [ExpensesController::class, 'show_expense_table'])->name('admin.table.expense');
            Route::get('/criar', [ExpensesController::class, 'create'])->name('admin.register.expense');
            Route::post('criar-despesa', [ExpensesController::class, 'store'])->name('admin.expense.store')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [ExpensesController::class, 'edit'])->name('admin.expense.edit');
            Route::put('/atualizar/{id}', [ExpensesController::class, 'update'])->name('admin.expense.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [ExpensesController::class, 'destroy'])->name('admin.expense.destroy')->middleware(CheckCheckerMiddleware::class);
            Route::get('/relatorio', [ExpensesController::class, 'report'])->name('admin.expense.report');
            Route::post('despesas-pdf', [PDFController::class, 'generateReportExpense'])->name('admin.expense.report-pdf');
        });

        Route::prefix('admin/midia')->group(function() {
            Route::get('lista-midias', [MediaController::class, 'show_media_table'])->name('admin.table.media');
            Route::get('/criar', [MediaController::class, 'create'])->name('admin.register.media');
            Route::post('criar-midia', [MediaController::class, 'store'])->name('admin.media.store')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [MediaController::class, 'edit'])->name('admin.media.edit');
            Route::put('/atualizar/{id}', [MediaController::class, 'update'])->name('admin.media.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [MediaController::class, 'destroy'])->name('admin.media.destroy')->middleware(CheckCheckerMiddleware::class);
        });

        Route::prefix('admin/mensalidade')->group(function() {
            Route::get('/lista-mensalidades', [paymentsController::class, 'index'])->name('admin.payments.index');
            Route::get('/lista-mensalidades-aluno/{id}', [paymentsController::class, 'indexUser'])->name('admin.payments.indexUser');
            Route::get('/criar/{id}', [paymentsController::class, 'create'])->name('admin.payments.register');
            Route::post('/criar-midia', [paymentsController::class, 'store'])->name('admin.payments.store')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [paymentsController::class, 'edit'])->name('admin.payments.edit');
            Route::put('/atualizar/{id}', [paymentsController::class, 'update'])->name('admin.payments.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [paymentsController::class, 'destroy'])->name('admin.payments.destroy')->middleware(CheckCheckerMiddleware::class);
            Route::get('/relatorio', [paymentsController::class, 'report'])->name('admin.payments.report');
            Route::post('mensalidade-pdf', [PDFController::class, 'generateReportPayment'])->name('admin.payments.report-pdf');

        });

        Route::prefix('admin/tipo_mensalidade')->group(function() {
            Route::get('lista-tipos', [monthlyTypeController::class, 'show_monthlyType_table'])->name('admin.table.monthlyType');
            Route::get('/criar', [monthlyTypeController::class, 'create'])->name('admin.register.monthlyType');
            Route::post('criar-midia', [monthlyTypeController::class, 'store'])->name('admin.monthlyType.store')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [monthlyTypeController::class, 'edit'])->name('admin.monthlyType.edit');
            Route::put('/atualizar/{id}', [monthlyTypeController::class, 'update'])->name('admin.monthlyType.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('deletar/{id}', [monthlyTypeController::class, 'destroy'])->name('admin.monthlyType.destroy')->middleware(CheckCheckerMiddleware::class);
        });

        Route::prefix('admin/divisao-do-treino/')->group(function() {
            Route::get('/tabela', [TrainingDivisionController::class, 'show_table_training'])->name('admin.table.training');
            Route::get('/criar', [TrainingDivisionController::class, 'create'])->name('admin.register.training');
            Route::post('/cadastrar', [TrainingDivisionController::class, 'store'])->name('admin.register.training.create')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [TrainingDivisionController::class, 'edit'])->name('admin.edit.training');
            Route::put('/atualizar/{id}', [TrainingDivisionController::class, 'update'])->name('admin.edit.training.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('/deletar/{id}', [TrainingDivisionController::class, 'destroy'])->name('admin.training.destroy')->middleware(CheckCheckerMiddleware::class);
        });
        
        Route::prefix('admin/grupo-muscular/')->group(function() {
            Route::get('/tabela', [GroupMuscleController::class, 'show_table_groupMuscles'])->name('admin.table.groupmuscle');
            Route::get('/criar', [GroupMuscleController::class, 'create'])->name('admin.register.groupmuscle');
            Route::post('/cadastrar', [GroupMuscleController::class, 'store'])->name('admin.register.groupmuscle.create')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [GroupMuscleController::class, 'edit'])->name('admin.edit.groupmuscle');
            Route::put('/atualizar/{id}', [GroupMuscleController::class, 'update'])->name('admin.edit.groupmuscle.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('/deletar/{id}', [GroupMuscleController::class, 'destroy'])->name('admin.groupmuscle.destroy')->middleware(CheckCheckerMiddleware::class);
        });
        
        Route::prefix('admin/exercicios/')->group(function() {
            route::get('/tabela', [ExerciseController::class, 'show_table_exercises'])->name('admin.table.exercise');
            route::get('/criar', [ExerciseController::class, 'create'])->name('admin.register.exercise');
            Route::post('/cadastrar', [ExerciseController:: class, 'store'])->name('admin.register.exercise.create')->middleware(CheckCheckerMiddleware::class);
            Route::get('/editar/{id}', [ExerciseController::class, 'edit'])->name('admin.edit.exercise');
            Route::put('/atualizar/{id}', [ExerciseController::class, 'update'])->name('admin.edit.exercise.update')->middleware(CheckCheckerMiddleware::class);
            Route::delete('/deletar/{id}', [ExerciseController::class, 'destroy'])->name('admin.exercise.destroy')->middleware(CheckCheckerMiddleware::class);
        });
    });
    
    Route::middleware(['checkChecker'])->group(function() {
        
    });

    // ACESSOS SEM A CHECAGEM DO PERFIL
    Route::prefix('admin/chamados')->group(function() {
        Route::get('lista-chamados', [CalledController::class, 'called'])->name('admin.called');
        Route::post('criar-chamado', [CalledController::class, 'store'])->name('admin.called.store')->middleware(CheckCheckerMiddleware::class);
        Route::delete('deletar/{id}', [CalledController::class, 'destroy'])->name('admin.called.destroy')->middleware(CheckCheckerMiddleware::class);
    });

    Route::prefix('admin/alunos')->group(function() {
        Route::put('/perfil/atualizar-imagem', [UserController::class, 'updateProfileImage'])->name('profile.updateImage')->middleware(CheckCheckerMiddleware::class);
    });


});

// Rota para chamado de alunos sem conta
Route::post('criar-conta', [CalledController::class, 'createCount'])->name('admin.createCount.store');

Route::middleware(['auth'])->group(function() {
    Route::prefix('alunos/')->group(function() {
       route::get('inicio', [StudentsController::class, 'index'])->name('students.start');
       route::get('ficha/{id}', [StudentsController::class, 'ficha'])->name('students.ficha');
       route::get('avaliacao/{id}', [StudentsController::class,'assessment'])->name('students.assessment');
       route::get('called/{id}', [StudentsController::class,'called'])->name('students.called');
       route::post('criando-estatistica', [StatisticsController::class, 'store'])->name('create_statistics');
       route::get('perfil/{id}', [StudentsController::class, 'profile'])->name('students.profile');
       route::get('ficha-view/{id}', [StudentsController::class, 'fichaPDF'])->name('students.pdf');
       Route::get('ficha-pdf/{id}', [PDFController::class, 'generatePDF'])->name('fichaDownload');
       Route::get('assessment-view/{id}', [StudentsController::class, 'assessmentPDF'])->name('students.assessment-pdf');
       Route::get('assessment-pdf/{id}', [PDFController::class, 'generateAssessmentPDF'])->name('assessmentDownload');
       route::get('post', [StudentsController::class, 'posts'])->name('students.posts');
       route::get('pagamentos', [StudentsController::class, 'payments'])->name('students.payment');
       Route::get('receipt-pdf/{id}', [PDFController::class, 'generateReceiptPDF'])->name('receiptDownload');
       route::get('redefinir-senha', [StudentsController::class, 'reset_password'])->name('students.resetPass');
       route::post('redefinido', [StudentsController::class, 'reset'])->name('students.reset')->middleware(CheckCheckerMiddleware::class);
    });
});

require __DIR__.'/auth.php';