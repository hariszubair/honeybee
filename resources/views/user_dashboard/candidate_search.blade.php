@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style type="text/css">
  @media screen and (-webkit-min-device-pixel-ratio:0) { 
      select,
      textarea,
      input {
        font-size: 16px !important;
      }
    }
  table.dataTable.no-footer {
     border: 0; 
}

  .select2-selection--multiple:before {
    content: "";
    position: absolute;
    right: 7px;
    top: 42%;
    border-top: 5px solid #888;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    height: 25px
}
.select2-selection--multiple{

padding-left: 10px;
padding-right: 10px;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
  color:#272f66 !important;

}

.select2-container .select2-selection--single {
        height: 30px;
padding-left: 10px;
padding-right: 10px;


    }
    .select2-container{
  color:#272f66 !important;

      margin-right: 5px;
          outline: none;
          font-size: 11px;
          padding-top: 15px
    } 
    .select2-container *:focus {
        outline: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #272f66;
    line-height: 30px;
    border-radius:22px;
    font-size: 12px;

  }
  .select2-container--default.select2-container--focus .select2-selection--multiple {
  border: 0;
}
.search_button{
  position: relative;
    margin-right: .5rem;
    display: inline-block;
}
/*.has-search .form-control {
    padding-left: 2.375rem;
    border-radius: 22px;
    width: 70%        
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
*/.page-item.disabled .page-link {

    border: 0;
  }
/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height:60px;
  
}
.page-item.active .page-link {

    z-index: 3;
    color: #272f66;
    background-color: #fff;
    border: 0;
    border-bottom: 3px solid #272f66


}
.page-item .page-link {

    z-index: 3;
    color: #272f66;
    background-color: #fff;
    border: 0;


}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {

background: #fff;
border-radius: 50px;
border-color: #272f66;
}

.page-item.active .page-link:hover {
    /* z-index: 2; */
    color: #272f66;
    /* text-decoration: none; */
     background-color: #fff;
    border: 0;
    border-bottom: 3px solid #272f66
  }
  /*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
*******************************/
 
  .modal.right .modal-dialog {
    position: fixed;
    margin: auto;
    width: 600px;
    height: 100%;
    -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
         -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
  }

  .modal.right .modal-content {
    height: 100%;
    overflow-y: auto;
  }
  
  .modal.right .modal-body {
    padding: 15px 15px 80px;
  }

.modal-dialog {
    max-width: 60%;
  }


        
/*Right*/
  .modal.right.fade .modal-dialog {
    right: 0px;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
  }
  
  .modal.right.fade.in .modal-dialog {
    right: 0;
  }

/* ----- MODAL STYLE ----- */
  .modal-content {
    border-radius: 0;
    border: none;
  }

  .modal-header {
    border-bottom-color: #EEEEEE;
    background-color: #f5f5f5;
    display: block
  }

/* ----- v CAN BE DELETED v ----- */
body {
  background-color: #78909C;

}

.demo {
  padding-top: 60px;
  padding-bottom: 110px;
}

.btn-demo {
  margin: 15px;
  padding: 10px 15px;
  border-radius: 0;
  font-size: 16px;
  background-color: #FFFFFF;
}

.btn-demo:focus {
  outline: 0;
}

.demo-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  padding: 15px;
  background-color: #212121;
  text-align: center;
}

.demo-footer > a {
  text-decoration: none;
  font-weight: bold;
  font-size: 16px;
  color: #fff;
}
/*tabs*/

element.style {
    color: #272f66;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
border:0;
border-bottom:3px solid #238DB7;
  }
  .nav-tabs {
border:0;

  }
  .nav-tabs .nav-link {
     border: 0; 
}
.fixed_top{
  position: fixed;
    top: 0;
    left: 0;
    padding-left: 7%;
    padding-right: 7%;
}
.select2-selection__clear{
 display: none 
}
.swal-button--confirm{
  background-color: green;
}
.card {
    margin-bottom: 0px;
}
@media screen and (max-width: 600px) {
  #filter_div {
     flex-wrap: wrap;
  width: 550px;
  }
  #selected_candidates{
    font-size: 10px;
  }
  #result{
    font-size: 10px;
  }
}

}
filter_div
.responsive_filter{
  flex-wrap: wrap;
  width: 500px;
}
 table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
      right: 1.2em;
 }
 table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after 
 {
  right: 0em;
 }

