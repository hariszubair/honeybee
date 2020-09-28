<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserInfo;
use DB;


class AdminDashboardController extends Controller
{
   
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user = Auth::guard('admin')->user();
        echo '<pre>';
        print_r($user);
        echo '</pre>';
        die();*/
        $user_name = Auth::guard('admin')->user()->name;
		return view('admin_dashboard/index', [ 'user_name' => $user_name]);
    }

    public function candidates()
    {

		return view('admin_dashboard/candidates', ['candiates' =>  DB::table('user_infos')->get() ] );
    }

    public function candiate_edit($user_id)
    {
        
        return view('admin_dashboard/candidate_edit',  ['user_info' => UserInfo::where([ 'user_id' => $user_id ])->get()]);
    }
    public function candiate_update(Request $request)
    {

        $user = UserInfo::updateOrCreate( [ 'user_id'   => $request->user_id ], $request->all());
   
        return redirect('admin-candidates');

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
        //
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
    
}
