<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\WatchRequest;
use App\Watch;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('watch.index', [
            'watches' => Watch::all(),
            'categories' => Category::all(),
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchRequest $request)
    {
        $path = 'https://static.thenounproject.com/png/4209393-200.png';
        $watch = new Watch();
        if($request->file('watch_image')){
            $path = $request->file('watch_image')->store('public/watches');
            $path = str_replace('public','storage',$path);
        }

        $watch->watch_name = $request->get('watch_name');
        $watch->watch_description = $request->get('watch_description');
        $watch->watch_material = $request->get('watch_material');
        $watch->category_id = $request->get('category_id');
        $watch->watch_image = $path;
        $watch->save();
        return redirect('/watches');
    }

    public function show(Watch $watch)
    {
        return view('watch.show',[
            'watch' => $watch
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Watch $watch)
    {
        return view('watch.edit',[
            'watch' => $watch,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WatchRequest $request, Watch $watch)
    {
        $path = 'https://static.thenounproject.com/png/4209393-200.png';
        if($request->file('watch_image')){
            $path = $request->file('watch_image')->store('public/watches');
            $path = str_replace('public','storage',$path);
        }

        $watch->watch_name = $request->get('watch_name');
        $watch->watch_description = $request->get('watch_description');
        $watch->watch_material = $request->get('watch_material');
        $watch->category_id = $request->get('category_id');
        $watch->watch_image = $path;
        $watch->save();
        return redirect('/watches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Watch $watch)
    {
        $watch->delete();
        return back();
    }
}
