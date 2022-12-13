<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KtgrModulController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
Route::get('/', function () {
    return view('home.index');
});
Route::get('/about', function () {
    return view('home.about');
});
Route::get('/course', function () {
    return view('home.course');
});
Route::get('/blog', function () {
    return view('home.blog');
});
Route::get('/kontak', function () {
    return view('home.kontak');
});
Route::name('auth')->group(function () {
    Route::get('/register', [UserController::class, 'GetRegister'])->name('GetRegister');
    Route::post('/createAkun', [UserController::class, 'CreateAkun'])->name('CreateAkun');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/loginAuth', [UserController::class, 'LoginAuth'])->name('LoginAuth');
});

Route::name('admin')->group(function () {

    //route for user
    Route::get('/dashboard', [DashboardController::class, 'GetAll'])->name('dashboard');

    Route::get('/user', [UserController::class, 'GetAllUser'])->name('GetAllUser');
    Route::get('/user/DeleteByIdUser/{id}', [UserController::class, 'DeleteByIdUser'])->name('user.DeleteByIdUser');

    //route for instansi/lembaga
    Route::get('/instansi', [LembagaController::class, 'GetLembaga'])->name('GetLembaga');
    Route::post('/instansi/addLembaga', [LembagaController::class, 'AddLembaga'])->name('instansi.AddLembaga');
    Route::post('/instansi/updateById', [LembagaController::class, 'UpdateById'])->name('instansi.UpdateById');
    Route::get('/instansi/deleteById/{id}', [LembagaController::class, 'DeleteById'])->name('instansi.DeleteById');

    //route for bidang
    Route::get('/bidang', [BidangController::class, 'GetAllBidang'])->name('GetAllBidang');
    Route::post('/bidang/addBidang', [BidangController::class, 'AddBidang'])->name('bidang.AddBidang');
    Route::post('/bidang/updateByIdBidang', [BidangController::class, 'UpdateByIdBidang'])->name('bidang.UpdateByIdBidang');
    Route::get('/bidang/deleteByIdBidang/{id}', [BidangController::class, 'DeleteByIdBidang'])->name('bidang.DeleteByIdBidang');

    //route for Kelas
    Route::get('/kelas', [KelasController::class, 'GetAllKelas'])->name('GetAllKelas');
    Route::post('/kelas/addKelas', [KelasController::class, 'AddKelas'])->name('kelas.AddKelas');
    Route::post('/kelas/updateKelasById/', [KelasController::class, 'UpdateKelasById'])->name('kelas.UpdateKelasById');
    Route::get('/kelas/deleteKelasById/{id}', [KelasController::class, 'DeleteKelasById'])->name('kelas.DeleteKelasById');

    //route for kategori Modul
    Route::get('/ktgrModul', [KtgrModulController::class, 'GetAllKtgrModul'])->name('GetAllKtgrModul');
    Route::post('/ktgrModul/addKtgrModul', [KtgrModulController::class, 'AddKtgrModul'])->name('ktgrmodul.AddKtgrModul');
    Route::post('/ktgrModul/updateByIdKtgrModul/', [KtgrModulController::class, 'UpdateByIdKtgrModul'])->name('ktgrmodul.UpdateByIdKtgrModul');
    Route::get('/ktgrModul/deleteByIdKtgrModul/{id}', [KtgrModulController::class, 'DeleteByIdKtgrModul'])->name('ktgrmodul.DeleteByIdKtgrModul');

    //route for Member
    Route::get('/member', [MemberController::class, 'GetAllMember'])->name('GetAllMember');
    Route::post('/member/addMember', [MemberController::class, 'AddMember'])->name('member.AddMember');
    Route::post('/member/updateMemberById/', [MemberController::class, 'UpdateMemberById'])->name('member.UpdateMemberById');
    Route::get('/member/deleteMemberById/{id}', [MemberController::class, 'DeleteMemberById'])->name('member.DeleteMemberById');

    //route for Mentor
    Route::get('/mentor', [MentorController::class, 'GetAllMentor'])->name('GetAllMentor');
    Route::post('/mentor/addMentor', [MentorController::class, 'AddMentor'])->name('mentor.AddMentor');
    Route::post('/mentor/updateMentorById/', [MentorController::class, 'UpdateMentorById'])->name('mentor.UpdateMentorById');
    Route::get('/mentor/deleteMentorById/{id}', [MentorController::class, 'DeleteMentorById'])->name('mentor.DeleteMentorById');

    //route for Modul
    Route::get('/modul', [ModulController::class, 'GetAllModul'])->name('GetAllModul');
    Route::post('/modul/addModul', [ModulController::class, 'AddModul'])->name('modul.AddModul');
    Route::post('/modul/updateModulById/', [ModulController::class, 'UpdateModulById'])->name('modul.UpdateModulById');
    Route::get('/modul/deleteModulById/{id}', [ModulController::class, 'DeleteModulById'])->name('modul.DeleteModulById');
});
