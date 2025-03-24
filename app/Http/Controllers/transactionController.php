<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
    //

    public function registerOrder(Request $request)
{
    // inicio de transaccion
    DB::beginTransaction();

    try {
        //Registrar el cliente
        $client = Client::create([
            'doc_type'=> $request->doc_type,
            'doc_number'=> $request->doc_number,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone'=> $request->phone,
            'email'=> $request->email
        ]);

        // Registrar la orden de pago con el ID del cliente
        $order = Order::create([
            'id_client' => $client->id_client,  // Relacionar la orden con el cliente
            'total'=> $request->total,
            'doc_type'=> $request->doc_type,
            'doc_number'=> $request->doc_number,
            'created_at'=> now(),
        ]);

        // Registrar los items (libros)
        foreach ($request->items as $item) {
            //se agregan los items a la tabla intermedia
            $order->books()->attach($item['id_book'], [
                'quantity' => $item['quantity'],
                'detail_price' => $item['detail_price']
            ]);
        }

        //confirmar la transaccion
        DB::commit();

        return response()->json([
            'message' => 'Order creada satisfactoriamente!',
            'order' => $order
        ], 201);

    } catch (\Exception $e) {
        // rollback si hay excepcion
        DB::rollBack();

        return response()->json([
            'message' => 'Error al crear la orden',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
