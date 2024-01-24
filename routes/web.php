<?php

use Google\Service\Storage;
use Illuminate\Support\Facades\Route;
use Yaza\LaravelGoogleDriveStorage\Gdrive;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/simpan', [App\Http\Controllers\HomeController::class, 'simpan'])->name('save.file');

Route::post('/modal/{id}', [App\Http\Controllers\ModalController::class, 'index']);

Route::get('put', function () {

    // dd(public_path('assets1/img/pages/404.jpg'));
    // $param =   Gdrive::put('valoran1.png', public_path('images/va.png'));
    // dd($param);
    // return 'File was saved to Google Drive';
    // $data = Gdrive::get('valoran1.png');
    // dd($data);
    // return response($data->file, 200)
    //     ->header('Content-Type', $data->ext);
    // dd(Gdrive::all('/ApiDrive'));
    // Gdrive::makeDir('ApiDrive');

    $data = Gdrive::get('valoran1.png');
    return response($data->file, 200)
        ->header('Content-Type', $data->ext)
        ->header('Content-disposition', 'attachment; filename="' . $data->filename . '"');
});
