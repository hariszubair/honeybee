@extends('layouts.master')

@section('content')
<style type="text/css">
   table.dataTable.no-footer {
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
.swal-button--confirm{
  background-color: green;
}
</style>
<div id='page'>
<form action="./request_interview" method="Post" id='request_interview_form'> 
                        @csrf

<button type="button" style="border:1px solid #aaaaaa;border-radius: 22px;padding-right: 10px;padding-left: 10px;margin-bottom: 15px;float: left;margin-left: 5px;white-space: nowrap;text-align: center" id='interview_button'><b>Request Interview</b></button>
</form>
     <table  id="candidate_search" class="display table  "  style="font-size: 11px;padding-left: 0%;color: #272f66;border:0;width=100%" cellspacing="0" >
                      <thead style="background-color: #f8f9fa !important;word-break:keep-all">
                        <tr style="white-space: nowrap;">
                          <th >Most recent work experience </th>
                          <th >Name</th>
                          <th >Experience</th>
                          <th >Cuisine</th>
                          <th >Suburb</th>
                          <th >Last Updated</th>
                        </tr>
                      </thead>
                      <tbody style="background-color: #fff !important;border:0;word-break: break-all;">
                     
                      </tbody>
                    </table>
  </div>

   </div>  
  <!-- Modal -->
  <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="font-size: 12px">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >

        <div class="modal-header" style='min-width: 600px;'>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="margin-right:30px">&times;</span></button>
          <h1 class="modal-title" id="myModalLabel2" style="color: #238db7">Name of Client</h1>
        </div>

        <div class="modal-body" style="color: #272f66">
          <div class="container mt-3" style=" overflow: scroll-x;width: 100%;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" style="min-width: 550px;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" style="color: #272f66">Personal Info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu4" style="color: #272f66">All Experiene</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" style="color: #272f66">Qualifications</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2" style="color: #272f66">Availability</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3" style="color: #272f66">Other Info</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="min-width: 550px;">
    <div id="home" class="container tab-pane active"><br>
      <h3>Personal Info</h3>
      <div id='personal_info' style="color: #238db7"> </div>
    </div>
    <div id="menu4" class="container tab-pane"><br>
      <h3>All Experiene</h3>
      <div id='all_experiences' style="color: #238db7"> </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Qualifications</h3>
      <div id='all_qualifications' style="color: #238db7"> </div>
     
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Availability</h3>
      <div id='all_availabilities' style="color: #238db7"> </div>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
      <h3>Other Info</h3>
      <div id='other_info' style="color: #238db7"> </div>
      
    </div>
  </div>
</div>
        </div>

      </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  
            
                    

@endsection

@section('footer')
<script type="text/javascript">
	$(document).ready(function() {
		short_listed();
});
		function short_listed () {

     var role_apply = $('#role_apply').val();
    var previous_cousine_experience = $('#previous_cousine_experience').val();
    var state = $('#state').val();
    var available_from = $('#available_from').val();
    var visa_type = $('#visa_type').val();

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
         url:'./get_selected_candiates' ,
           method: 'Post',
          data: function (d) {
              d.role_apply = role_apply;
              d.previous_cousine_experience = previous_cousine_experience;
              d.state = state;
              d.available_from = available_from;
              d.visa_type = visa_type;
        },
},

        // ajax: {
        //     url:'/show/'+id,  
        //   },
        columns: [
      
          
      { "data": 'recent_experience_column','name':'id', "searchable": true},
       { "data": 'name','name':'name'},
       { "data": 'experience_yr','name':'experience', "searchable": true},
       { "data": 'previous_cousine_experience','name':'previous_cousine_experience', "searchable": true},
        { "data": 'suburb','name':'suburb',"orderable":false,"searchable": false},
        { "data": 'updated','name':'updated_at', "searchable": true},
        ],
        "columnDefs": [
    { "width": "15%", "targets": 1 },
    { "width": "10%", "targets": 2 },
    { "width": "20%", "targets": 3 },
    { "width": "20%", "targets": 4 },
    { "width": "10%", "targets": 5 },
    { "width": "20%", "targets": 0 },


  ],
  "rowCallback": function( row, data, index ) {
        $('tr th', row).css('border-bottom', '0')
      
        $('td', row).css('background-color', 'white')
},

             
    });
    
}
function candidate_selected( item ){
 if (item.is(':checked')) {
  var type='checked'
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

	             $('#candidate_search').DataTable().ajax.reload();  
                $('#count_selected_candidates').html(data)
               
            }
         });


}
function resume(clicked){
  var id= clicked.attr('id')
   $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            url:'./candidate_complete_data',
            data:{id:id},
            type:'POST',
             dataType: "json",
            success:function(data){
                if(data.experiences){
                  $('#all_experiences').html(null);
                  $('#all_qualifications').html(null);
                   $('#all_availabilities').html(null);
                   $('#other_info').html(null);
                   $('#personal_info').html(null);
                  $.each(data.experiences, function( index, experience ) {
                    
                  
                  $('#all_experiences').html(
                    $('#all_experiences').html()+
                    'Company Name:'+experience.previous_company+
                    '<br>Job title:'+experience.job_title+
                    '<br>Joining Date:'+experience.job_from+
                    '<br>Leaving Date:'+experience.job_to
                      );
                    
                  if(experience.ex_responsibilities != null){
                       $('#all_experiences').html(
                    $('#all_experiences').html()+'<br>Responsibilities:'+experience.ex_responsibilities.replace(/\n/g, "<br />")+
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
                    'Qualification:'+qualification.qualification_name+
                    '<br>Date:'+qualification.qualification_date+
                    '<hr>'
                      )
                  });
                }
                 if(data.availabilities){
                  $.each(data.availabilities, function( index, availability ) {
                    
                  
                  $('#all_availabilities').html(
                    $('#all_availabilities').html()+
                      availability.day+':'+availability.available_from+
                    '<br>'
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
                  $('#other_info').html(
                     'City:'+data.userinfo.city+
                     '<br>State:'+data.userinfo.state+
                     '<br>Have a car:'+have_car+
                     '<br>Willing to travel:'+travel+
                     '<br>Willing to relocate:'+relocate

                      )

                  $('#personal_info').html(
                    $('#personal_info').html()+
                    'Phone #: '+data.userinfo.phone_number+
                    '<br>Email: '+data.userinfo.email+
                    '<br>Date of Birth: '+data.userinfo.date_birth+
                    '<br>Address: '+data.userinfo.street_address+', '+data.userinfo.city+', '+data.userinfo.state+data.userinfo.postcode+
                    '<br>Date of Birth: '+data.userinfo.date_birth+
                    '<hr>'
                      )
                   $('#myModalLabel2').html(data.name)

                  $('.nav-tabs li a:first').tab('show');
  $('#myModal2').modal('show')
            }
         });



}
$( "#interview_button" ).click(function( event ) {
 swal({
      title: "Are you sure?",
      text: 'Do you want us to interview these candidate?',
      icon: "info",
      showConfirmButton: true,
      buttons: [
        'No!',
        'Yes, Proceed!'
      ],
      dangerMode: false,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $('#request_interview_form').submit()
      }
      else{
      event.preventDefault();
      } 
    })

});
</script>
@endsection()