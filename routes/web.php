<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
Route::prefix('cars')->group(function () {
    Route::prefix('usa')->group(function () {
        Route::get('', function () {
            return 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque ad reprehenderit voluptates voluptas nisi velit quos beatae explicabo esse culpa?';
        });
        Route::get('ford', function () {
            return 'made in usa';
        });
        Route::get('tesla', function () {
            return 'made in usa';
        });
    });
    Route::prefix('ger')->group(function () {
        Route::get('mercedes', function () {
            return 'made in ger';
        });
        Route::get('audi', function () {
            return 'made in ger';
        });
        Route::get('volkswagen', function () {
            return 'made in ger';
        });
    });
});

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

Route::get('contact_task3', function () {
    return view('contact_task3');
});

Route::post('send', function (Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $subject = $request->input('subject');
    $message = $request->input('message');

    $info = "Name: " . $name . '<br>';
    $info .= "Email: " . $email . '<br>';
    $info .= "Subject: " . $subject .'<br>';
    $info .= "Message: " . $message;

    return $info;
})->name('send');
