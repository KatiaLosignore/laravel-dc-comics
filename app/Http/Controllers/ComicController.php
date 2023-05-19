<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comic\StoreComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        
        // $request->validate([
        //     'title' => 'required|string',
        //     'description' => 'nullable|string|max:65535',
        //     'thumb' => 'required|url|max:255',
        //     'price' => 'required|numeric|min:0|max:9999',
        //     'series' => 'required|string',
        //     'sale_date' => 'required|date',
        //     'type' => 'required|string',
        // ]);


        // $form_data = $request->all();
        // dd($form_data);

        $form_data = $request->validated();

        $newComic = new Comic();

        // $newComic->title = $form_data['title'];
        // $newComic->description = $form_data['description'];
        // $newComic->thumb = $form_data['thumb'];
        // $newComic->price = $form_data['price'];
        // $newComic->series = $form_data['series'];
        // $newComic->sale_date = $form_data['sale_date'];
        // $newComic->type = $form_data['type'];

        $newComic->fill($form_data);
        
        $newComic->save();

        return redirect()->route('comics.show', ['comic'=> $newComic->id])->with('status', 'Comic successfully added!');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|min:0|max:9999',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
        ]);


        $form_data = $request->all();
        $comic->update($form_data);
        return to_route('comics.show', ['comic' => $comic->id])->with('status', 'Comic successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
