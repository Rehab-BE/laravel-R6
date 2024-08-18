<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ExampleController extends Controller
{
//   task 12
    public function contact_task3(){
        return view('contact_task3');
    } 

    public function send(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $msg = $request->input('message');
    
        Mail::to('rehabadal202@gamil.com')->send(new \App\Mail\ContactusMail($name, $email, $subject, $msg));

        // return back()->with('success', 'Email sent successfully!');
        return ('Email sent successfully!');
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