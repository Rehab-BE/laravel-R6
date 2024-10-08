<?php

namespace App\Http\Controllers;

use App\Models\Class1;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Traits\Common;

class ClassController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = class1::get();
        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class_name' => 'required|string',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'time_from' => 'required|date_format:H:i',
            'time_to' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
       
        $data['image'] = $this->uploadFile($request->image, 'asset/images/classes/');
        $data['is_fulled'] = isset($request->is_fulled);
        Class1::create($data,);
        return redirect()->route('classes.index');
    }

    public function upload(UploadedFile $image)
    {
        $file_extension = $image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'asset/images';
        $image->move($path, $file_name);
        return $path . '/' . $file_name;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Class1::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Class1::findOrFail($id);
        return view('edit_class', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  $data = [
        //     'class_name' => $request->class_name,
        //     'capacity' => $request->capacity,
        //     'price' => $request->price,
        //     'time_from' => $request->time_from,
        //     'time_to' => $request->time_to,
        //     'is_fulled' => isset($request->is_fulled),
        //  ];
        //  Class1::where('id',$id)->update($data);
        //  return redirect()->route('classes.index');
        $data = $request->validate([
            'class_name' => 'required|string',
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
            'time_from' => 'required|date_format:H:i:s',
            'time_to' => 'required|date_format:H:i:s',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        
        if($request->hasFile('image')) {
        $data['image'] = $this->uploadFile($request->image, 'asset/images/classes/');
        }
        $data['is_fulled'] = isset($request->is_fulled);
        Class1::where('id', $id)->update($data);
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     Class1::where('id',$id)->delete();
    //     return redirect()->route('classes.index');
    // }

    public function destroy(Request $request, ): RedirectResponse
    {
        $id = $request->id;
        Class1::where('id', $id)->delete();
        return redirect('classes');
    }

    public function showDeleted()
    {
        $classes = Class1::onlyTrashed()->get();
        return view('trashed_class', compact('classes'));
    }

    public function restore(string $id)
    {
        Class1::where('id', $id)->restore();
        return redirect()->route('classes.showDeleted');
    }

    public function forcedestroy(string $id)
    {
        Class1::where('id', $id)->forceDelete();
        return redirect()->route('classes.index');
    }
}
