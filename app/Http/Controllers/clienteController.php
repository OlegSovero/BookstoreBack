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

    public function store (Request $request){

        $validator = Validator::make($request->all(), [
             'doc_type'=> 'required|integer',
             'doc_number'=> 'required|string',
             'first_name'=> 'required|string',
             'last_name'=> 'required|string',
             'phone' => 'nullable',
             'email'=> 'email'
         ]);
 
         if($validator->fails()){
             $data = [
                 'message' => 'Error en la validacion de datos',
                 'errors' => $validator->errors(),
                 'status' => 400
 
             ];
             return response()->json($data,400);
         }
 
         $clients = Client::create([
 
             'doc_type'=> $request->doc_type,
             'doc_number'=> $request->doc_number,
             'first_name'=> $request->first_name,
             'last_name'=> $request->last_name,
             'phone'=> $request->phone,
             'email'=> $request->email
 
         ]);
 
         if(!$clients){
             $data = [
                 'message'=> 'Error al crear el cliente',
                 'status'=> 500
                 ];
             return response()->json($data,500);
 
         }
 
         $data = [
             'book'=> $clients,
             'status'=> 201
         ];
 
         return response()->json($data,201);
 
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
