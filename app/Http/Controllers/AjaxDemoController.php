<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;


class AjaxDemoController extends Controller
{
	/**
     * Show the application myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
    	$states = DB::table('states')->pluck("name","id")->all();
    	return view('myform',compact('states'));
    }


    /**
     * Show the application selectAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAjax(Request $request)
    {
    	if($request->ajax()){
    		$cities = DB::table('cities')->where('state_id',$request->state_id)->pluck("name","id")->all();
    		$data = view('ajax-select',compact('cities'))->render();
    		return response()->json(['options'=>$data]);
    	}
    }
}