<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developers;

class DeveloperController extends Controller
{
    public function index()
    {
        $developer = Developers::orderBy('id','desc')->paginate(5);
        return view('developer.index', compact('developer'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('developer.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'stack' => 'required',
        ]);
        
        Developers::create($request->post());

        return redirect()->route('developer.index')->with('success','Developer has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Developers  $developer
    * @return \Illuminate\Http\Response
    */
    public function show(Developers $developer)
    {
        return view('developer.show',compact('developer'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Developers  $developers
    * @return \Illuminate\Http\Response
    */
    public function edit(Developers $developer)
    {
        return view('developer.edit',compact('developer'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Developers  $developer
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Developers $developer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'stack' => 'required',
        ]);
        
        $developer->fill($request->post())->save();

        return redirect()->route('developer.index')->with('success','Developer Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Developers  $developer
    * @return \Illuminate\Http\Response
    */
    public function destroy(Developers $developer)
    {
        $developer->delete();
        return redirect()->route('developer.index')->with('success','Developer has been deleted successfully');
    }
}