table tbody tr:hover {
  background-color: #238db7;
  color: white;
}
table.dataTable thead th, table.dataTable thead td {
     border-bottom: 0; 
}
/*table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
     background-color: #ffffff00; 
}*/
</style>
<div id='page'>

  <div class="row" style="z-index: 99999;width: 100%;margin:0;padd" id='plan'>
    <div class="col-lg-12" style="padding-right: 0;padding-left: 0">
<div class="card" >
<div class="card-header">
<h4 style="color: #238db7">Payment Plans</h4>
</div>
<div class="card-body" style="padding: 10px">
<p style="text-align:justify;" ><span id="basic_membership" {{Auth::user()->selected_candidates->count() <= 10 ? 'style=font-weight:bold' : ''}}>Basic Subscription </span><br><span id="premium_membership" {{Auth::user()->selected_candidates->count() >= 11 ? 'style=font-weight:bold' : ''}}>Premium Subscription </span></p>
 <div class="row" style="display: flex;justify-content:center;color: white;">
    <!-- <button id='filter_candidates' class="btn btn-success " style="margin: 5px">Search</button> -->
@if(Auth::user()->userinfo->membership == 0)
  <form action="pay" method="Post"> 
                        @csrf
<button type="submit" class="btn btn-success" style="margin: 5px; position: fixed; bottom: 5px; right: 0px;z-index: 3000;">Pay Now !</button>
</form>
@endif
@if(Auth::user()->userinfo->membership == 1)
<form action="pay" method="Post"> 
                        @csrf
<button type="submit" class="btn btn-success" style="margin: 5px; position: fixed; bottom: 5px; right: 0px;z-index: 3000;">Upgrade Membership!</button>
</form>
@endif

<!-- <a href='{{url("selected_candidates")}}' class="btn btn-success" style="margin: 5px; position: fixed; bottom: 0px; right: 0px;z-index: 3000;">Proceed selected candidates</a> -->
</div>
<hr style="margin: 5px">
<div  style="padding-bottom: 20px">

    <div class="col" style="padding-left: 0;float: left;width: 45%;font-size: 12px">
      <p style="color: #272f66" id='selected_candidates'>
        @if(Auth::user()->selected_candidates->count() <= 1)
        <b>{{Auth::user()->selected_candidates->count()}}</b> candidate selected.
        @else
        <b>{{Auth::user()->selected_candidates->count()}}</b> candidates selected.
        @endif
       </p>

    </div>
    <div class="col" style="text-align: right;padding-right: 0;color: #272f66;font-size: 10px;float: left;width: 55%" id='result' >
      
    </div>
    <div style="float: left;font-size: 12px;width:100%">
    Click on most recent work experience to view all candidate details
    </div>
  </div>
</div>
</div>
</div>

  	</div>

