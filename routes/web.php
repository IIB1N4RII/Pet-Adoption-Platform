<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\AdoptedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\FavoriteController;



Route::get('', fn() => to_route('pets.index')); //helper function

Route::resource('pets',PetController::class);
Route::resource('adoptions',AdoptionController::class);
Route::get('/adopted', [AdoptedController::class, 'adopted'])->name('posts.adopted');

Route::get('/about_us',function () {
    return view('pets.about');
} )->name('about');



Route::middleware(['auth', 'admin'])->group(function () {
    
Route::get('/admin/locations', [AdminController::class, 'showLocationsForm'])->name('admin.locations');
Route::post('/admin/locations', [AdminController::class, 'storeLocation'])->name('admin.locations.store');
Route::delete('/admin/locations/{location}', [AdminController::class, 'deletelocation'])->name('admin.locations.delete');

Route::get('/admin/reports', [AdminController::class, 'showReports'])->name('admin.reports');
Route::post('/admin/reports/ignore/{post}', [AdminController::class, 'ignoreReport'])->name('admin.reports.ignore');
Route::delete('/admin/reports/delete/{post}', [AdminController::class, 'deletePost'])->name('admin.reports.delete');

});
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('posts',PostController::class);

    Route::resource('my_post',MyPostController::class);
    Route::resource('fav',FavoriteController::class);
    


    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';



Route::get('/faqs', [FooterController::class , 'faqs'])->name('footer.faqs');
Route::get('/contact_us', [FooterController::class , 'contact'])->name('footer.contact');

Route::get('/about_dogs', [FooterController::class , 'dogs'])->name('footer.dogs');
Route::get('/Dog_Health_&_Wellness', [FooterController::class , 'dog_helth'])->name('footer.dog_helth');

Route::get('/about_cats', [FooterController::class , 'cats'])->name('footer.cats');
Route::get('/cat_Health_&_Wellness', [FooterController::class , 'cat_helth'])->name('footer.cat_helth');

Route::get('/privacy_&_policy', [FooterController::class , 'privacy'])->name('footer.privacy');
Route::get('/terms_&_conditions', [FooterController::class , 'terms'])->name('footer.terms');
