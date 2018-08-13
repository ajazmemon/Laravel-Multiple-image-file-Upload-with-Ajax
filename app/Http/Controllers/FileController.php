<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
//
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
return view('create');
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    
$this->validate($request, [
'filenames' => 'required',
 'filenames.*' => 'mimes:doc,pdf,docx,zip'
]);



if($request->hasfile('filenames'))

{

foreach($request->file('filenames') as $file)

{

$name = $file->getClientOriginalName();

$file->move(public_path().'/files/', $name);

$data[] = $name;

}

}



$file = new File();

$file->filenames = json_encode($data);

$file->save();



return back()->with('success', 'Data Your files has been successfully added');


}

/**
 * Display the specified resource.
 *
 * @param  \App\File  $file
 * @return \Illuminate\Http\Response
 */
public function show(File $file)
{
//
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\File  $file
 * @return \Illuminate\Http\Response
 */
public function edit(File $file)
{
//
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\File  $file
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, File $file)
{
//
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\File  $file
 * @return \Illuminate\Http\Response
 */
public function destroy(File $file)
{
//
}
}
