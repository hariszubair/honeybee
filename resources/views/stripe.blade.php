@extends('layouts.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        a.list-group-item, button.list-group-item {
    border: 0;
    padding-top: 30px;
}
    </style>

  
<div class="container">
  
   
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
           
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" style="color: #4a4f50">Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="pk_test_51HUvHvCC6RL731HnLqliHIqlRusRpWliaXnEx2ldy6AtivoV2XUkksj3LZiQF8h26aLyFcpMcvi8sV6koBQV1YNG0076JvwW0u"
                                                    id="payment-form" style="color: #4a4f50">
                        @csrf
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <select  class='form-control card-expiry-month'>
                                    <option value="">MM</option>
                                    @for($i=1;$i<13;$i++)
                                    <option>{{$i}}</option>
                                    @endfor
                                </select>

                              <!--    <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text -->
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <select class='form-control card-expiry-year'>
                                    <option value="">YYYY</option>
                                    @for($i=0;$i<40;$i++)
                                    <option> {{date("Y")+$i}}</option>
                                    @endfor
                                </select>
                                 
                            </div>
                            
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Membership</label> 
                                <select name='membership' required class="form-control">
                                    @if(Auth::user()->unconfirmed_selected_candidates->count() <= 5)
                                    <option value="1">Basic Membership (AUD $200)</option>
                                    @else (Auth::user()->unconfirmed_selected_candidates->count() <= 10)
                                    <option value="2">Premium Membership (AUD $300)</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-xs-9">
                             <h4 style="padding-top: 0">You have selected {{Auth::user()->unconfirmed_selected_candidates->count()}} candidate(s)</h4>
                         </div>
                            <div class="col-xs-3">
                                <button class="btn btn-success btn-lg btn-block" type="submit" >Pay Now</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]', 'select',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
</html>
@endsection()