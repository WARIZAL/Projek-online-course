<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KtgrModulController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::name('admin.')->group(function () {

    //route for user
    Route::get('/user', [UserController::class, 'GetAllUser'])->name('GetAllUser');
    Route::get('/user/DeleteByIdUser/{id}', [UserController::class, 'DeleteByIdUser'])->name('user.DeleteByIdUser');

    //route for bidang
    Route::get('/bidang', [BidangController::class, 'GetAllBidang'])->name('GetAllBidang');
    Route::post('/bidang/AddBidang', [BidangController::class, 'AddBidang'])->name('bidang.AddBidang');
    Route::post('/bidang/UpdateByIdBidang/', [BidangController::class, 'UpdateByIdBidang'])->name('bidang.UpdateByIdBidang');
    Route::get('/bidang/DeleteByIdBidang/{id}', [BidangController::class, 'DeleteByIdBidang'])->name('bidang.DeleteByIdBidang');

    //route for Kelas
    Route::get('/kelas', [KelasController::class, 'GetAllKelas'])->name('GetAllKelas');
    Route::post('/kelas/AddKelas', [KelasController::class, 'AddKelas'])->name('kelas.AddKelas');
    Route::post('/kelas/UpdateKelasById/', [KelasController::class, 'UpdateKelasById'])->name('kelas.UpdateKelasById');
    Route::get('/kelas/DeleteKelasById/{id}', [KelasController::class, 'DeleteKelasById'])->name('kelas.DeleteKelasById');

    //route for kategori Modul
    Route::get('/ktgrmodul', [KtgrModulController::class, 'GetAllKtgrModul'])->name('GetAllKtgrModul');
    Route::post('/ktgrmodul/AddKtgrModul', [KtgrModulController::class, 'AddKtgrModul'])->name('ktgrmodul.AddKtgrModul');
    Route::post('/ktgrmodul/UpdateByIdKtgrModul/', [KtgrModulController::class, 'UpdateByIdKtgrModul'])->name('ktgrmodul.UpdateByIdKtgrModul');
    Route::get('/ktgrmodul/DeleteByIdKtgrModul/{id}', [KtgrModulController::class, 'DeleteByIdKtgrModul'])->name('ktgrmodul.DeleteByIdKtgrModul');

    //route for Member
    Route::get('/member', [MemberController::class, 'GetAllMember'])->name('GetAllMember');
    Route::post('/member/AddMember', [MemberController::class, 'AddMember'])->name('member.AddMember');
    Route::post('/member/UpdateMemberById/', [MemberController::class, 'UpdateMemberById'])->name('member.UpdateMemberById');
    Route::get('/member/DeleteMemberById/{id}', [MemberController::class, 'DeleteMemberById'])->name('member.DeleteMemberById');

    //route for Mentor
    Route::get('/mentor', [MentorController::class, 'GetAllMentor'])->name('GetAllMentor');
    Route::post('/mentor/AddMentor', [MentorController::class, 'AddMentor'])->name('mentor.AddMentor');
    Route::post('/mentor/UpdateMentorById/', [MentorController::class, 'UpdateMentorById'])->name('mentor.UpdateMentorById');
    Route::get('/mentor/DeleteMentorById/{id}', [MentorController::class, 'DeleteMentorById'])->name('mentor.DeleteMentorById');

    //route for Modul
    Route::get('/modul', [ModulController::class, 'GetAllModul'])->name('GetAllModul');
    Route::post('/modul/AddModul', [ModulController::class, 'AddModul'])->name('modul.AddModul');
    Route::post('/modul/UpdateModulById/', [ModulController::class, 'UpdateModulById'])->name('modul.UpdateModulById');
    Route::get('/modul/DeleteModulById/{id}', [ModulController::class, 'DeleteModulById'])->name('modul.DeleteModulById');
});
