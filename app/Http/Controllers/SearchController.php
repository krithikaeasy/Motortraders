<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MotorImage;
use App\UserDetail;
use App\UserMotor;
use App\User;
use DB;
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
        $motors = UserMotor::where('vtype', 'bikes')->get();

        response()->json([
            'status' => 'success',
            'data' => $motors
        ], 200);

        return view('content.viewsearchbikes', [
            'motors' => $motors
        ]);


        $motors = UserMotor::all();
        return view('content.viewsearchbikes', [
            'motors' => $motors
        ]);
    }

    public function getSearchData(Request $request)
    {
        DB::enableQueryLog();

        $input = $request->input();
        $manufacture = @$input['manufacture'];
        $model = @$input['model'];
        $district = @$input['district'];
        $priceMin = (float)@$input['price_min'];
        $priceMax = (float)@$input['price_max'];
        $yearFrom = (int)@$input['year_from'];
        $yearTo = (int)@$input['year_to'];
        $colour = @$input['colour'];
        $state = @$input['state'];
        $ccMin = (int)@$input['cc_min'];
        $ccMax = (int)@$input['cc_max'];

        $query = UserMotor::query()
            ->with([
                'motorImages',
                'user' => function ($q) {
                    return $q->with([
                        'userDetail' // user_details table not available, so I hide userDetail data
                    ]);
                },
            ]);

        if ($manufacture) {
            $query->where('manufacture', 'LIKE', "%$manufacture%");
        }

        if ($priceMin) {
            $query->where('price', '>=', $priceMin);
        }

        if ($priceMax) {
            $query->where('price', '<=', $priceMax);
        }

        if ($model) {
            $query->where('model', 'LIKE', "%$model%");
        }

        if ($yearFrom) {
            $query->where('year', '>=', $yearFrom);
        }

        if ($yearTo) {
            $query->where('year', '<=', $yearTo);
        }

        if ($district) {
            $query->where('district', 'LIKE', "%$district%");
        }

        if ($colour) {
            $query->where('colour', $colour);
        }

        if ($state) {
            $query->where('state', $state);
        }

        if ($ccMin) {
            $query->where('cc', '>=', $ccMin);
        }

        if ($ccMax) {
            $query->where('cc', '<=', $ccMax);
        }


//        $searches = $query->toSql();
        $searches = $query->get();
        // $searches->toArray();


        /* return [
              $searches,
              DB::getQueryLog()
          ];*/

        return view('content.viewsearchbikes', [
            'searches' => $searches
        ]);
    }

    public function getSearchDisplay(Request $request)
    {
        // return $request['id'];
        $searchdisplays = UserMotor::where('id', $request['id'])
            ->with('motorImages', 'user')
            ->first();
        //return $searchdisplays;
        return view('content.viewsearchbikesdisplay', [
            'searchdisplay' => $searchdisplays
        ]);

    }

    public function getViewSearchReturn(Request $request)
    {
        //return $request['id'];
        $searches = UserMotor::where('id', $request['id'])
            ->with('motorImages', 'user')
            ->get();
        return view('content.viewsearchbikesreturn', [
            'searches' => $searches
        ]);
    }

    public function getViewSearchReturnDisplay(Request $request, $id)
    {

        $motor = UserMotor::query()
            ->with([
                'motorImages',
                'user' => function ($q) {
                    return $q->with([
                        'userDetail'
                    ]);
                }
            ])
            ->find($id);

        return view('content.viewsearchbikesdisplayreturn', [
            'motor' => $motor
        ]);
    }


}

