<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Client;
use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
    public function index(){
        $book = Client::all();

        $data = [
            'clients' => $book,
            'status' => 200
        ];

    

        
        return response ()->json($data,200);

    }

    public function show ($id){

        $client = Client::find($id);

        if(!$client){
            $data = [
                'message'=> 'Cliente no encontrado',
                'status'=> 404
                ];

                return response()->json($data,404);
        }

        $data = [
            'clients'=> $client,
            'status'=> 200
        ];

        return response()->json($data, 200);


    }
}