<!--  <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Search">
  </div> -->
  
  <div style=" display: flex; margin-bottom: 15px;padding-top: 5px; flex-wrap: wrap;
  width: 1200px; " id='filter_div'>
  	<select style="display: block;width: 20%" id='role_apply' name='role_apply' class="col-3 js-example-basic-single" >
  		<option value="">Any</option>
  		<option value="Chef">Chef</option>
  		<option value="Front of House">Front of House</option>
  		<option value="Bartender">Bartender</option>
  		<option value="Waiter">Waiter</option>
  	</select>
  	<select style="display: block" id='previous_cousine_experience' name='previous_cousine_experience' class="js-example-basic-single" >
  		<option value="">Any</option>
  		<option value="Italian">Italian</option>
  		<option value="Mediterranean">Mediterranean</option>
  		<option value="Asian">Asian</option>
  		<option value="Greek">Greek</option>
  		<option value="Take away shop">Take away shop</option>
  		<option value="Cafe">Cafe</option>
  		<option value="Mexican">Mexican</option>
  		<option value="Tavern">Tavern</option>
  		<option value="Other">Other</option>

  	</select>
  	<select style="display: block" id='state' name='state' class="js-example-basic-single" >
  		<option  value="">Any</option>
  		<option {{$user->userinfo->state=='NSW' ? 'selected' : '' }} value="NSW">NSW</option>
  		<option {{$user->userinfo->state=='QLD' ? 'selected' : '' }} value="QLD">QLD</option>
  		<option {{$user->userinfo->state=='SA' ? 'selected' : '' }} value="SA">SA</option>
  		<option {{$user->userinfo->state=='VIC' ? 'selected' : '' }} value="VIC">VIC</option>
  		<option {{$user->userinfo->state=='TAS' ? 'selected' : '' }} value="TAS">TAS</option>
  		<option {{$user->userinfo->state=='WA' ? 'selected' : '' }} value="WA">WA</option>
  	</select>
    <div></div>
  	<select style="display: block;border-radius: 22px !important" class="select2-multiple2" name="available_from[]" multiple="multiple" id='available_from' >
  		<option value="Morning Only">Morning Only</option>
  		<option value="Afternoon Only">Afternoon Only</option>
  		<option value="All day">All day</option>
  	</select>
  	<select style="width:20%;" class="select2-multiple2" name="visa_type[]" multiple="multiple" id='visa_type' >
  		<option  value=""></option>
  		<option value="Working Visa">Working Visa</option>
  		<option value="Student Visa">Student Visa</option>
  		<option value="Permanent Residence">Permanent Residence</option>
  		<option value="Citizen">Citizen</option>
  	</select>
    <select style="width:20%;" class=" js-example-basic-single" name="suburb_range" id='suburb_range' >
      <option  value="">Any</option>
      <option value="5">5 Suburb Radius</option>
      <option value="10">10 Suburb Radius</option>
      <option value="20">20 Suburb Radius</option>
    </select>
  	<!-- <button id='filter_candidates' class="btn btn-success" style="border-radius:22px">Search</button> -->
  	
  	</div>
    <div style="display: flex;width: 100%">
    <button style="border:1px solid #aaaaaa;border-radius: 22px;color: #272f66;padding-right: 5px;padding-left: 5px;margin-bottom: 15px;float: left;white-space: nowrap;text-align: center" id='reset_selection'><b>Reset Selected Candidates</b></button>
    @if($user->userinfo->membership != 0)
    <form action="./proceed" method="Post" id='selected_candidates_form'> 
                        @csrf
<input type="text" id="count" name="count" style="display: none" value='{{$user->selected_candidates->count()}}'>

