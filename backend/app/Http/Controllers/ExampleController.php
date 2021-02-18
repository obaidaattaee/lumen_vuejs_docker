<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index (){
        // return User::get();
        try {
            return [DB::connection()->session_status , 'obaida'];
        } catch (\Exception $e) {
            dd([$e  , 'asdads']);
        }
        return config('database');
        return response()->json(['message' => 'this from conteoller']);
    }
}
