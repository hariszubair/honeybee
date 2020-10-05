@extends('layouts.master')


@section('content')
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
                            <th class="th-sm">Updated At</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        
                   
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Updated At</th>
                            <th>Action</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        candidates();
});
        function candidates () {


     $('#candidate_search').DataTable({
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
        { "data": 'update','name':'updated_at', "searchable": true},
        { "data": 'action','name':'action', "searchable": true},
        ],
        "columnDefs": [
    { "width": "30%", "targets": 0 },
    { "width": "30%", "targets": 1 },
    { "width": "20%", "targets": 2 },
    { "width": "20%", "targets": 3 },
  ],
  "rowCallback": function( row, data, index ) {
        $('tr th', row).css('border-bottom', '0')
      
        $('td', row).css('background-color', '#ffffff00')
},

             
    });
    
}
</script>

@endsection