<button type="button" style="border:1px solid #aaaaaa;border-radius: 22px;color: green;padding-right: 5px;padding-left: 5px;margin-bottom: 15px;float: left;margin-left: 5px;white-space: nowrap;text-align: center" id='proceed_button'><b>Proceed selected candidates</b></button>
</form>
@endif
</div>
  	<!-- <div style="margin: 10px;width:150px">
  	<button onclick="myFunction()" class="dropbtn btn dropdown-toggle" id='btn_type_worker' style="padding-top: 0px !important;padding-bottom: 0px !important">Type of Worker</button>
  <div id="myDropdown" class="dropdown-content">
    <select id='day' name='day' class="js-example-basic-single" >
  		<option  value="">Select Day</option>
  		<option  value="Monday">Monday</option>
  		
  	</select>
  	<select id='available_from' name='available_from' class="js-example-basic-single" >
  		<option  value="">Select Availability</option>
  		<option  value="Morning only">Morning only</option>
  		
  	</select>
  </div>
  

  	
  	
  	</div> -->
     <table  id="candidate_search" class="display table  "  style="font-size: 11px;padding-left: 0%;color: #272f66;border:0" cellspacing="0" width="100%">
                      <thead style="background-color: #f8f9fa !important;word-break:keep-all">
                        <tr style="white-space: nowrap;">
                          <th >Select</th>
                          <th >Most recent work experience </th>
                          <th >Name</th>
                          <th >Experience</th>
                          <th >All cuisine experience</th>
                          <th >Suburb</th>
                          <th >Last Updated</th>
                        </tr>
                      </thead>
                      <tbody style="border:0">
                     
                      </tbody>
                    </table>
  </div>

   </div>  
  <!-- Modal -->
  <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="font-size: 12px">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >

        <div class="modal-header" style='min-width: 600px;padding-left: 30px'>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="margin-right:30px">&times;</span></button>
          <h1 class="modal-title" id="myModalLabel2" style="color: #238db7;text-transform: capitalize;"></h1><i>
          You can view detailed personal information (email and phone number) once you make a payment. </i><br>
          <button style="border:1px solid black;border-radius: 22px;padding-left: 10px;padding-right: 10px;color:#238db7;margin-top: 5px" id="select_button"><b>Select Candidate</b></button>
        </div>

        <div class="modal-body" style="color: #272f66">
          <div class="container mt-3" style=" overflow: scroll-x;width: 100%;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" style="min-width: 550px;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" style="color: #272f66"><h5>All Experience</h5></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" style="color: #272f66"><h5>Qualifications</h5></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2" style="color: #272f66"><h5>Availability</h5></a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3" style="color: #272f66"><h5>Other Info</h5></a>
    </li> -->
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="min-width: 550px;">
    <div id="home" class="container tab-pane active"><br>
      <div id='all_experiences' style="color: #238db7"> </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div id='all_qualifications' style="color: #238db7"> </div>
     
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <div id='all_availabilities' style="color: #238db7;text-transform:capitalize;"> </div>
    </div>
   <!--  <div id="menu3" class="container tab-pane fade"><br>
      <div id='other_info' style="color: #238db7"> </div>
      
    </div> -->
  </div>
</div>
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  
            
                    
          
          
@endsection()



@section('footer')
    <script src="{{asset('public/js/select2.multi-checkboxes.js')}}"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
    // table= $('#candidate_search').DataTable();
  
    $('.js-example-basic-single').select2({});
    $('.js-example-basic-multiple').select2();

