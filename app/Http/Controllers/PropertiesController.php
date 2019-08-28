<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\properties;
use App\descriptions;
use App\facilities;
use App\contacts;
use App\lands;
use App\enquiry;


class PropertiesController extends Controller
{

   // public $fields;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = properties::latest()->paginate(10);
        return view('properties.index',compact('properties'))
                  ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
         properties::create($request->all());
        descriptions::create($request->all());
        facilities::create($request->all());
        contacts::create($request->all());

    
        // $fields==Input::get('facility_name');
        // if($fields == 'Land'){
        //      lands::create($request->all());
        //  }
        lands::create($request->all());
        $properties = new properties();
    //     $employee->name = $request->input('name');
       
       if ($request->hasFile('image')) {
       $file = $request->file('image');
       $extension = $file->getClientOriginalExtension();
       $filename = time() . '.' . $extension;
       $properties->image = $filename; 
        }
        else{
            return $request;
            $properties->property_image = '';
        }
       $properties->save();
       return view('properties')->with('properties',$properties);
        
       properties::create($request->all());      
        return redirect()->route('properties.index')
                        ->with('success','properties created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(properties $property)
    {
        
        return view('properties.show',compact('property'));
       
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(properties $property)
    {
        return view('properties.edit',compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,properties $property)
    {
        request()->validate([
            'property_type' => 'required',
            
            'location' => 'required',
            'property_for' => 'required',
            'area' => 'required',
        ]);
        $property->update($request->all());
        return redirect()->route('properties.index')
                        ->with('success','properties updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        properties::destroy($id);
        return redirect()->route('properties.index')
                        ->with('success','properties deleted successfully');
    }

    public function myform()
    {
    	$states = DB::table('states')->pluck("name","id")->all();
    	return view('properties.create',compact('states'));
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

    public function facility()
    {
    	$facilities = DB::table('facilities')->pluck("name","id")->all();
    	return view('properties.create',compact('facilities'));
    }


    // public function selectAjaxs(Request $request)
    // {
    // 	if($request->ajax()){
    // 		$cities = DB::table('cities')->where('state_id',$request->state_id)->pluck("name","id")->all();
    // 		$data = view('ajax-select',compact('cities'))->render();
    // 		return response()->json(['options'=>$data]);
    // 	}
    // }
}
