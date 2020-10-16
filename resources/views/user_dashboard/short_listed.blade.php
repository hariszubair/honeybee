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
table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
      display: none
 }
 table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after 
 {
      display: none
  
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
.dataTables_length{
  font-size: 12px
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
.active{
color:black !important;
}
.custom_button{
  border-radius: 22px;padding-left: 10px;padding-right: 10px;color:#fff;background: #238db7;
}
.custom_button:hover {background-color: #4b4f50}
</style>
<div id='page'>
<form action="./request_interview" method="Post" id='request_interview_form'> 
                        @csrf
Please click on recent work experience to view candidate’s personal details (email and phone #)
<!-- <button type="button" style="border:1px solid #aaaaaa;border-radius: 22px;padding-right: 10px;padding-left: 10px;margin-bottom: 15px;float: left;margin-left: 5px;white-space: nowrap;text-align: center" id='interview_button'><b>Request Interview</b></button> -->
</form>
     <table  id="candidate_search" class="display table  " style="font-size: 11px;padding-left: 0%;color: #272f66;border:0" style="font-size: 11px;padding-left: 0%;color: #272f66;border:0;width=100%" cellspacing="0" >
                      <thead style="background-color: #f8f9fa !important;word-break:keep-all">
                        <tr style="white-space: nowrap;">
                          <th >Most recent work experience </th>
                          <th >Name</th>
                          <th >Total Experience</th>
                          <th >All Cuisine Experience</th>
                          <th >Suburb</th>
                          <th >Last Updated</th>
                          <th >Selected On</th>
                        </tr>
                      </thead>
                      <tbody style="border:0" title="Click on the most recent work experience to view candidate detail">
                     
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
          <h1 class="modal-title" id="myModalLabel2" style="color: #238db7;text-transform: capitalize;"></h1>
          
        </div>

        <div class="modal-body" style="color: #272f66">
          <div class="container mt-3" style=" overflow: scroll-x;width: 100%;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" style="min-width: 550px;">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home" style='font-size: 16px;font-weight: bold; color: #bda6b0'><p>Personal Detail</p></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1" style='font-size: 16px;font-weight: bold; color: #bda6b0'><p>All Experience</p></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2" style='font-size: 16px;font-weight: bold; color: #bda6b0'><p>Qualifications</p></a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2" style='font-size: 16px;font-weight: bold; color: #bda6b0'><p>Availability</p></a>
    </li> -->
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="min-width: 550px;">
    <div id="home" class="container tab-pane active"><br>
      <div id='personal_detail' style="color: #238db7;text-align: justify;"> </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div id='all_experiences' style="color: #238db7"> </div>     
    </div>
   <!--  <div id="menu2" class="container tab-pane fade"><br>
      <div id='all_availabilities' style="color: #238db7;text-transform:capitalize;"> </div>
    </div> -->
    <div id="menu2" class="container tab-pane fade"><br>
      <div id='all_qualifications' style="color: #238db7"> </div>
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
        // serverSide: true,
         searching: false,
         pageLength: 25,
         // paging:true,
         info: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./get_selected_candidates' ,
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
        { "data": 'suburb','name':'suburb'},
        { "data": 'updated','name':'updated_at', "searchable": true},
        { "data": 'confirmed','name':'confirmed', "searchable": true},
        ],
        "columnDefs": [
    { "width": "10%", "targets": 1 },
    { "width": "10%", "targets": 2 },
    { "width": "20%", "targets": 3 },
    { "width": "20%", "targets": 4 },
    { "width": "10%", "targets": 5 },
    { "width": "30%", "targets": 0 },


  ],
  "rowCallback": function( row, data, index ) {
        $('tr th', row).css('border-bottom', '0')
      
        $('td', row).css('background-color', '#ffffff00')
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
                   $('#personal_detail').html(null);

                  $.each(data.experiences, function( index, experience ) {
                  $('#all_experiences').html(
                    $('#all_experiences').html()+
                    '<b>'+experience.previous_company+'</b> ('+experience.no_of_employees+' Employees'+')<br>'+experience.job_from+' to '+experience.job_to+'<br>'+experience.job_title
                      );
                  if(experience.ex_responsibilities != null){
                    var responsibilities=experience.ex_responsibilities.split(/\n/g);
                    var text_responsibilities=''
                    $.each( responsibilities, function( key, value ) {
                     text_responsibilities+='<li>'+value+'</li>';
                  });


                       $('#all_experiences').html(
                    $('#all_experiences').html()+'<br>'+'<ul style="padding-left:20px">'+text_responsibilities+'</ul>'+'<hr>')
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
                    qualification.qualification_name+'<br>'+qualification.qualification_date+'<hr>'
                      )
                  });
                }
               
                   have_car='No';
                if(data.userinfo.have_car == 1){
                   have_car='Yes';
                }
                travel='No';
                var to='';
                if(data.userinfo.travel == 1){
                   travel='Yes';
                   to= ' (upto '+data.userinfo.travel_distance+ ' Km)';
                }
                relocate='No';
                var relocate_to='';
                if(data.userinfo.relocate == 1){
                   relocate='Yes';
                   relocate_to=' (to '+data.userinfo.relocate_state+')'
                }
                var dob=new Date(data.userinfo.date_birth);
                 var ageDifMs = Date.now() - dob.getTime();
              var ageDate = new Date(ageDifMs); // miliseconds from epoch
               var age= Math.abs(ageDate.getUTCFullYear() - 1970);
               if(data.userinfo.personal_summary){
                  var personal_detail='<b>Personal Summary: </b>'+data.userinfo.personal_summary+'<br>';
                }
                else{
                  var personal_detail=''
                }
                 if(data.userinfo.work_experience){
                  var work_experience='<b>Work Experience Summary: </b>'+data.userinfo.work_experience+'<br>';
                }
                else{
                  var work_experience=''
                }
                if(data.userinfo.availability){
                  var available=data.userinfo.availability+ ' available.<br>';
                }
                else{
                  var available=''
                }
                  $('#personal_detail').html(
                      '<b>Email: </b>'+data.userinfo.email+'<br>'+
                      '<b>Phone: </b>'+data.userinfo.phone_number+'<br>'+
                      '<b>Age: </b>'+age+ ' Years old <br>'+
                       personal_detail+
                      work_experience+
                      available+
                     '<b>City: </b>'+data.userinfo.city+
                     '<br><b>State: </b>'+data.userinfo.state+
                     '<br><b>Have a car: </b>'+have_car+
                     '<br><b>Willing to travel: </b>'+travel+to+
                     '<br><b>Willing to relocate: </b>'+relocate+relocate_to
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