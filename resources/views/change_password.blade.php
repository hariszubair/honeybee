@extends('layouts.master')

@section('content')
<form id="main_form" method="post" action="./update_password" >
    {!! csrf_field() !!}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                              
          @if (\Session::has('success'))
          <div class="alert alert-success" >
          {!! \Session::get('success') !!}
          </div>
          @endif


        <div class="card" style="width: 60%; margin:0 auto;">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                 
                        <div >
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Current Password:</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="password" class="form-control" value="" name='current_password' required>
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">New Password:</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="password" class="form-control" value="" name='new_password' required>
                                    
                                </div>
                            </div>
                             <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label">Verify Password:</label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <input type="password" class="form-control" value="" name='new_confirm_password' required>
                                </div>
                            </div>
                            
                     <div class="row form-group">
                               <div class="col col-md-4">
                                    <label for="text-input" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <button type="submit" class="btn btn-success">Change</button>
                                </div>
                            </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>


@endsection()

@section('footer')
<script type="text/javascript">
    
    $(document).ready(function() {
    $('.js-example-basic-single').select2({});

});
</script>
@endsection()