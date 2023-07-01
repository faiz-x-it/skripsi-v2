<?php

namespace App\Http\Controllers\Admin;

use App\Tendor;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Photo;

class AdminTendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tendors = Tendor::with('image')->orderBy('id', 'DESC')->get();
        return view('admin.Tendor.index', compact('Tendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Tendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:Tendors',
            'bio'  => 'required',
            'image_id'=> 'image|max:500'
        ];
        $message = [
            'image_id.image' => 'Image should be PNG, jpg, jpeg type'
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $create_Tendor = Tendor::create($input);
        return redirect('/admin/Tendors')
            ->with('success_message', 'Tendor created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tendor = Tendor::findOrFail($id);
        return view('admin.Tendor.edit', compact('Tendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:Tendors,slug,'.$id,
            'bio'  => 'required',
            'image_id'=> 'image|max:500'
        ];
        $message = [
            'image_id.image' => 'Image should be PNG, jpg, jpeg type'
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $Tendor = Tendor::findOrFail($id);
        $Tendor->update($input);
        return redirect('/admin/Tendors')
            ->with('success_message', 'Tendor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tendor = Tendor::findOrFail($id);

        if(! is_null($Tendor->image_id))
        {
            unlink(public_path().'/assets/img/'.$Tendor->image->file);
        }
        $Tendor->image()->delete();
        $Tendor->books()->delete();
        $Tendor->delete();

        return redirect()->back()
            ->with('alert_message', "Tendor deleted successfully.");
    }
}
