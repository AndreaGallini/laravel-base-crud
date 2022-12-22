<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if (!empty($request->query('search'))) {
        //     $kidGood = $request->query('search');
        //     //dd($type);
        //     $gifts = Gift::where('kidGood', $kidGood)->get();

        // } else {
        //     $gifts = Gift::all();
        // }
        if ($request->query('search') == 'buoni') {
            $gifts = Gift::where('kidGood', 1)->get();
        } elseif ($request->query('search') == 'cattivi') {
            $gifts = Gift::where('kidGood', 0)->get();
        } else {
            $gifts = Gift::all();
        }

        // $gifts = Gift::all();
        return view('gift.index', compact('gifts'));

    }

    /**{{  }}
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
        // $request->validate([
        //     'name' => 'required|max:15',
        //     'surname' => 'required|max:20',
        //     'imgGift' => 'required',
        //     'nameGift' =>'required'
        // ]);
        // $form_data = $request->all();

        //VALIDAZIONE CON VALIDATOR
        $form_data = $this->validation($request->all());


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
        // dd($form_data);
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
        $gift->imgGift = $form_data['imgGift'];
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
        return redirect()->route('gift.index')->with('message', "Il tuo prodottocon id:  {$gift->id}  è stato  cancellato con successo !");;
    }
    private function validation($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:5|max:50',
            'surname' => 'required|max:20',
            'imgGift' => 'required',
            'nameGift' => 'required|max:20',
            'description' => 'required|max:20',
            'kidGood' =>'required'
        ], [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'surname.max' => 'Il cognome non può superare i :max caratteri.',
            'imgGift.required' => 'Immagine obbligatoria',
            'description'=> 'Metti la descrizione perfavore, sto male',
            'kidGood' =>'seleziona un obbligatorio',
        ])->validate();

        return $validator;
    }
}
