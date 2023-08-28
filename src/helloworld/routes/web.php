<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MemberController::class, 'index']);
 
Route::get('/show', [MemberController::class, 'getMembers']);
 
Route::post('/save', [MemberController::class, 'save']);
 
Route::post('/delete', [MemberController::class, 'delete']);
 
Route::post('/update', [MemberController::class, 'update']);
