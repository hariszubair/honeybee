@extends('layouts.adminapp')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Candidates</div>
                <div class="card-body">
                <table id="paginationNumbers" class="table" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Email</th>
                            <th class="th-sm">City</th>
                            <th class="th-sm">Updated At</th>
                            <th class="th-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($candiates as $candiate) { ?>
                            <tr>
                                <td><?php echo $candiate->name; ?></td>
                                <td><?php echo $candiate->email; ?></td>
                                <td><?php echo $candiate->city; ?></td>
                                <td><?php echo $candiate->updated_at; ?></td>
                                <td>
                                    <div class="table-data-feature">
                                        
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </button>
                                        <a href="{{URL('/admin-candiate-edit')}}/<?php echo $candiate->user_id; ?>">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        </a>
                                      
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                   
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Updated At</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>                
        

   

@endsection
