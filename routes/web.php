<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
})->middleware('admin');

// Route::get('cv', function () {
//     return view('cv');
// });
Route::view('cv', 'cv');

// Route::get('w', function () {
//     return "Hey rehab";
// });
// Route::get('cars/{id?}', function ($id = 3) {
//     return "car number is" . $id;
// })->whereNumber("id");

// Route::get('user/{name}/{age?}', function ($name, $age = 0) {
//     if ($age == 0) {
//         return "User name is " . $name;
//     } else {
//         return "User name is " . $name . " and age is " . $age;
//     }
// })->where([
//     'name' => '[a-zA-Z]+',
//     // 'age' => '[0-9]+',
// ]);

// Route::get('student/{name}', function ($name) {
//     return " name is " . $name;
// })->whereIn('name', ['rehab', 'ola']);

// accounts
Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit accusamus eos, voluptates dolorum soluta voluptatum minima libero nulla dolores a natus repudiandae quos veniam quod totam voluptatem eius. Illum, voluptas.';
    });
    Route::get('admin', function () {
        return "are you admin ";
    });

    Route::get('user', function () {
        return 'enter your name';
    });
});

// cars
// Route::prefix('cars')->group(function () {
//     Route::prefix('usa')->group(function () {
//         Route::get('', function () {
//             return 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ad reprehenderit voluptates voluptas nisi velit quos beatae explicabo esse culpa?';
//         });
//         Route::get('ford', function () {
//             return 'made in usa';
//         });
//         Route::get('tesla', function () {
//             return 'made in usa';
//         });
//     });
//     Route::prefix('ger')->group(function () {
//         Route::get('mercedes', function () {
//             return 'made in ger';
//         });
//         Route::get('audi', function () {
//             return 'made in ger';
//         });
//         Route::get('volkswagen', function () {
//             return 'made in ger';
//         });
//     });
// });

// Route::fallback(function(){
//     return redirect('/');
// });

Route::get('link', function () {
    $url = route('tr');
    return "<a href='$url'>go to welcom</a>";
});

Route::get('hello', function () {
    return 'hello rehab';
})->name('tr');

Route::get('login', function () {
    return view('login');
});

Route::post('/submit', function () {
    return 'date enter';
})->name('submit');


//  task3
// Route::get('contact_task3', function () {
//     return view('contact_task3');
// });

// Route::post('send', function (Request $request) {
//     $name = $request->input('name');
//     $email = $request->input('email');
//     $subject = $request->input('subject');
//     $message = $request->input('message');

//     $info = "Name: " . $name . '<br>';
//     $info .= "Email: " . $email . '<br>';
//     $info .= "Subject: " . $subject .'<br>';
//     $info .= "Message: " . $message;

//     return $info;
// })->name('send');
// end of task 3

Route::get('login', [ExampleController::class,'login']);
Route::post('date', [ExampleController::class,'receive'])->name('date');
Route::get('upload',[ExampleController::class, 'uploadform']);
Route::post('upload',[ExampleController::class, 'upload'])->name('upload');
Route::get('test_one_to_one', [ExampleController::class,'test']);


// Route::prefix('cars')->group(function(){
//     Route::get('',[CarController::class, 'index'])->name('cars.index');
//     Route::get('create',[CarController::class, 'create'])->name('cars.create');
//     Route::post('store',[CarController::class, 'store'])->name('cars.store');
//     Route::get('{id}/edit',[CarController::class, 'edit'])->name('cars.edit');
//     Route::put('{id}/update',[CarController::class, 'update'])->name('cars.update');
//     Route::get('{id}/show',[CarController::class, 'show'])->name('cars.show');
//     Route::delete('delete/cars',[CarController::class, 'destroy'])->name('cars.destroy');
//     Route::get('trashed',[CarController::class,'showDeleted'])->name('cars.showDeleted');
//     Route::patch('{id}',[CarController::class,'restore'])->name('cars.restore');
//     Route::delete('{id}',[CarController::class, 'forcedestroy'])->name('cars.forcedestroy');
//     Route::post('upload',[CarController::class, 'upload'])->name('cars.upload');
// });

// Route::resource('cars', CarController::class)->middleware('verified')->only([
//     'index','create','store','edit','update','show',
//      'destroy','showDeleted','restore','forcedestroy','upload'
//  ]);
 

// task 4
Route::get('classes/create',[ClassController::class, 'create'])->name('classes.create');
Route::post('classes/store',[ClassController::class, 'store'])->name('classes.store');
// task 5
Route::get('classes',[ClassController::class, 'index'])->name('classes.index');
Route::get('classes/{id}/edit',[ClassController::class, 'edit'])->name('classes.edit');
// task 6
Route::put('classes/{id}/update',[ClassController::class, 'update'])->name('classes.update');
Route::get('classes/{id}/show',[ClassController::class, 'show'])->name('classes.show');
// Route::get('classes/{id}/delete',[ClassController::class, 'destroy'])->name('classes.destroy');
Route::delete('delete',[ClassController::class, 'destroy'])->name('classes.destroy');
Route::get('classes/trashed',[ClassController::class,'showDeleted'])->name('classes.showDeleted');

// PATCH: it is used to update an existing entity with new information. 
// You can't patch an entity that doesn't exist. You would use this when you have a simple update to perform, e.g. changing a user's name.
// partially updates the resource into the server mapped by the provided data

// PUT: it is used to set an entity's information completely. PUTting is similar to POSTing, except that it will overwrite the entity if already exists or create it otherwise. 
// You could use a PUT to write a user to your database that may already be in it.
// replaces the existing resource by the new one.
// so
// PUT means replace the entire resource with given data, while PATCH means replace only specified fields.
Route::patch('classes/{id}',[ClassController::class,'restore'])->name('classes.restore');
Route::delete('classes/{id}',[ClassController::class, 'forcedestroy'])->name('classes.forcedestroy');
// task 8
Route::post('classes/upload',[ClassController::class, 'upload'])->name('classes.upload');

// task 9
Route::get('products/index', [ProductController::class,'index'])->name('products.index')->middleware('verified');
Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('products/store',[ProductController::class, 'store'])->name('products.store');
Route::get('products/about', [ProductController::class,'about'])->name('products.about');

// task 10
Route::get('products/{id}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::put('products/update/{id}',[ProductController::class, 'update'])->name('products.update');
Route::get('products/index1', [ProductController::class,'index1'])->name('products.index1');
Route::get('products/{id}/show',[ProductController::class, 'show'])->name('products.show');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// task 12
Route::get('contact_task3',[ExampleController::class, 'contact_task3'])->name('contact_task3')->middleware('admin');
Route::post('send',[ExampleController::class,'send'])->name('send');
   