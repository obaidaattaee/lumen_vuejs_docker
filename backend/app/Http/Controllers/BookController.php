<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller{

    public function index (){
        try {
            $books = Book::get();
        } catch (\Throwable $th) {
            return ['asd' , $th] ;
        }
        return $this->sendResponse($books , 'books fetched successfully');    
    }
    public function store(Request $request){
        $request['sold'] = $request['sold'] ? 1 : 0 ;
        $data = Validator::make($request->all() , [
            'title' =>['required'],
            'description' => ['required'],
            'auther' => ['required'],
            'isbn' =>  ['required'],
            'published_at' =>  ['required'],
            'price' =>  ['required'],
            'sold' =>  ['required'],
        ]);
        if ($data->fails()) {
            $this->sendError($data->errors() );
        }
        $data = $data->validated() ;
        try {
            $book = Book::create($data) ;
        } catch (\Throwable $th) {
            dd($th) ;
        }
        return  $this->sendResponse($book , 'book create successfully'  , true , 201);
    }
    public function show(Request $request){
        $book = Book::find($request['book']);
        return $this->sendResponse($book , 'fetched successfully');
    }
    public function delete(Request $request){
        Book::find($request['book'])->delete();
        return $this->sendResponse([ 'book_id' => $request['book'] ], 'deleted');
    }
    public function update(Request $request){
        try {
        $data = $request['book'];
        $data['sold'] = $data['sold'] ? 1 : 0 ;
        $data = Validator::make($data , [
            'title' =>['required'],
            'description' => ['required'],
            'auther' => ['required'],
            'isbn' =>  ['required'],
            'published_at' =>  ['required'],
            'price' =>  ['required'],
            'sold' =>  ['required'],
        ]);
        if ($data->fails()) {
            $this->sendError($data->errors() );
        }
        $data = $data->validated() ;
        $book = DB::table('books')->where('id' , $request['book'])->update($data);
        return $this->sendResponse($book, 'updated' , true , 202);
        } catch (\Throwable $th) {
            return $th ;
        }
    }
}
