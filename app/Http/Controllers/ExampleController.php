<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactUsForm;

use Mail;

class ExampleController extends Controller
{

    function send(){
        return view('send');
    }


    function login(){
        return view('login');
    }


    function receive(Request $request){
        return $request['email']. '<br>' . $request->pwd;
    }
    function uploadform(){
        return view('upload');
    }
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'asset/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }

    public function test(){
        // dd(Student::find(1)?->phone->phone_number);
        dd(
            DB::table('students')
                ->join('phones', 'phones.id', '=', 'students.phone_id')
                ->where('students.id', 1) 
                ->first()
        );
    }
    
}