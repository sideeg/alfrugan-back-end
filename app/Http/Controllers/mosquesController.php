<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mosque;
use Session;

class mosquesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mosques = mosque::all();
        
        return view('mosques.index')->withmosques($mosques);

    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('mosques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate For Type
        $this->validate($request , array(

            'name'                       =>  'required|max:20',
            'brief_location_description' =>  'required|max:20',
            'full_location_description'  =>  'required|max:50',
            'image'                      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',));

        $path = $request->file('image')->store('public/images');

        //Create And Save
        $mosque = new mosque() ;
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $mosqueImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $mosqueImage);
            $mosque['image'] = "$mosqueImage";
            }
        $mosque->name                        =$request->name;
        $mosque->lat                         =$request->lat;
        $mosque->long                        =$request->long;
        $mosque->brief_location_description  =$request->brief_location_description;
        $mosque->full_location_description   =$request->full_location_description;
        $mosque->image                       =$path ;

        $mosque->save();

        //flash messge
        Session::flash('SUCCESS','DONE ADD NEW  mosque!');

        // redirect
        return $this->index();
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
        $mosque = mosque::find($id);
        return view('mosques.edit')->withmosque($mosque);


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
        //
        $mosque = mosque::find($id);
        //Validate For Type
        $this->validate($request , array(
            'name'                       =>  'required|max:20',
            'brief_location_description' =>  'required|max:20',
            'full_location_description'  =>  'required|max:50',
            // 'image'                      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $mosque->name                        =$request->name;
        $mosque->lat                         =$request->lat;
        $mosque->long                        =$request->long;
        $mosque->brief_location_description  =$request->brief_location_description;
        $mosque->full_location_description   =$request->full_location_description;
        // $mosque->image                       =$path ;
            //edit img
        if ($files = $request->file('image')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $mosque['image'] = "$profileImage";
            }

        $mosque->save();


        //flash messge
        Session::flash('SUCCESS','DONE EDIT Exist mosque!');

        // redirect
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mosque = mosque::find($id);
        $mosque->delete();

        Session::flash('SUCCESS','This mosque Successfully Delete  !');


        return $this->index();
    }
}
