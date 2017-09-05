<?php

namespace App\Http\Controllers;

use App\Diamond;
use Illuminate\Http\Request;

class DiamondController extends Controller
{
    public function index()
    {
    	return view('diamond/index');
    }

    public function getData()
    {
    	$model = Diamond::SearchPaginateAndOrder();
        // $model = Diamond::all();

    	$columns = Diamond::$columns;
    	return response()
    		->json([
    		'model' => $model,
    		'columns' => $columns
    		]);
    }
}
