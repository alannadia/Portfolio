<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterSiswaController;
use App\Http\Controllers\MasterProjectController;
use App\Http\Controllers\MasterKontakController;
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
    return view('home');
});

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// admin



Route ::get('admin/dashboard',[DashboardController::class,'index']);
Route ::get('/login',[LoginController::class,'index'])->name('login.auth')->middleware('guest');
Route ::post('/login',[LoginController::class, 'authenticate'])->name('login');
Route ::post('/logout',[LoginController::class,'index'])->name('logout')->middleware('auth');
Route ::get('admin/MasterSiswa/{id_siswa}/hapus',[MasterSiswaController::class,'hapus'])->name('MasterSiswa.hapus');
Route::resource('admin/MasterSiswa',MasterSiswaController::class);
Route::resource('/admin/MasterProject',MasterProjectController::class);
Route ::get('admin/MasterProject/{id_project}/hapus',[MasterProjectController::class,'hapus'])->name('MasterProject.hapus');
Route::resource('admin/MasterContact',MasterKontakController::class);
// Route::get('/logout',[LoginController::class,'index'])->middleware('auth');

// Route::get('/mastersiswa', function () {
//     return view('admin.MasterSiswa');
// });

// Route::get('/masterproject', function () {
//     return view('admin.MasterProject');
// });

// Route::get('/mastercontact', function () {
//     return view('admin.MasterContact');
// });

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/contact', function () {
    return view('contact');
});
