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
use App\User;
use Mail;
use \Carbon\Carbon;
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

		return view('admin_dashboard/candidates');
    }
        public function view_candidates()
    {

        $candidates=User::whereHas('roles', function ($query) {
    return $query->where('name', 'Candidate');
        })->with('userinfo')->get();
        return Datatables::of($candidates)->addColumn('action',function($row) {
            $user=Auth::user();
            $temp='';
            if($user->hasRole('Super Admin')){
               if($row->userinfo){
              $temp='<a target="_blank" style="margin-right:5px" class="btn btn-primary" title="edit" href="./admin-candidate-edit/'.$row->id.'"><i class="fas fa-edit"></i></a><a  target="_blank" style="margin-right:5px" class="btn btn-success" title="View" href="./admin-candidate-view/'.$row->id.'"><i class="fas fa-eye"></i></a>';
                    }
                     $temp.= '<a target="_blank" style="margin-right:5px" class="btn btn-info" title="Mail" href="./mail/'.$row->id.'"><i class="fas fa-paper-plane"></i></a><a  target="_blank" style="margin-right:5px" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')" title="delete" href="./admin-candidate-delete/'.$row->id.'"><i class="fas fa-trash"></i></a>';
                return $temp;
            }
            if($user->hasRole('Admin')){
               if($row->userinfo){
           return '<a  target="_blank" style="margin-right:5px" class="btn btn-success" title="edit" href="./admin-candidate-view/'.$row->id.'"><i class="fas fa-eye"></i></a>';
            }
            }

        })->addColumn('detail',function($row) {
            if ($row->login_time == 0){
                $login_time=' < 2 minutes';
            }
            else{
                $login_time=$row->login_time.' minutes';
            }
             $temp='<b>Device:</b>'.$row->device.'</br> <b>Active Time:</b>'.$login_time;
             return $temp;

        })
        ->addColumn('update',function($row) {
           return explode(' ', $row->updated_at)[0];

        })->escapeColumns([])->make(true);
       
    }
    
    public function candidate_view($user_id)
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
    public function candidate_edit($user_id)
    {
        $role=UserInfo::where('user_id',$user_id)->first();
        if(!$role)
        {
            return redirect()->route('all_candidates');
        }

         $restaurants=Restaurant::all();
        $states=State::all();
        if($role->role_id == 4){
        return view('admin_dashboard/candidate_edit',  [
                                                'user_info' => UserInfo::where([ 'user_id' => $user_id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => $user_id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => $user_id])->get(),
                                                'states' => $states 
                                              ]);

        }
    }
    
    public function candidate_update(Request $request)
    {
         $user_id=$request->id;
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
          $request->merge(['user_id' => $request->id]);

         
          if(!$request->relocate_state){
             $request->merge(['relocate_state' => null]);
            
          }
$request->merge(['date_birth' => Carbon::parse($request->date_birth)->format('Y-m-d')]);
          $user = UserInfo::updateOrCreate( [ 'user_id'   =>   $request->id ], $request->all());
          
          
           return redirect()->back();
         
    }
    public function candidate_delete($user_id)
    {
            $user=User::with('userinfo','experiences','qualifications')->find($user_id);
        if($user->userinfo){
            if(count($user->experiences)> 0){
                UserExperience::where('user_id',$user_id)->delete();
            }
            if(count($user->qualifications) > 0){
                UserQualification::where('user_id',$user_id)->delete();
            }
            $user->userinfo->delete();
        }
        $user->delete();
        return redirect()->back();
    }
    public function clients()
    {

        return view('admin_dashboard/clients');
    }
        public function view_clients()
    {
         $clients=User::whereHas('roles', function ($query) {
    return $query->where('name', 'Client');
        })->with('userinfo')->get();
        return Datatables::of($clients)->addColumn('action',function($row) {
            $user=Auth::user();
            $temp='';
            if($user->hasRole('Super Admin')){
               if($row->userinfo){
                $temp.='<a target="_blank" style="margin-right:5px" class="btn btn-primary" title="edit" href="./admin-client-edit/'.$row->id.'"><i class="fas fa-edit"></i></a><a  target="_blank" style="margin-right:5px" class="btn btn-success" title="View" href="./admin-client-view/'.$row->id.'"><i class="fas fa-eye"></i></a>';
               }     
                $temp.= '<a target="_blank" style="margin-right:5px" class="btn btn-info" title="Mail" href="./mail/'.$row->id.'"><i class="fas fa-paper-plane"></i></a><a  target="_blank" style="margin-right:5px" class="btn btn-danger" title="delete" onclick="return confirm(\'Are you sure?\')" href="./admin-client-delete/'.$row->id.'"><i class="fas fa-trash"></i></a>';
                return $temp;
            }


            if($user->hasRole('Admin')){
           return '<a  target="_blank" style="margin-right:5px" class="btn btn-success" title="edit" href="./admin-client-view/'.$row->id.'"><i class="fas fa-eye"></i></a>';
            }

        })
        ->addColumn('update',function($row) {
           return explode(' ', $row->updated_at)[0];

        })->escapeColumns([])->make(true);
       
    }
    
    public function client_view($user_id)
    {
          $restaurants=Restaurant::all();
        $states=State::all();

        return view('admin_dashboard/client_view',  [
                                                'user_info' => UserInfo::where([ 'user_id' => $user_id])->first(), 
                                                // 'user' => User::find($user_id), 
                                              ]);
    }
    public function client_edit($user_id)
    {
        $user=User::find($user_id);
         $restaurants=Restaurant::all();
        $states=State::all();
        if($user->hasRole('Client')){
        return view('admin_dashboard/client_edit',compact('user','states','restaurants'));
        }
    }
    
    public function client_update(Request $request)
    {
        $input=$request->all();
         if($request->get('continuous_contact') == 'on')
          {
                $request->merge(['continuous_contact' => 1]);  

          }else{

            $request->merge(['continuous_contact' => 0]);
          }
          $request->merge(['user_id' => $request->id]);

          if(Auth::user()->hasRole('Client')){
             $request->merge(['role_id' => 3]);
          }
          if(!$request->relocate_state){
             $request->merge(['relocate_state' => null]);
            
          }
          $user = UserInfo::updateOrCreate( [ 'user_id'   =>   $request->id ], $request->all());
          
          
           return redirect()->back();
         
    }
    public function client_delete($user_id)
    {
            $user=User::with('userinfo')->find($user_id);
        if($user->userinfo){
            $user->userinfo->delete();
        }
        $user->delete();
        return redirect()->back();
    }

















  public function update_experience($experiences, $user_Id){
      
      
      
      if (UserExperience::where('user_id', '=',  $user_Id)->count() > 0) {
           DB::delete('delete from user_experiences where user_id = ? ', [ $user_Id]);
      }
      if($experiences){
      foreach ($experiences as $experience)
      {
        if($experience != null) {
          
          if($experience['job_title'] != null && $experience['yr_experience'] != null && $experience['previous_company'] != null && $experience['ex_responsibilities'] != null){
          DB::insert('insert into user_experiences (user_id, job_title,yr_experience,previous_company,ex_role,ex_responsibilities   ) values (?, ?,?, ?, ?,?)', [ $user_Id , $experience['job_title'],$experience['yr_experience'],$experience['previous_company'],'',$experience['ex_responsibilities']]);
        }
        }
      } 
    }
      return true;

    }


   public function update_qualifications($qualifications, $user_Id){
      
      
         if (UserQualification::where('user_id', '=',  $user_Id)->count() > 0) {
            DB::delete('delete from user_qualifications where user_id = ? ', [ $user_Id]);
          }
          if($qualifications){
      foreach ($qualifications as $qualification)
      {
        if($qualification['qualification_date'] != null && $qualification['qualification_name'] != null ){
        $qualification['qualification_date']=Carbon::parse($qualification['qualification_date'])->format('Y-m-d');
         DB::insert('insert into user_qualifications (user_id,  qualification_name,qualification_date   ) values (?, ?,?)', [ $user_Id , $qualification['qualification_name'],$qualification['qualification_date']]);
       }
      } 
    }
      return true;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail($id=null)
    {
        $user=User::find($id);
        if($user){
            $email=$user->email;
        }
        else{
            $email='';
        }

         $clients_email=User::whereHas('roles', function ($query) {
     $query->where('name', 'Client');
        })->get(['email']);
         $partial_client_email=User::whereHas('roles', function ($query) {
    $query->where('name', 'Cient');
        })->doesntHave('userinfo')->get(['email']);
         $complete_client_email=User::whereHas('roles', function ($query) {
    $query->where('name', 'Cient');
        })->has('userinfo')->get(['email']);
          $candidates_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Candidate');
        })->has('userinfo')->count();
          $partial_candidates_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Candidate');
        })->doesntHave('userinfo')->get(['email']);
           $complete_candidates_email=User::whereHas('roles', function ($query) {
             $query->where('name', 'Candidate');
        })->has('userinfo')->get(['email']);
        return view('admin_dashboard/mail',compact('email','complete_client_email','complete_candidates_email','partial_candidates_email','partial_client_email','clients_email'));
    }
    public function send_mail(Request $request)
    {
        $email=$request->email;
        $subject=$request->subject;
        $messages=$request->message;
          Mail::send('emails.general', ['messages'=>$messages], function ($m) use($email,$subject) {
            $m->from('mail@honeybeetech.com.au', 'Honey Bee');
            $m->to($email)->subject($subject);
        });
          return redirect()->back()->with('success', 'Email sent successfully.');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
