<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;


class bookController extends Controller
{
        /**
     * Buscar libros por ISBN o nombre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index (){
        
        $book = Book::all();

        $data = [
            'books' => $book,
            'status' => 200
        ];

    

        
        return response ()->json($data,200);

    }

    public function store (Request $request){

       $validator = Validator::make($request->all(), [
            'isbn'=> 'required',
            'name'=> 'required',
            'stock'=> 'required',
            'precio'=> 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400

            ];
            return response()->json($data,400);
        }

        $books = Book::create([

            'isbn'=> $request->isbn,
            'name'=> $request->name,
            'stock'=> $request->stock,
            'precio'=> $request->precio

        ]);

        if(! $books){
            $data = [
                'message'=> 'Error al crear el libro',
                'status'=> 500
                ];
            return response()->json($data,500);

        }

        $data = [
            'book'=> $books,
            'status'=> 201
        ];

        return response()->json($data,201);

}

    public function show ($id){

        $book = Book::find($id);

        if(!$book){
            $data = [
                'message'=> 'Libro no encontrado',
                'status'=> 404
                ];

                return response()->json($data,404);
        }

        $data = [
            'book'=> $book,
            'status'=> 200
        ];

        return response()->json($data, 200);


    }

    public function search (Request $request){
        
        $query = Book::query();

        // Buscar por ISBN
        if ($request->has('isbn')) {
            $query->where('isbn', $request->input('isbn'));
        }

        // Buscar por nombre
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        \Log::info($query->toSql());

        $books = $query->get();

        return response()->json($books);
    }

}
