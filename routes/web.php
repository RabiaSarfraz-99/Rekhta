<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HerosliderController;
use App\Http\Controllers\LibrarybooksController;
use App\Http\Controllers\LearmoreslidesController;
use App\Http\Controllers\PoetrycollectionController;
use App\Http\Controllers\RecommendedpoetsController;
use App\Http\Controllers\ShayaricollectionController;
use App\Http\Controllers\TodaystopshayarisController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/herosliderdata/json', [HerosliderController::class, 'getdata'])->name('herosliderdata');
Route::get('/topshayaridata/json', [TodaystopshayarisController::class, 'getdata'])->name('topshayaridata');
Route::get('/learnmoredata/json', [LearmoreslidesController::class, 'getdata'])->name('learnmoredata');
Route::get('/librarybookdata/json', [LibrarybooksController::class, 'getdata'])->name('librarybookdata');
Route::get('/poetrycollectiondata/json', [PoetrycollectionController::class, 'getdata'])->name('poetrycollectiondata');
Route::get('/shayaricollectiondata/json', [ShayaricollectionController::class, 'getdata'])->name('shayaricollectiondata');
Route::get('/recommendedpoetsdata/json', [RecommendedpoetsController::class, 'getdata'])->name('recommendedpoetsdata');
Route::get('/bookslidedata/json', [BooksController::class, 'getdata'])->name('bookslidedata');
// search
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.statics');
    })->name('dashboard');


    Route::get('/addheroslide', [HerosliderController::class, 'create'])->name('addheroslide');
    Route::get('/heroslide', [HerosliderController::class, 'index'])->name('herolisting');
    Route::post('/heroslidelist', [HerosliderController::class, 'store'])->name('heroslides');
    Route::get('/editheroslide/{id}', [HerosliderController::class, 'edit'])->name('editheroslide');
    Route::get('/heroslide/view/{id}', [HeroSliderController::class, 'show'])->name('viewheroslide');
    Route::put('/updateheroslide/{id}', [HerosliderController::class, 'update'])->name('updateheroslide');
    Route::delete('/deleteheroslide/{id}', [HerosliderController::class, 'destroy'])->name('deleteheroslide');



    // Today's Top Shayari
    Route::get('/addtopShayari', [TodaystopshayarisController::class, 'create'])->name('addtopShayari');
    Route::post('/topshayarilist', [TodaystopshayarisController::class, 'store'])->name('topshayari');
    Route::get('/learnmorelisting', [TodaystopshayarisController::class, 'index'])->name('topshayarilisting');
    Route::get('/edittopshayari/{id}', [TodaystopshayarisController::class, 'edit'])->name('editshayari');
    Route::put('/updatetopshayaris/{id}', [TodaystopshayarisController::class, 'update'])->name('updatetopshayari');
    Route::delete('/deletetopshayari/{id}', [TodaystopshayarisController::class, 'destroy'])->name('deletetopshayari');
    Route::get('/viewtopshayari/{id}', [TodaystopshayarisController::class, 'show'])->name('viewtopshayari');


    // More FRom Rekhta
    Route::get('/addtomore', [LearmoreslidesController::class, 'create'])->name('addtomore');
    Route::post('/learnmorelist', [LearmoreslidesController::class, 'store'])->name('learnmore');
    Route::get('/learnmorelist', [LearmoreslidesController::class, 'index'])->name('learnmorelisting');
    Route::get('/edittolearnmore/{id}', [LearmoreslidesController::class, 'edit'])->name('editlearnmore');
    Route::put('/updatelearnmore/{id}', [LearmoreslidesController::class, 'update'])->name('updatelearnmore');
    Route::delete('/deletelearnmore/{id}', [LearmoreslidesController::class, 'destroy'])->name('deletelearnmore');
    Route::get('/viewlearnmorelist/{id}', [LearmoreslidesController::class, 'show'])->name('viewmorelist');




    // Library books 
    Route::get('/addlibrarybook', [LibrarybooksController::class, 'create'])->name('addlibrarybook');
    Route::post('/librarybooklist', [LibrarybooksController::class, 'store'])->name('librarybook');
    Route::get('/librarybooklist', [LibrarybooksController::class, 'index'])->name('librarybooklisting');
    Route::get('/edittolibrarybook/{id}', [LibrarybooksController::class, 'edit'])->name('editlibrarybook');
    Route::put('/updatelibrarybook/{id}', [LibrarybooksController::class, 'update'])->name('updatelibrarybook');
    Route::delete('/deletelibrarybook/{id}', [LibrarybooksController::class, 'destroy'])->name('deletelibrarybook');
    Route::get('/viewlibrarybooklist/{id}', [LibrarybooksController::class, 'show'])->name('viewbookslist');
    // Poetrycollection

    Route::get('/addpoetrycollection', [PoetrycollectionController::class, 'create'])->name('addpoetrycollection');
    Route::get('/showpoetrycollection/{id}', [PoetrycollectionController::class, 'show'])->name('showpoetrycollection');
    Route::get('/poetrycollection', [PoetrycollectionController::class, 'index'])->name('poetrycollectionlisting');
    Route::post('/poetrycollectionlist', [PoetrycollectionController::class, 'store'])->name('poetrycollections');
    Route::get('/editpoetrycollection/{id}', [PoetrycollectionController::class, 'edit'])->name('editpoetrycollection');
    Route::put('/updatepoetrycollection/{id}', [PoetrycollectionController::class, 'update'])->name('updatepoetrycollection');
    Route::delete('/deletepoetrycollection/{id}', [PoetrycollectionController::class, 'destroy'])->name('deletepoetrycollection');


    // Shayaricollection

    Route::get('/addshayaricollection', [ShayaricollectionController::class, 'create'])->name('addshayaricollection');
    Route::get('/shayaricollection', [ShayaricollectionController::class, 'index'])->name('shayaricollectionlisting');
    Route::post('/shayaricollectionlist', [ShayaricollectionController::class, 'store'])->name('shayaricollections');
    Route::get('/shayaricollection/{id}', [ShayaricollectionController::class, 'show'])->name('shayaricollection');
    Route::get('/editshayaricollection/{id}', [ShayaricollectionController::class, 'edit'])->name('editshayaricollection');

    Route::put('/updateshayaricollection/{id}', [ShayaricollectionController::class, 'update'])->name('updateshayaricollection');
    Route::delete('/deleteshayaricollection/{id}', [ShayaricollectionController::class, 'destroy'])->name('deleteshayaricollection');

    // recommendedpoets

    Route::get('/addrecommendedpoets', [RecommendedpoetsController::class, 'create'])->name('addrecommendedpoets');
    Route::get('/recommendedpoets', [RecommendedpoetsController::class, 'index'])->name('recommendedpoetslisting');
    Route::post('/recommendedpoetslist', [RecommendedpoetsController::class, 'store'])->name('recommendedpoets');
    Route::get('/recommendedpoet/{id}', [RecommendedpoetsController::class, 'show'])->name('recommendedpoet');
    Route::get('/editrecommendedpoets/{id}', [RecommendedpoetsController::class, 'edit'])->name('editrecommendedpoets');
    Route::put('/updaterecommendedpoets/{id}', [RecommendedpoetsController::class, 'update'])->name('updaterecommendedpoets');
    Route::delete('/deleterecommendedpoets/{id}', [RecommendedpoetsController::class, 'destroy'])->name('deleterecommendedpoets');

    // books

    Route::get('/addbooks', [BooksController::class, 'create'])->name('addbooks');
    Route::get('/books', [BooksController::class, 'index'])->name('bookslisting');
    Route::post('/bookslist', [BooksController::class, 'store'])->name('books');
    Route::get('/book/{id}', [BooksController::class, 'show'])->name('book');
    Route::get('/editbooks/{id}', [BooksController::class, 'edit'])->name('editbooks');
    Route::put('/updatebooks/{id}', [BooksController::class, 'update'])->name('updatebooks');
    Route::delete('/deletebooks/{id}', [BooksController::class, 'destroy'])->name('deletebooks');
});
