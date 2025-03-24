<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class orderController extends Controller
{
    //
    
    //regla para monto
    
    public function index(){
        $order = Order::all();

        $data = [
            'orders' => $order,
            'status' => 200
        ];

    

        
        return response ()->json($data,200);

    }

    public function store (Request $request){
        $amount_rule = 'required|regex:/^\d+(\.\d{1,2})?$/';

        $validator = Validator::make($request->all(), [
             'id_client'=> 'required|integer',
             'total'=> $amount_rule,
             'doc_type'=> 'required|integer',
             'doc_number'=> 'nullable',
         ]);
 
         if($validator->fails()){
             $data = [
                 'message' => 'Error en la validacion de datos',
                 'errors' => $validator->errors(),
                 'status' => 400
 
             ];
             return response()->json($data,400);
         }
 
         $orders = Order::create([
 
             'id_client'=> $request->id_client,
             'total'=> $request->total,
             'doc_type'=> $request->doc_type,
             'doc_number'=> $request->doc_number,
             'created_at'=> now(),

 
         ]);
 
         if(!$orders){
             $data = [
                 'message'=> 'Error al crear la orden de compra',
                 'status'=> 500
                 ];
             return response()->json($data,500);
 
         }
 
         $data = [
             'book'=> $orders,
             'status'=> 201
         ];
 
         return response()->json($data,201);
 
 }
}
