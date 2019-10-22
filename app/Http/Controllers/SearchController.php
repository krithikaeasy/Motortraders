<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\MotorImage;

use App\UserDetail;

use App\UserMotor;

use App\User;



use Validator;


class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return 1;
        $motors=UserMotor::where('vtype','bikes')->get();
        
         response()->json([
            'status' => 'success',
            'data' => $motors
        ], 200);

        return  view('content.viewsearchbikes',[
            'motors'=>$motors
        ]);
       
       
        $motors=UserMotor::all();
        return  view('content.viewsearchbikes',[
            'motors'=>$motors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSearchData(Request $request)
    { 
        
       
       // return $request['manufacture'];
       $searches = UserMotor::orWhere('manufacture', $request['manufacture'] )
       ->orWhere('model_name',  $request['model_name'])
       ->orWhere('colour', $request['colour'])
       ->orWhereBetween('price',[$request['minimum'],$request['maximum']])
       ->orWhereBetween('cc',[$request['minimum1'],$request['maximum1']])
       ->orWhereBetween('year',[$request['from'],$request['to']])
       ->with('motorImages')
       ->get();
     // var_dump($searches);

      return  view('content.viewsearchbikes',[
          'searches'=>$searches
      ]);
   }

  
}