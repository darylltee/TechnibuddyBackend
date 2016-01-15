<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pool;

class PoolsController extends Controller
{
    public function index()
    {
    	return Pool::with('poolOptions')->get();
    }

    public function store()
    {
    	$pool = new Pool(Request::all());
    	$pool->save();
    	return $pool;
    }

    public function show($id)
    {
    	return Pool::with('poolOptions')->findOrFail($id);
    }

    public function destroy($id)
    {
    	$pool = Pool::find($id);
    	$pool->delete();
    }
}
