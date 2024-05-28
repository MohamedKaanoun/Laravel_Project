<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('login');

Route::view('/home', 'welcome')->name('home');
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/aboutMe', [AuthController::class, 'aboutMe'])->name('aboutMe');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/user/profile', 'pages.user.profile')->name('profile');
    Route::view('/user/aboutMe', 'pages.user.aboutMe')->name('aboutMe');
    Route::view('/user/contactMe', 'pages.user.contactMe')->name('contactMe');
    Route::view('/user/dashboard', 'pages.user.dashboard')->name('dashboard');
    Route::post('/user/aboutMe', [AuthController::class, 'aboutMe']);
    Route::post('/user/contactMe', [AuthController::class, 'contactMe']);
    Route::post('/user/dashboard', [DashboardController::class, 'dashboard']);
    Route::view('/user/myProjects', 'pages.user.myProjects')->name('myProjects');
    Route::view('/user/projects/', 'components.card')->name('card');
    Route::post('/user/myProjects', [DashboardController::class, 'myProjects']);
    Route::view('/projects/matrice', 'projects.matrices')->name('matrice');
    Route::post('/projects/matrice', [ProjectController::class, 'matrice']);


    Route::view('/projects/geo', 'projects.geo')->name('geo');
    Route::get('/projects/geo', [FichierController::class, 'afficherCarte'])->name('afficherCarte');


    Route::get('/diagramme', [FichierController::class, 'showChart'])->name('showChart');

    Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

    Route::get('/botman', [BotManController::class, 'index'])->name('chatBot');
    Route::post('/botman', [BotManController::class, 'handle']);

    Route::post('/projects/geo', [ProjectController::class, 'geo']);
    Route::view('/projects/insertFichier', 'projects.insertFichier')->name('insertFichier');
    
    Route::view('/projects/insertImage', 'projects.upload_image_form')->name('insertImage');

    Route::get('/images/afficher_images', [ImageController::class, 'index'])->name('afficher_images');
    
    Route::post('/images/enregistrer_image', [ImageController::class, 'store'])->name('enregistrer_image');
    
    Route::post('/projects/insertFichier', [FichierController::class, 'insertFichier']);

    Route::get('/fichier/afficher', [FichierController::class, 'afficher'])->name('afficher');

    Route::post('/fichier/enregistrer', [FichierController::class, 'enregistrer'])->name('enregistrer');

    Route::view('/afficher', 'pages.user.listFichier')->name('listFichier');

    Route::post('/modifier/{index}', [FichierController::class, 'modifier'])->name('modifier');
    Route::post('/supprimer/{index}', [FichierController::class, 'supprimer'])->name('supprimer');

});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::view('/login', 'auth.login')->name('login');
});

