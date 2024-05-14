<?php

namespace App\Http\Controllers;

use App\Models\place;
use Illuminate\Http\Request;

class placeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $place = place::select('id','name')->get();
        return view('place.index' ,compact('place'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        place::create([
            'name'=> $request->name
        ]);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $place = place::findOrFail($id);
        return view('place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $place = place::find($id);

            $place->update([
                'name'=>$request->name
            ]);

            $place->save();

            return redirect()->route('place.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $place = place::find($id);
        $place->delete();

        return redirect()->back();

    }
}
