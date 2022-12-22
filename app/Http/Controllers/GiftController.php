<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::all();
        return view('gift.index', compact('gifts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDAZIONE SENZA VALIDATOR
        $request->validate([
            'name' => 'required|max:15',
        ]);
        $form_data = $request->all();


        //$newgift = new Gift();

        //alternativa con fill e fillable
        //$newproduct->fill($form_data);

        //alternativa senza fillable
        // $newproduct->title = $form_data['title'];
        // $newproduct->description = $form_data['description'];
        // $newproduct->type = $form_data['type'];
        // $newproduct->image = $form_data['image'];
        // $newproduct->cooking_time = $form_data['cooking_time'];
        // $newproduct->weight = $form_data['weight'];

        //$newproduct->save();

        //qui sempre con fillable sul model creo l'oggetto, lo popolo e lo salvo sul db
        $newGift = Gift::create($form_data);

        return redirect()->route('gift.show', $newGift->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        return view('gift.show', compact('gift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        return view('gift.edit', compact('gift'));
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
        $gift = Gift::find($id);

        $form_data = $request->all();

        $gift->name = $form_data['name'];
        $gift->surname = $form_data['surname'];
        $gift->imGift = $form_data['imgGift'];
        $gift->nameGift = $form_data['nameGift'];
        $gift->kidGood = $form_data['kidGood'];

        $gift->update();

        return redirect()->route('gift.show', $gift->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        //
        $gift->delete();
        return redirect()->route('gift.index');
    }
}
