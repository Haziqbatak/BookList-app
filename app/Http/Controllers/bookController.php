<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\place;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = category::select('id', 'name')->get();
        $place = place::select('id', 'name')->get();
        $book = book::all();
        return view('book.index', compact('category', 'place', 'book'));
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
        $validated = $request->validate([
            'isbn' => 'required',
            'image' => 'image|mimes:png,jpg',
            'pdf' => 'mimes:pdf'
        ]);

        $data = $request->all();

        $image = $request->file('image');
        $image->storeAs('public/book', $image->hashName());

        $pdf = $request->file('pdf');
        $pdf->storeAs('public/book/pdf', $pdf->hashName());

        $data['image'] = $image->hashName();
        $data['pdf'] = $pdf->hashName();

        book::create($data);

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
        $book = book::findOrFail($id);
        $category = category::get();
        $place = place::get();
        return view('book.edit', compact('book', 'category', 'place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'edition' => 'required',
            'publishing' => 'required',
            'isbn' => 'required',
            'image' => 'image|mimes:png,jpg',
            'pdf' => 'mimes:pdf'
        ]);


        $book = book::find($id);

        $data = $request->all();

        try {
            if (!$request->file('image') == '') {

                Storage::disk('local')->delete('public/book/' . basename($book->image));

                $image = $request->file('image');

                $image->storeAs('public/book', $image->hashName());
                $data['image']= $image->hashName();
            }
            if (!$request->file('pdf') == '') {
                Storage::disk('local')->delete('public/book/pdf/' . basename($book->pdf));

                $pdf = $request->file('pdf');

                $pdf->storeAs('public/book/pdf', $pdf->hashName());
                $data['pdf']= $pdf->hashName();
            }

            $book->update($data);

            return redirect()->route('book.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = book::findOrFail($id);

        Storage::disk('local')->delete('public/book' . basename($data->image));
        Storage::disk('local')->delete('public/book/pdf' . basename($data->image));

        $data->delete();
        return redirect()->route('book.index');
    }
}