//     $('#role_apply').on('select2:select', function (e) {
//                 table
//                     .column(2)
//                     .search( $('#role_apply').val() )
//                     .draw();
// });
//     $('#previous_cousine_experience').on('select2:select', function (e) {
//                 table
//                     .column(3)
//                     .search( $('#previous_cousine_experience').val() )
//                     .draw();
// });
//      $('#state').on('select2:select', function (e) {
//                 table
//                     .column(4)
//                     .search( $('#state').val() )
//                     .draw();
// });
//      $('#available_from').on('select2:select', function (e) {
//        table
//                     .column(5)
//                     .search( $('#available_from').val().join('|'), true, false, true)
//                     .draw();
// }); $('#visa_type').on('select2:select', function (e) {
//                 table
//                     .column(6)
//                     .search( $('#visa_type').val().join('|'), true, false, true)
//                     .draw();
// });

  
   $('#visa_type').select2MultiCheckboxes({


    templateSelection: function(selected, total) {
      if(selected.length == 0){
           return '<b>Work Authorisation:</b> Any';
        }
        else{
           return '<b>Work Authorisation:</b> ' + selected;
        }

     
    }
  })
   $('#visa_type').on('change', function (e) {
        if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
});
   $('#available_from').select2MultiCheckboxes({
    templateSelection: function(selected, total) {
      if(selected.length == 0){
      return '<b>Availability: </b> Any';
      }
      else{
      return '<b>Availability: </b>'+selected;
      }
    }
  })

  $('#available_from').on('change', function (e) {
    
        if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
}); 
  $('#available_from').on("change.select2", function(e) { 
   $('#available_from').siblings()[7].childNodes[0].childNodes[0].childNodes[0].innerHTML=  $('#available_from').siblings()[7].childNodes[0].childNodes[0].childNodes[0].innerHTML.replaceAll("&lt;", "<").replaceAll("&gt;", ">")
});
  $('#visa_type').on("change.select2-container", function(e) { 
   $('#visa_type').siblings()[9].childNodes[0].childNodes[0].childNodes[0].innerHTML=  $('#visa_type').siblings()[9].childNodes[0].childNodes[0].childNodes[0].innerHTML.replaceAll("&lt;", "<").replaceAll("&gt;", ">")
});
   

   $('#available_from').siblings()[7].childNodes[0].childNodes[0].childNodes[0].innerHTML=  $('#available_from').siblings()[7].childNodes[0].childNodes[0].childNodes[0].innerHTML.replaceAll("&lt;", "<").replaceAll("&gt;", ">")
  $('#visa_type').siblings()[9].childNodes[0].childNodes[0].childNodes[0].innerHTML=  $('#visa_type').siblings()[9].childNodes[0].childNodes[0].childNodes[0].innerHTML.replaceAll("&lt;", "<").replaceAll("&gt;", ">")   


    $('#role_apply').select2({
    templateSelection: function (state) {
        return $(
            '<span><span style="color:#272f66"><b>Role:</b> ' + state.text+ '</span>'
        );
    }
});
    $('#role_apply').on('change', function (e) {
        if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
});
    $('#suburb_range').select2({
    templateSelection: function (state) {
        return $(
            '<span><span style="color:#272f66"><b>Suburb Range:</b> ' + state.text+ '</span>'
        );
    }
});
    $('#suburb_range').on('change', function (e) {
        if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
});
    $('#previous_cousine_experience').select2({
    templateSelection: function (state) {
        return $(
            '<span> <span style="color:#272f66"><b>Cuisine: </b>' + state.text+ '</span>'
        );
    }
});
    $('#previous_cousine_experience').on('change', function (e) {
       if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
});
     $('#state').select2({
    templateSelection: function (state) {
        return $(
            '<span> <span style="color:#272f66"><b>State: </b>' + state.text+ '</span>'
        );
    }
});
     $('#state').on('change', function (e) {
       if($.fn.DataTable.isDataTable('#candidate_search')){
    $('#candidate_search').DataTable().destroy();
}
candidate_search()
});
    $('.select2-selection').css('border-radius','22px');
    $('.select2-container').children().css('border-radius','22px')
    
        candidate_search();
} );
  
	function candidate_search () {
    var role_apply = $('#role_apply').val();
    var previous_cousine_experience = $('#previous_cousine_experience').val();
    var state = $('#state').val();
    var available_from = $('#available_from').val();
    var visa_type = $('#visa_type').val();
    var suburb_range = $('#suburb_range').val();
     $('#candidate_search').DataTable({
      "dom": '<"top"l>rt"bottom"<<"row"<"col"><"col text-center"p><"col">>>',
        processing: true,
        serverSide: true,
         searching: false,
         pageLength: 25,
         // paging:true,
         info: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./candidate_search' ,
           method: 'Post',
          data: function (d) {
              d.role_apply = role_apply;
              d.previous_cousine_experience = previous_cousine_experience;
              d.state = state;
              d.available_from = available_from;
              d.visa_type = visa_type;
              d.suburb_range=suburb_range;
        },
},

        // ajax: {
        //     url:'/show/'+id,  
        //   },
        columns: [
      
        { "data": 'action','name':'name', "searchable": false,"orderable":false},
       
     
          
      { "data": 'recent_experience_column','name':'recent_experience.previous_company', "searchable": false,"orderable":false},
       { "data": 'name','name':'name'},
       { "data": 'experience','name':'yr_experience', "searchable": true},
       { "data": 'cuisine','name':'previous_cousine_experience', "searchable": true},
      	{ "data": 'suburb','name':'suburb'},
      	{ "data": 'updated','name':'updated_at', "searchable": true},
        ],
        "columnDefs": [
    { "width": "35%", "targets": 1 },
    { "width": "15%", "targets": 2 },
    { "width": "1%", "targets": 3 },
    { "width": "15%", "targets": 4 },
    { "width": "10%", "targets": 5 },
    { "width": "10%", "targets": 6 },


  ],
  "rowCallback": function( row, data, index ) {
        $('tr th', row).css('border-bottom', '0')
      
        $('td', row).css('background-color', '#ffffff00')
},
"order":[[2, 'asc']]

             
    });
    
}
$('#candidate_search').on( 'draw.dt', function () {
    // $('#result').html('Displaying results '+parseInt($('#candidate_search').DataTable().page.info().start+1)+'-'+$('#candidate_search').DataTable().page.info().end)
    var info = $('#candidate_search').DataTable().page.info();
    // console.log('Showing page: '+info.start)
    if(info.end == 0){
      var start=0;
    }
    else{
     var start= info.start+1;
    }
    $('#result').html( 'Displaying results <b>'+parseInt(start)+'</b> - <b>'+info.end+ '</b> out of <b>'+info.recordsTotal+'</b>' );
} );
// // toggle between hiding and showing the dropdown content */
// function myFunction() {
//  $('#myDropdown').toggle()
// }
// $(window).click(function(evt) {
// 	if(evt.target.id!='btn_type_worker' && evt.target.id!='select2-day-container' && evt.target.id!='select2-available_from-container'){
// 		if(document.getElementById("myDropdown")){
// 		 $('#myDropdown').hide();
// 		}
// 	}
// });
// $( "#filter_candidates" ).click(function() {
//   if($.fn.DataTable.isDataTable('#candidate_search')){
//     $('#candidate_search').DataTable().destroy();
// }
// candidate_search()
// });
function candidate_selected( item ){
 
 if (item.is(':checked')) {
 
   
  var type='checked'
    item.prop("checked", false);

  }
  else{
  var type='unchecked'
  }
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./select',
            data:{type:type,id:item.attr('id')},
            type:'POST',
             dataType: "json",
            success:function(data){
              if(data == 'Out of range'){

                swal("Limit Exceeded!!!", "You can't select more than 20 candidates", "info"); 
                return false;
              }


              if(data <= 1)
              {
                text=' Candidate selected.'
              }
              else{
                text=' Candidates selected.'
              }

                $('#selected_candidates').html('<b>'+data+'</b>' + text)
                if (data <= 10){
                  $('#basic_membership').css("font-weight", "bold");
                  $('#premium_membership').css("font-weight", "normal");
                  $('#count').val(data);
                }
                else{
                  $('#premium_membership').css("font-weight", "bold");
                  $('#basic_membership').css("font-weight", "normal");
                  $('#count').val(data);
                }
               if(type == 'checked'){
              item.prop("checked", true);
               } 
            }
         });


}
$('#select_button').click(function(evt) {

  $('#'+$('#select_button').attr('rel')).click()
 if ($('#select_button').html() === "<b>Select Candidate</b>") {
    $('#select_button').html('<b>Unselect Candidate</b>');
  } else {
    $('#select_button').html('<b>Select Candidate</b>');
  }

  });
