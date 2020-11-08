<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use App\UserExperience;
use App\UserQualification;
use App\UserAvailability;
use App\SelectedCandidates;
use App\Log;
use App\Restaurant;
use App\State;
use App\Rules\MatchOldPassword;
use DB;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Mail;
use Session;
class UserDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function change_password() {
        return view('change_password');
            
        }
        public function update_password(Request  $request) {
        

           $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8','string'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->back()->with('success', 'Password Changed Successfully.');  


            
        }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
 
      $restaurants=Restaurant::all();
        $states=State::all();
       $user=User::with('userinfo')->find(Auth::id());
        if( $user->hasAnyRole('Admin','Super Admin')){
          $candidate_role= UserInfo::where('role_id',4) ->select('role_apply',DB::raw("COUNT(*) as count_row"))
                ->groupBy(DB::raw('role_apply'))
                ->get();
                  $candidate_state= UserInfo::where('role_id',4) ->select('state',DB::raw("COUNT(*) as count_row"))
                ->groupBy(DB::raw('state'))
                ->get();
         $total_candidate=User::whereHas("roles", function($q){ $q->where("name", "Candidate"); })->count();

        $registered_candidate=User::whereHas("roles", function($q){ $q->where("name", "Candidate"); })->has('userinfo')->count();
        $unregistered_candidate=$total_candidate-$registered_candidate;

         
         return view('admin_dashboard/index',compact('candidate_state','total_candidate','registered_candidate','unregistered_candidate','candidate_role'));

        }
      if(!$user->userinfo){
        if( $user->hasRole('Candidate')){
          return view('user_dashboard/profile',  [
                                                'user_info' => UserInfo::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => Auth::user()->id])->get(),
                                                'user_availabilities' => UserAvailability::where([ 'user_id' => Auth::user()->id])->get(),
                                                'states' => $states 
                                              ]);
        }
        elseif( $user->hasRole('Client')){

        return view('user_dashboard/create_profile',compact('user','states','restaurants'));
            
        }
       }

      if($user->hasRole('Client'))
      {
        if(Session::get('success')=='View Candidate'){
            Session::flash('success', 'View Candidate');
        }
        return redirect('/candidate_search_view');
        
      }
      if($user->hasRole('Candidate')){
        return redirect('/profile');
      } 

        return view('user_dashboard/dashboard', ['user_info' => UserInfo::where([ 'user_id' => Auth::user()->id])->get() ]);
    }

    public function profile()
    {
     $user=Auth::user();
     if($user->hasRole('Client')){
        return view('user_dashboard/view_profile',compact('user'));

     }
     else  if($user->hasRole('Candidate')){
      return view('user_dashboard/profile',  [
                                                'user_info' => UserInfo::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => Auth::user()->id])->get(),
                                                'user_availabilities' => UserAvailability::where([ 'user_id' => Auth::user()->id])->get()  
                                              ]);

     }
     
     
    }
    
    public function message()
    {
      return view('user_dashboard/message');
    }

    public function update_availability($request, $user_Id){
      
      if (UserAvailability::where('user_id', '=',  $user_Id)->count() > 0) {
           DB::delete('delete from user_availabilities where user_id = ? ', [ $user_Id]);
      }

      $monday = $request->get('monday');
      if($monday != '') {
        $monday_available_from = $request->get('monday_available_from');
        $monday_available_to = $request->get('monday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $monday, $monday_available_from, $monday_available_to ]);
      }
      
      $tuesday = $request->get('tuesday');
      if($tuesday != '') {
        $tuesday_available_from = $request->get('tuesday_available_from');
        $tuesday_available_to = $request->get('tuesday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $tuesday, $tuesday_available_from, $tuesday_available_to ]);
      }

      $wednesday = $request->get('wednesday');
      if($wednesday != '') {
        $wednesday_available_from = $request->get('wednesday_available_from');
        $wednesday_available_to = $request->get('wednesday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $wednesday, $wednesday_available_from, $wednesday_available_to ]);
      }

      $thursday = $request->get('thursday');
      if($thursday != '') {
        $thursday_available_from = $request->get('thursday_available_from');
        $thursday_available_to = $request->get('thursday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $thursday, $thursday_available_from, $thursday_available_to ]);
      }

      $friday = $request->get('friday');
      if($friday != '') {
        $friday_available_from = $request->get('friday_available_from');
        $friday_available_to = $request->get('friday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $friday, $friday_available_from, $friday_available_to ]);
      }

      $saturday = $request->get('saturday');
      if($saturday != '') {
        $saturday_available_from = $request->get('saturday_available_from');
        $saturday_available_to = $request->get('saturday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $saturday, $saturday_available_from, $saturday_available_to ]);
      }

      $sunday = $request->get('sunday');
      if($sunday != '') {
        $sunday_available_from = $request->get('sunday_available_from');
        $sunday_available_to = $request->get('sunday_available_to');
        DB::insert('insert into user_availabilities (user_id, day,available_from,available_to	) values (?, ?,?, ?)', [ $user_Id , $sunday, $sunday_available_from, $sunday_available_to ]);
      }

      return true;

    }


    public function update_experience($experiences, $user_Id){
      
      
      
      if (UserExperience::where('user_id', '=',  $user_Id)->count() > 0) {
           DB::delete('delete from user_experiences where user_id = ? ', [ $user_Id]);
      }
      if($experiences){
      foreach ($experiences as $experience)
      {
        if($experience != null) {
           $experience['job_from']=Carbon::parse($experience['job_from'])->format('Y-m-d');
       $experience['job_to']=Carbon::parse($experience['job_to'])->format('Y-m-d');
          if($experience['job_title'] != null && $experience['job_from'] != null && $experience['job_to'] != null && $experience['previous_company'] != null && $experience['ex_responsibilities'] != null && $experience['no_of_employees'] != null){
          DB::insert('insert into user_experiences (user_id, job_title,job_from,job_to,previous_company,ex_role,ex_responsibilities,no_of_employees	) values (?, ?,?, ?,?, ?,?,? )', [ $user_Id , $experience['job_title'],$experience['job_from'],$experience['job_to'],$experience['previous_company'],'',$experience['ex_responsibilities'],$experience['no_of_employees']]);
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
         DB::insert('insert into user_qualifications (user_id, 	qualification_name,qualification_date	) values (?, ?,?)', [ $user_Id , $qualification['qualification_name'],$qualification['qualification_date']]);
       }
      } 
    }
      return true;

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
        // return $request;
         $user_id = Auth::user()->id;
         $experiences = $request->get('experience');
         if(Auth::user()->hasRole('Candidate')){
           $this->update_experience($experiences,  $user_id);
          

         $this->update_availability($request,  $user_id);

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

         }

          if($request->get('continuous_contact') == 'on')
          {
                $request->merge(['continuous_contact' => 1]);  

          }else{

            $request->merge(['continuous_contact' => 0]);
          }
          $request->merge(['user_id' => Auth::user()->id]);

          if(Auth::user()->hasRole('Client')){
             $request->merge(['role_id' => 3]);
          }
          if(!$request->relocate_state){
             $request->merge(['relocate_state' => null]);
            
          }
             $request->merge(['date_birth' => Carbon::parse($request->date_birth)->format('Y-m-d')]);
          
        // $request->date_birth=Carbon::parse($request->date_birth)->format('Y-m-d');
        
          $user = UserInfo::updateOrCreate( [ 'user_id'   =>   Auth::user()->id ], $request->all());
          if($user->wasRecentlyCreated){
            Mail::send('emails.profile', ['user'=>$user], function ($m) {
            $m->from('mail@honeybeetech.com.au', 'Honey Bee');
            $m->to('mail@honeybeetech.com.au')->subject('Profile Completed');
        });
          }
          if(Auth::user()->hasRole('Client')){
             if($user->wasRecentlyCreated){
            Session::flash('success', 'View Candidate');
             }
              return redirect('candidate_search_view');
             // updateOrCreate performed create
          }
          else{
        Session::flash('success', 'Profile Update');
            return redirect('profile');
          }     
         
    }
     public function candidate_search_view()
    {
       $user=User::with('userinfo','unconfirmed_selected_candidates')->find(Auth::id());
       $candidates=UserInfo::with('user', 'availabilities')->get(['id','user_id','name','visa_type','role_apply','previous_cousine_experience','state']);
       $states=State::all('name');
      return view('user_dashboard/candidate_search',compact('candidates','user','states'));
    }
    public function candidate_search(Request $request)
    {
      

      $candidate=UserInfo::with('user', 'availabilities', 'unconfirmed_selected_candidates', 'recent_experience')->doesntHave('confirmed_selected_candidates')->where('role_id','4');
      if($request->role_apply){
        $candidate=$candidate->where('role_apply',$request->role_apply);
      }
      if($request->previous_cousine_experience){
        $candidate=$candidate->where('previous_cousine_experience','like','%'.$request->previous_cousine_experience.'%');
      }
      if($request->state){
        $candidate=$candidate->where('state',$request->state)->orWhere('relocate_state','like','%'.$request->state.'%');
      }
       if($request->visa_type){
        $candidate=$candidate->whereIn('visa_type',$request->visa_type);
      }
      if($request->suburb_range){
        $postcode=UserInfo::where('user_id',Auth::id())->first('postcode')->postcode;
        $min=(int)$postcode - (int)$request->suburb_range;
        $max=(int)$postcode + (int)$request->suburb_range;

        $candidate=$candidate->whereBetween('postcode',[$min, $max]);
      }
      if($request->available_from){
        $available_from=$request->available_from;
        $candidate=$candidate->whereHas('availabilities', function($q) use($available_from){
            $q->whereIn('available_from', $available_from);
        });
      }
      return Datatables::of($candidate)->addColumn('action',function($row) {
              $user=Auth::user();
              $counter=0;
              foreach ($row->unconfirmed_selected_candidates as $key => $selected) {
                if($selected->client_id == $user->id){
                  $counter ++; 
                }
              }
              $check='';
              if($counter >0){
                $check='checked';
              }
              return '<input type="checkbox" class="selected_candidates" id='.$row->user_id.' onclick="candidate_selected($(this))"'.$check.'>';  
           
            })->addColumn('availability',function($row){
              $availability='';
                foreach ($row->availabilities as $key => $value) {
                  $availability.=$value->day.': '.$value->available_from.'<br/>';
                }
              return $availability;  
           
            })
            ->addColumn('state_locate',function($row){
              $text='';
              $text.=$row->state.'<br>';
              if($row->relocate == '1'){
              $text.='Willing to relocate to '. $row->relocate_state;
              }
              return $text;
            })
           
            ->addColumn('updated',function($row) {
              return Carbon::parse($row->updated_at)->format('d-M-Y');
            })->addColumn('experience',function($row) {
              if($row->yr_experience <=1)
                return $row->yr_experience.' year';
              else{
                return $row->yr_experience.' years';
              }
            })
            ->addColumn('recent_experience_column',function($row) {
              $diff = abs(strtotime($row->recent_experience->job_from) - strtotime($row->recent_experience->job_to));

              // $years = floor($diff / (365*60*60*24));
              $months = floor(($diff) / (30*60*60*24));
              // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
              // if($months >=7){
              //   $years++;
              // }
              // // ($years <= 1 ? $years.= ' year ' : $years.= ' years ');
              if ($months == 0) {
               $months= 'Less than 1 month';
              }
              elseif($months <= 1){
                $months.= ' month'; 
              }
              else{
                $months.= ' months';  
              }
              // ($months <= 1 ? $months.= ' month' : $months.= ' months');
              // ($days <= 1 ? $days.= ' day' : $days.= ' days');
              $data='';
              $responsibility='';
              if (strlen($row->recent_experience->ex_responsibilities) > 50){
                $responsibility='<br>'.substr($row->recent_experience->ex_responsibilities, 0, 50).' .... '; 
              }
              else{
                $responsibility='<br>'.$row->recent_experience->ex_responsibilities;
              }
              $data.='<a href="javascript:void(0)" class="resume" id="'.$row->user_id.'" style="color:#272f66;background-color:#ffffff00" onclick="resume($(this))"><b>'.$row->recent_experience->previous_company.'</b>';
              $data.='<br>'.$row->recent_experience->job_title.' ('.$months.')'.$responsibility.'</a>';

              return $data;
            })->addColumn('cuisine',function($row) {
            return str_replace(',', ', ', $row->previous_cousine_experience); 
            
            })->escapeColumns([])->make(true);
    }
      public function view_profile()
    {
        $restaurants=Restaurant::all();
        $states=State::all();
       $user=User::with('userinfo')->find(Auth::id());
       if(!$user->userinfo){
        if( $user->hasRole('Candidate')){
          return view('user_dashboard/profile',  [
                                                'user_info' => UserInfo::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => Auth::user()->id])->get(),
                                                'user_availabilities' => UserAvailability::where([ 'user_id' => Auth::user()->id])->get(),
                                                'states' => $states 
                                              ]);
        }
        elseif( $user->hasRole('Client')){

        return view('user_dashboard/create_profile',compact('user','states','restaurants'));
            
        }
       }

      if(Auth::user()->hasRole('Super Admin'))
      {
        // $candidate_state= UserInfo::where('role_id',4) ->select('state',DB::raw("round(COUNT(*)/(select count(*) from user_infos where role_id = 4)*100 ,2) as count_row"))
                // ->groupBy(DB::raw('state'))
                // ->get();
        $candidate_state= UserInfo::where('role_id',4) ->select('state',DB::raw("COUNT(*) as count_row"))
                ->groupBy(DB::raw('state'))
                ->get();
         $total_candidate=User::whereHas("roles", function($q){ $q->where("name", "Candidate"); })->count();

        $registered_candidate=User::whereHas("roles", function($q){ $q->where("name", "Candidate"); })->has('userinfo')->count();
        $unregistered_candidate=$total_candidate-$registered_candidate;

         
         return view('admin_dashboard/index',compact('candidate_state','total_candidate','registered_candidate','unregistered_candidate'));
        
      }
      else if( $user->hasRole('Candidate')) {
        return view('user_dashboard/profile',  [
                                                'user_info' => UserInfo::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_experiences' => UserExperience::where([ 'user_id' => Auth::user()->id])->get(), 
                                                'user_qualifications' => UserQualification::where([ 'user_id' => Auth::user()->id])->get(),
                                                'user_availabilities' => UserAvailability::where([ 'user_id' => Auth::user()->id])->get(),
                                                'states' => $states 
                                              ]);
      }
      else if( $user->hasRole('Client')) {

        return view('user_dashboard/view_profile',compact('user','states','restaurants',' unregistered_candidate'));

        }
    }

     public function packages()
    {

        return view('packages');


    }
     public function select(Request $request)
    {
        // $input=$request->all();
        $user=Auth::user();
          $candidate=User::select(['name','email'])->with('unconfirmed_selected_candidates')->find($request->id);
        if($request->type == 'checked'){
          if($user->unconfirmed_selected_candidates->count() == 10){
            return json_encode('Out of range');
          }
          $input=[];
          $input['client_id']=$user->id;
          $input['candidate_id']=$request->id;
          $input['interview']=0;
          SelectedCandidates::create($input);
          Log::create(['user_id'=>$user->id,'message'=>'Selected the candidate: '.$candidate->name.' ('.$candidate->email.')']);
          return SelectedCandidates::where('client_id',$user->id)->where('confirmed','=',null)->count();
        }
        else if($request->type == 'unchecked'){
          SelectedCandidates::where('client_id',$user->id)->where('candidate_id',$request->id)->delete();
          Log::create(['user_id'=>$user->id,'message'=>'Un-Selected the candidate:'.$candidate->name.' ('.$candidate->email.')']);
          return SelectedCandidates::where('client_id',$user->id)->where('confirmed','=',null)->count();
        }


    }
    public function proceed(Request $request)
    {
           $membership= UserInfo::where('user_id',Auth::id())->first('membership')->membership;
          if($membership == 1 && Auth::user()->selected_candidates->count() > 10){
            return redirect()->back();
          }
          elseif ($membership == 2 && Auth::user()->selected_candidates->count() >20){
            return redirect()->back();
          }
          SelectedCandidates::where('client_id',Auth::id())->where('confirmed','=', null)->update(['confirmed'=>date('Y-m-d')]);
         UserInfo::where('user_id',Auth::id())->update(['membership'=>'0']);
         return redirect()->route('selected_candidates'); 
    } 
    public function selected_candidates()
    {
        // $input=$request->all();
        SelectedCandidates::where('client_id','=',Auth::id())->where('confirmed','!=',null)->whereDate('confirmed','<',Carbon::now()->subDays(7))->delete();


        return view('user_dashboard.short_listed');
    }
    public function get_selected_candidates(Request $request)
    {
        $user=Auth::user();
        //  $candidate=UserInfo:: join('selected_candidates', function ($join) use($user) {
        //     $join->on('selected_candidates.candidate_id', '=', 'user_infos.user_id')
        //          ->where('selected_candidates.client_id', '=', $user->id);
        // });
         $candidate=UserInfo:: whereHas('confirmed_selected_candidates', function ($query) use($user) {
          $query->where('client_id', '=', $user->id);
              })->join('selected_candidates', function ($join) use($user) {
            $join->on('selected_candidates.candidate_id', '=', 'user_infos.user_id')
                 ->where('client_id', '=', $user->id);
        })->select('user_infos.*', 'selected_candidates.confirmed');
         return Datatables::of($candidate)->addColumn('availability',function($row){
              $availability='';
                foreach ($row->availabilities as $key => $value) {
                  $availability.=$value->day.': '.$value->available_from.'<br/>';
                }
              return $availability;  
           
            })
          
            ->addColumn('updated',function($row) {
              return Carbon::parse($row->updated_at)->format('d-M-Y');
            })->addColumn('experience_yr',function($row) {
              if($row->yr_experience <=1)
                return $row->yr_experience.' year';
              else{
                return $row->yr_experience.' years';
              }
            })
            ->addColumn('recent_experience_column',function($row) {
              $diff = abs(strtotime($row->recent_experience->job_from) - strtotime($row->recent_experience->job_to));

              // $years = floor($diff / (365*60*60*24));
              $months = floor(($diff) / (30*60*60*24));
              // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
              // if($months >=7){
              //   $years++;
              // }
              if ($months == 0) {
               $months= 'Less than 1 month';
              }
              elseif($months <= 1){
                $months.= ' month'; 
              }
              else{
                $months.= ' months';  
              }
              // ($years <= 1 ? $years.= ' year ' : $years.= ' years ');
              // ($months <= 1 ? $months.= ' month' : $months.= ' months');
              // ($days <= 1 ? $days.= ' day' : $days.= ' days');
              $data='';
              $responsibility='';
              if (strlen($row->recent_experience->ex_responsibilities) > 50){
                $responsibility='<br>'.substr($row->recent_experience->ex_responsibilities, 0, 50).' .... '; 
              }
              else{
                $responsibility='<br>'.$row->recent_experience->ex_responsibilities;
              }
              $data.='<a href="javascript:void(0)" class="resume" id="'.$row->user_id.'" style="color:#272f66;background-color:#fffff00" onclick="resume($(this))"><b>'.$row->recent_experience->previous_company.'</b>';
              $data.='<br>'.$row->recent_experience->job_title.' ('.$months.')'.$responsibility.'</a>'; 

              return $data;
            })->addColumn('cuisine',function($row) {
            return str_replace(',', ', ', $row->previous_cousine_experience); 
            
            })->escapeColumns([])->make(true);
         
    }
     public function candidate_data(Request $request)
    {
      return User::with('availabilities','experiences','qualifications')->with(array('userinfo'=>function($query){
        $query->select('user_id','city','state','have_car','travel','relocate','travel_distance','relocate_state','personal_summary','work_experience','availability','date_birth');
    }))->find($request->id);

    }
     public function candidate_complete_data(Request $request)
    {
      return User::with('availabilities','experiences','qualifications','userinfo')->find($request->id);

    }
    public function reset_selection(Request $request){
      $user=Auth::user();
      SelectedCandidates::where('client_id','=',$user->id)->where('confirmed','=',null)->delete();
      return 0;

    }
    public function request_interview(){
      $user=Auth::user();
     $candidates=SelectedCandidates::where('selected_candidates.client_id','=',$user->id)->join('user_infos','user_infos.user_id','=','selected_candidates.candidate_id')->get(['user_infos.name','user_infos.email','user_infos.phone_number']);
      Mail::send('emails.request_interview', ['user' => $user,'candidates'=>$candidates], function ($m) use ($user) {
            $m->from('mail@honeybeetech.com.au', 'Interview Request');

            $m->to('mail@honeybeetech.com.au', 'Interview')->subject('Interview Request Received');
        });
      return 1;

    }
    public function delete_profile($id)
    {
      // return  $id;
      $user=User::find($id);
      if($user->hasRole('Candidate')){
        UserExperience::where('user_id',$id)->delete();
        UserQualification::where('user_id',$id)->delete();
        UserInfo::where('user_id',$id)->delete();
        $user->delete();
      }
      else if($user->hasRole('Client')){
        UserInfo::where('user_id',$id)->delete();
        $user->delete();
      }
      return redirect()->back();
    }
     public function close_browser(Request $request)
    {
      $user=Auth::user();
      if($user->close_browser==null){
         $user->close_browser=Carbon::now();
         $user->save();
      }

    }
     public function login_time(Request $request)
    {
      $user=Auth::user();
         $user->login_time=$user->login_time + 120;
         $user->save();
    }
}
