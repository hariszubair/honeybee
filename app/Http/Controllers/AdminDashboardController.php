<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserInfo;
use DB;
use Yajra\Datatables\Datatables;
use App\Restaurant;
use App\State;
use App\UserExperience;
use App\UserQualification;

class AdminDashboardController extends Controller
{
   
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $user_name = Auth::user()->name;
		return view('admin_dashboard/index', [ 'user_name' => $user_name]);
    }

    public function candidates()
    {

		return view('admin_dashboard/candidates', ['candiates' =>  DB::table('user_infos')->get() ] );
    }
        public function view_candidates()
    {

        $candidates=UserInfo::where('role_id','=',4);
        return Datatables::of($candidates)->addColumn('action',function($row) {
            $user=Auth::user();
            if($user->hasRole('Super Admin')){
           return '<a style="margin-right:5px" class="btn btn-primary" title="edit" href="./admin-candiate-edit/'.$row->user_id.'"><i class="fas fa-edit"></i></a><a  style="margin-right:5px" class="btn btn-success" title="edit" href="./admin-candiate-view/'.$row->user_id.'"><i class="fas fa-eye"></i></a>';
            }
            if($user->hasRole('Admin')){
           return '<a  style="margin-right:5px" class="btn btn-success" title="edit" href="./admin-candiate-view/'.$row->user_id.'"><i class="fas fa-eye"></i></a>';
            }

        })
        ->addColumn('update',function($row) {
           return explode(' ', $row->updated_at)[0];

        })->escapeColumns([])->make(true);
       
    }
    
    public function candiate_view($user_id)
    {
          $restaurants=Restaurant::all();
        $states=State::all();

        return view('admin_dashboard/candidate_view',  [
                                                'user_info' => UserInfo::where([ 'user_id' => $user_id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => $user_id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => $user_id])->get(),
                                                'states' => $states 
                                              ]);
    }
    public function candiate_edit($user_id)
    {
        $role=UserInfo::where('user_id',$user_id)->first()->role_id;
         $restaurants=Restaurant::all();
        $states=State::all();
        if($role == 4){
        return view('admin_dashboard/candidate_edit',  [
                                                'user_info' => UserInfo::where([ 'user_id' => $user_id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => $user_id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => $user_id])->get(),
                                                'states' => $states 
                                              ]);

        }
    }
    
    public function candiate_update(Request $request)
    {
        $user_id=$request->user_id;
        $input=$request->all();
         $experiences = $request->get('experience');
           $this->update_experience($experiences,  $user_id);


         $qualifications = $request->get('qualifications');
         $this->update_qualifications($qualifications,  $user_id);
         
         $request->replace($request->except('experience'));
         $request->replace($request->except('qualifications'));
         if($request->relocate_state){
          $request->merge(['relocate_state' => implode(",",$request->relocate_state)]);
         }
         else{
          $request->merge(['relocate_state' => null]);
         }


          if($request->get('continuous_contact') == 'on')
          {
                $request->merge(['continuous_contact' => 1]);  

          }else{

            $request->merge(['continuous_contact' => 0]);
          }
          $request->merge(['user_id' => $request->user_id]);

         
          if(!$request->relocate_state){
             $request->merge(['relocate_state' => null]);
            
          }

          $user = UserInfo::updateOrCreate( [ 'user_id'   =>   $request->user_id ], $request->all());
          
          
           return redirect()->back();
         
    }
    public function update_experience($experiences, $user_Id){
      
      
      
      if (UserExperience::where('user_id', '=',  $user_Id)->count() > 0) {
           DB::delete('delete from user_experiences where user_id = ? ', [ $user_Id]);
      }

      foreach ($experiences as $experience)
      {
        if($experience != null) {
          DB::insert('insert into user_experiences (user_id, job_title,job_from,job_to,previous_company,ex_role,ex_responsibilities,no_of_employees ) values (?, ?,?, ?,?, ?,?,? )', [ $user_Id , $experience['job_title'],$experience['job_from'],$experience['job_to'],$experience['previous_company'],'',$experience['ex_responsibilities'],$experience['no_of_employees']]);
        }
      } 
      return true;

    }

    public function update_qualifications($qualifications, $user_Id){
      
      
         if (UserQualification::where('user_id', '=',  $user_Id)->count() > 0) {
            DB::delete('delete from user_qualifications where user_id = ? ', [ $user_Id]);
          }

      foreach ($qualifications as $qualification)
      {
        
         DB::insert('insert into user_qualifications (user_id,  qualification_name,qualification_date   ) values (?, ?,?)', [ $user_Id , $qualification['qualification_name'],$qualification['qualification_date']]);
      } 
      return true;

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
