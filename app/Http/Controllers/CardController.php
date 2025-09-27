<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
class CardController extends Controller
{


    public function index() {
       $cards  = Card::all();
       return view('index',compact('cards'));
    }

    public function  store( Request $request) {
        $data =$request->validate([
            'content' => 'required|string|max:190'
        ]);

        Card::create($data);
        return response('Card created successfuly');        
    }

    
    public function destroy(Card $card) {
        
        $card->delete();
        return response('Card deleted successfuly');   
    }
    
}