function resume(clicked){
  var id= clicked.attr('id')
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./candidate_data',
            data:{id:id},
            type:'POST',
             dataType: "json",
            success:function(data){

              $('#select_button').attr('rel',data.id)
              if($('#'+$('#select_button').attr('rel')).prop('checked')){
                $('#select_button').html('<b>Unselect Candidate</b>')
              }
                if(data.experiences){
                  $('#all_experiences').html(null);
                  $('#all_qualifications').html(null);
                   $('#all_availabilities').html(null);
                   $('#other_info').html(null);

                  $.each(data.experiences, function( index, experience ) {
                    
                  
                  $('#all_experiences').html(
                    $('#all_experiences').html()+
                    '<table><tr><td style="width:150px">Company Name</td><td>'+experience.previous_company+'</td></tr><tr><td>Job title</td><td>'+experience.job_title+'</td></tr><tr><td>Joining Date</td><td>'+experience.job_from+'</td></tr><tr><td>Leaving Date</td><td>'+experience.job_to+'</td></tr></table>'
                    
                      );
                    
                  if(experience.ex_responsibilities != null){
                       $('#all_experiences').html(
                    $('#all_experiences').html()+
                    '<table><tr><td style="width:150px;vertical-align: text-top;">Responsibilities</td><td>'+experience.ex_responsibilities.replace(/\n/g, "<br />")+'</td></tr></table>'+
                    '<hr>')
                  }
                  else{
                    $('#all_experiences').html(
                    $('#all_experiences').html()+'<hr>')
                  }
                  });
                }
                if(data.qualifications){
                  $.each(data.qualifications, function( index, qualification ) {
                    
                  
                  $('#all_qualifications').html(
                    $('#all_qualifications').html()+
                    '<table><tr><td style="width:150px">Qualification</td><td>'+qualification.qualification_name+'</td></tr><tr><td>Date</td><td>'+qualification.qualification_date+'</td></tr></table>'
                      )
                  });
                }
                 if(data.availabilities){
                  $.each(data.availabilities, function( index, availability ) {
                    
                  
                  $('#all_availabilities').html(
                    $('#all_availabilities').html()+
                    '<table><tr><td style="width:150px">'+ availability.day+'</td><td>'+availability.available_from+'</td></tr></table>'
                      )
                  });
                }
                 have_car='No';
                if(data.userinfo.have_car == 1){
                   have_car='Yes';
                }
                travel='No';
                if(data.userinfo.travel == 1){
                   travel='Yes';
                }
                relocate='No';
                if(data.userinfo.relocate == 1){
                   relocate='Yes';
                }
                  // $('#other_info').html(

                  //    'City: '+data.userinfo.city+
                  //    '<br>State: '+data.userinfo.state+
                  //    '<br>Have a car: '+have_car+
                  //    '<br>Willing to travel: '+travel+
                  //    '<br>Willing to relocate: '+relocate

                  //     )
                   $('#myModalLabel2').html(data.name)

                  $('.nav-tabs li a:first').tab('show');
  $('#myModal2').modal('show')
            }
         });



}
$(window).scroll(function(e) {
    
  if ( $(window).scrollTop() > 147) {
    $('#plan').addClass("fixed_top");
    if($( window ).width() <600){
    $('#filter_div').css('padding-top','215px')
    }
    else{
    $('#filter_div').css('padding-top','170px')
    }  

  } else {
    $('#plan').removeClass("fixed_top");
    $('#filter_div').css('padding-top','0')
  }
  
});
$('#reset_selection').click(function(evt) {
  $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./reset_selection',
            type:'POST',
             dataType: "json",
            success:function(data){
              if(data == 0)
              {
                  $('#selected_candidates').html('<b>0</b> candidate is selected.')
                  $('#basic_membership').css("font-weight", "bold");
                  $('#premium_membership').css("font-weight", "normal");
                   if($.fn.DataTable.isDataTable('#candidate_search')){
                    $('#candidate_search').DataTable().destroy();
                }
                candidate_search();
              }
             
            }
         });
});
$( "#proceed_button" ).click(function( event ) {
  event.preventDefault();
 var  membership=<?php echo Auth::user()->userinfo->membership; ?>;
  if(membership == 1){
    if($('#count').val() > 10){
       swal("Upgrade Membership!!!", "Kindly upgrade your membership to proceed with "+ $('#count').val()+ " candidates.", "info"); 
                return false;
    }
    if($('#count').val() == 10){
    var message='You have selected 10 candidates. Do you want to proceed?'
    }
    else{
      var diff=10-$('#count').val();
    var message='You can select '+ diff + ' more candidate(s). Do you want to proceed with selected candidates?'
    }

  }
  else if(membership == 2){
    if($('#count').val() == 20){
    var message='You have selected 20 candidates. Do you want to proceed?'
    }
    else{
      var diff=20-$('#count').val();
    var message='You can select '+ diff + ' more candidate(s). Do you want to proceed with selected candidates?'
    }

  }

 swal({
      title: "Are you sure?",
      text: message,
      icon: "info",
      showConfirmButton: true,
      confirmButtonColor: '#8CD4F5',
      buttons: [
        'No!',
        'Yes, Proceed!'
      ],
      dangerMode: false,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('#selected_candidates_form').submit()
      }
      else{
      event.preventDefault();
      } 
    })

});
</script>

@endsection()