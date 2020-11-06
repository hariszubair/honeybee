@extends('layouts.master')


@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<style type="text/css">
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
      display: none
 }
 table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after 
 {
      display: none
  
 }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Candidates</div>
                <div class="card-body">
                <table id="candidate_search" class="table" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">Phone #</th>
                            <th class="th-sm">Updated At</th>
                            <th class="th-sm notexport">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                   
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone #</th>
                            <th>Updated At</th>
                            <th class="notexport">Action</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>                
        

   

@endsection
@section('footer')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/js/jszip.min.js')}}"></script>
<script src="{{asset('public/js/pdfmake.min.js')}}"></script>
<script src="{{asset('public/js/vfs_fonts.js')}}"></script>

     <script src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
     <script src="{{asset('public/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('public/js/buttons.print.min.js')}}"></script>
     
     
     
   
    
     

<script type="text/javascript">
    $(document).ready(function() {
        candidates();
});
        function candidates () {


     $('#candidate_search').DataTable({
       dom: 'Bfrltip',
         buttons: [

           {
extend: 'excelHtml5',
text: '<i class="fa fa-file-excel-o"></i> Excel',
titleAttr: 'Export to Excel',
exportOptions: {
columns: ':not(:last-child)',
}
},
{
extend: 'csvHtml5',
text: '<i class="fa fa-file-text-o"></i> CSV',
titleAttr: 'CSV',
exportOptions: {
columns: ':not(:last-child)',
}
},
{
extend: 'pdfHtml5',
text: '<i class="fa fa-file-pdf-o"></i> PDF',
titleAttr: 'PDF',
orientation: 'landscape',
                pageSize: 'LEGAL',
exportOptions: {
columnDefsmns: ':not(:last-child)',
},
},
{
extend: 'print',
exportOptions: {
columns: ':visible'
},
customize: function(win) {
$(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
}
}
        ],
         
        processing: true,
        serverSide: true,
         // searching: false,
         pageLength: 10,
         // paging:true,
         // info: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./view_candidates' ,
           method: 'Post',
         
},

        // ajax: {
        //     url:'/show/'+id,  
        //   },
        columns: [
      
          
       { "data": 'name','name':'name'},
       { "data": 'email','name':'email', "searchable": true},
       { "data": 'phone_number','name':'phone_number', "searchable": true},
        { "data": 'update','name':'updated_at', "searchable": true},
        { "data": 'action','name':'action', "searchable": true},
        ],
        "columnDefs": [
    { "width": "25%", "targets": 0 },
    { "width": "25%", "targets": 1 },
    { "width": "15%", "targets": 2 },
    { "width": "15%", "targets": 3 },
    { "width": "20%", "targets": 4 },
  ],
  "rowCallback": function( row, data, index ) {
        $('tr th', row).css('border-bottom', '0')
      
        $('td', row).css('background-color', '#ffffff00')
},

             
    });
    
}
</script>

@endsection