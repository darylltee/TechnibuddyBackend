<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PoolOptions;

class PoolOptionsController extends Controller
{
    public function index()
    {
    	return PoolOptions::all();
    }

    public function store()
    {
    	$pooloptions = new PoolOptions(Requests::all());
    	$pooloptions->save();
    	return $pooloptions;
    }

    public function show($id)
    {
    	$pooloption = PoolOptions::find($id);
    	return $pooloption;
    }

    public function addVote($id)
    {
    	$pooloption = PoolOptions::find($id);
    	$pooloption->vote++;
    	$pooloption->save();

    	return $pooloption;
    }

    public function destroy($id)
    {
    	$pooloption = PoolOptions::find($id);
    	$pooloption->delete();
    }
}
