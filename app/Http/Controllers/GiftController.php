<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
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

        if ($request->psw == 'XxBabboNatalexX') {

            $gifts = Gift::all();
            $user = User::all();
            if ($request->query('search') == 'buoni' && $request->query('psw') == 'XxBabboNatalexX') {
                $gifts = Gift::where('kidGood', 1)->get();
            } elseif ($request->query('search') == 'cattivi' && $request->psw == 'XxBabboNatalexX') {
                $gifts = Gift::where('kidGood', 0)->get();
            } elseif ($request->psw == 'XxBabboNatalexX') {
                $gifts = Gift::all();
            }


        } else {
            return view('home');
        }


        $santaPsw = $request->psw;
        // Session::put('psw', $santaPsw);
        // $gifts = Gift::all();
        return view('gift.index', compact('gifts'), compact('user'))->with('psw', "XxBabboNatalexX");

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

        $form_data = $this->validation($request->all());

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

        // $form_data = $this->validation($request->all());
        $form_data = $request->all();

        $gift->name = $form_data['name'];
        $gift->surname = $form_data['surname'];
        $gift->imgGift = $form_data['imgGift'];
        $gift->description = $form_data['description'];
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
    public function destroy(Gift $gift, Request $request)
    {
        $form_data = $request->psw;

        $gift->delete();
        return redirect()->route('gift.index', ['psw' => $form_data]);

    }
    private function validation($data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|min:3|max:50',
            'surname' => 'required|max:20',
            'imgGift' => 'required',
            'nameGift' => 'required|max:20',
            'description' => 'required',
            'kidGood' => 'required'
        ], [
                'name.required' => 'Il nome è obbligatorio.',
                'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
                'name.max' => 'Il nome non può superare i :max caratteri.',
                'surname.required' => 'Il cognome è obbligatorio.',
                'surname.max' => 'Il cognome non può superare i :max caratteri.',
                'imgGift.required' => 'Immagine obbligatoria',
                'description' => 'Metti la descrizione perfavore, sto male',
                'kidGood' => 'seleziona un obbligatorio',
            ])->validate();

        return $validator;
    }
}