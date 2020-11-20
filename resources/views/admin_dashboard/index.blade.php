@extends('layouts.master')

@section('content')
<style type="text/css">
 
</style>

            <!-- MAIN CONTENT-->
          <!--   <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                         -->
                   
                          <!-- STATISTIC-->
           <!--  <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">10,368</h2>
                                <span class="desc">members online</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">388,688</h2>
                                <span class="desc">items sold</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">$1,060,386</h2>
                                <span class="desc">total earnings</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- END STATISTIC-->
                        
                       
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="au-card chart-percent-card"  style="height: 450px">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5" style="font-size: 16px">Candidates by state</h3>
                                        <div class="row no-gutters">
                                            <canvas id="myChart" ></canvas> 
                                           
                                        </div>
                                    </div>
                                     <ol>
                                               @foreach($candidate_state as $record)
                                               <li>{{$record->state}}: {{$record->count_row}}</li>
                                               @endforeach
                                           </ol>
                                </div>
                            </div>
                            <div class="col-lg-4"   >
                                <div class="au-card chart-percent-card"  style="height: 450px">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-5" style="font-size: 16px">Candidates by role</h3>
                                        <div class="row no-gutters">
                                            <canvas id="candidate_role-chart" ></canvas> 
                                           
                                        </div>

                                    </div>
                                    <ol>
                                               @foreach($candidate_role as $record)
                                               <li>{{ucfirst($record->role_apply)}}: {{$record->count_row}}</li>
                                               @endforeach
                                           </ol>
                                </div>
                            </div>
                            <div class="col-lg-4" >
                                <div class="au-card chart-percent-card" style="height: 450px">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 tm-b-4" style="font-size: 14px">Registered / Unregistered Candidates</h3>
                                        <div class="row no-gutters">
                                            <canvas id="candidates" >
                                                
                                            </canvas> 
                                        </div>
                                    </div>
                                    <ol>
                                              
                                               <li>Registered Candidates: {{$registered_candidate}}</li>
                                                <li>Un-registered Candidates: {{$unregistered_candidate}}</li>
                                           </ol>
                                </div>
                            </div>
                            


                        </div>
                    </div>
          <!--       </div>

            </div>
      

    </div> -->

    <input type="" name="candidate_state" id='candidate_state' value="{{$candidate_state}}" style="display: none">
    <input type="" name="candidate_role" id='candidate_role' value="{{$candidate_role}}" style="display: none"> 

@endsection



@section('footer')

<script type="text/javascript">
    var label=[];
    var data=[];
$( document ).ready(function() {
  $('.confirm').on('click', function () {
    return confirm('Are you sure want to continue?');
});
    var candidate_state=JSON.parse($('#candidate_state').val());
    var candidate_role=JSON.parse($('#candidate_role').val());
    let label = candidate_state.map(a => a.state);
    let data=candidate_state.map(a => a.count_row  );
    // arr.map(i => '#' + i);
     var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: label,
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "#3498db",
        "#95a5a6",
        "#ecdba6",
        "#f1c40f",
        "#e74c3c",
        "#34495e",
        "#5d490f"
      ],
      data: data
    }]
  },

});
var unregistered='<?php echo $unregistered_candidate; ?>'
var registered='<?php echo $registered_candidate; ?>'

var candidates = document.getElementById("candidates").getContext('2d');
var myChart2 = new Chart(candidates, {
  type: 'doughnut',
  data: {
    labels: ['Registered','Unregistered'],
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "red"
      ],
      data: [registered,unregistered]
    }]
  },

});
    // console.log(Object.values(candidate_state))  

    var candidate_role=JSON.parse($('#candidate_role').val());
    let label2 = candidate_role.map(a => a.role_apply);
    let data2=candidate_role.map(a => a.count_row  );
    // arr.map(i => '#' + i);
     var ctx2 = document.getElementById("candidate_role-chart").getContext('2d');
var myChart2 = new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: label2,
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "#3498db",
        "#95a5a6",
        "#ecdba6",
        "#f1c40f",
        "#e74c3c",
        "#34495e",
        "#5d490f"
      ],
      data: data2
    }],
  },

});


});



   
</script>
@endsection