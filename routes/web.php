<?php

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

/*(Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/seed', [App\Http\Controllers\SeedController::class, 'index'])->name('get.seed');
// The page that displays the payment form
Route::get('/donations', function () {
    return view('user.donation');
});
// The route that the button calls to initialize payment
Route::post('/donations', [App\Http\Controllers\PaymentController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [App\Http\Controllers\PaymentController::class, 'callback'])->name('callback');
Route::post('/webhook/flutterwave', [App\Http\Controllers\PaymentController::class, 'webhook'])->name('webhook');




Route::post('/seed', [App\Http\Controllers\SeedController::class, 'store'])->name('post.seed');

Route::resource('/posts', App\Http\Controllers\PostController::class);


Route::resource('/articles', App\Http\Controllers\ArticleController::class);

Route::get('/', [App\Http\Controllers\Users\User\HomeController::class, 'welcome'])->name('welcome');

Route::get('/laity_council', [App\Http\Controllers\Users\User\HomeController::class, 'laity'])->name('laity');

Route::get('/gallery', [App\Http\Controllers\Users\User\HomeController::class, 'gallery'])->name('gallery');

Route::get('/societies', [App\Http\Controllers\Users\User\HomeController::class, 'society'])->name('society');

Route::get('/communities', [App\Http\Controllers\Users\User\HomeController::class, 'community'])->name('community');

Route::get('/liturgical_societies', [App\Http\Controllers\Users\User\HomeController::class, 'liturgical'])->name('liturgical');

Route::get('/organizations', [App\Http\Controllers\Users\User\HomeController::class, 'organization'])->name('organization');

Route::get('/group/{group}', [App\Http\Controllers\Users\User\HomeController::class, 'group'])->name('group');

Route::post('/group', [App\Http\Controllers\Users\User\HomeController::class, 'group_summary_save'])->name('group.summary.save');

Route::get('/daily_readings', function () {
    return view('user.readings');
});

//Route::get('/daily_readings', [App\Http\Controllers\DailyReadingController::class, 'guzzleGet'])->name('daily_readings');

/*Route::get('/upload', [App\Http\Controllers\FIleUploadController::class, 'showUploadForm'])->name('upload');
Route::post('/upload', [App\Http\Controllers\FIleUploadController::class, 'storeUploads'])->name('store_upload');*/

Route::get('/contact_us', function () {
    return view('user.contact');
})->name('contact');

Route::get('/about_us', function () {
    return view('user.about');
})->name('about');

Route::get('/history', function () {
    return view('user.history');
})->name('history');



Auth::routes();

Route::get('/home', [App\Http\Controllers\Users\User\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\Users\User\HomeController::class, 'save_profile'])->name('save.profile');
Route::get('/profile', [App\Http\Controllers\Users\User\HomeController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\Users\User\HomeController::class, 'update_profile'])->name('update.profile');

// Admin routes
Route::prefix('sysAdmin')->group(function(){
    Route::get('/', [App\Http\Controllers\Users\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    /*Route::get('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [App\Http\Controllers\Auth\AdminRegisterController::class, 'register'])->name('admin.register.submit');*/

    Route::resource('/groups', App\Http\Controllers\Users\Admin\GroupController::class);


    Route::resource('/priests', App\Http\Controllers\Users\Admin\PriestController::class);


    Route::resource('/settings', App\Http\Controllers\Users\Admin\SettingController::class);

    Route::get('/members', [App\Http\Controllers\Users\Admin\UserController::class, 'members'])->name('admin.members');

    Route::resource('/administrators', App\Http\Controllers\Users\Admin\AdministratorController::class);

    /*Route::get('/administrators', [App\Http\Controllers\Users\Admin\UserController::class, 'administrators'])->name('admin.administrators');

    Route::get('/administrators/create', [App\Http\Controllers\Users\Admin\UserController::class, 'create'])->name('admin.admin.create');

    Route::post('/administrators/store', [App\Http\Controllers\Users\Admin\UserController::class, 'store'])->name('admin.admin.store');

    Route::delete('/administrators/{$admin}', [App\Http\Controllers\Users\Admin\UserController::class, 'destroy'])->name('admin.admin.destroy');*/

    Route::resource('/profiles', App\Http\Controllers\Users\Admin\ProfilesController::class);

    Route::resource('/photos', App\Http\Controllers\Users\Admin\PhotoController::class);
});
