<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\TestController;

use App\Http\Controllers\ProductController;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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

// Callback function 


Route::get('/salam/{name}/{prenom}/{age?}', function ($name, $prenom, int $age=22) {
    return "salut, " . $name . ", ça va, " . $prenom . " j'ai" . " " . $age;
})->name('exmple2');

// Route::get('/page', function(){
//     return view('salut');
// })->name('exmple3');

// Route::get('/fiche',function(){
//     return redirect()->route('exmple5');
// })->name('exmple4');

// Route::get('/code',function(){
//     return "<h2>Mohamed</h2>";
// })->name('exmple5');

// Route::get('/page', function(){
//          return view('admin.index');
//     })->name('exmple3');

    //     Route::get('/page', function(){     
    //         return view('user.index');
    // })->name('exmple4');   
    
    // Route::view('/usser','admin.index',['username'=>'salut admin']);

// Route::get('/posst',function(){
//     return View::first(['user.global','admin.index'],['username'=>'bonjour']);
// });  


// Route::get('/page', function(){
//              return view('user.index')
//              ->with('name','imad')
//              ->with('prenom','saadaoui')
//              ->withAge(19);
//         });


// entre [] c'est un string

//Route::view('/salut','salut',['name'=>'imad'])->name('exmple6');

// -------------------------------------------------

// Route::get('/userr/show', [TestController::class, 'show']);
// Route::get('/userr/index', [TestController::class, 'index']);
// Route::get('/userr/delete', [TestController::class, 'delete']);
// Route::get('/userr/add', [TestController::class, 'add']);


Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('products.index');
});

Route::get('/home', function () {
    // return view('welcome');
    return redirect()->route('products.index')
          ->with('success','You are login Success!') ;
});
Route::resource('products',ProductController::class);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
