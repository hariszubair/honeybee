 <!-- Bootstrap JS-->
            <script src="{{ asset('public/js/popper.min.js') }}"></script>
            <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
            <!-- Vendor JS       -->
            <script src="{{ asset('public/vendor/slick/slick.min.js') }}"></script>
            <script src="{{ asset('public/vendor/wow/wow.min.js') }}"></script>
            <script src="{{ asset('public/vendor/animsition/animsition.min.js') }}"></script>
            <script src="{{ asset('public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <script src="{{ asset('public/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('public/vendor/counter-up/jquery.counterup.min.js') }}"></script>
            <script src="{{ asset('public/vendor/circle-progress/circle-progress.min.js') }}"></script>
            <script src="{{ asset('public/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('public/vendor/chartjs/Chart.bundle.min.js') }}"></script>
            <script src="{{ asset('public/vendor/select2/select2.min.js') }}">
            </script>


            <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('public/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
    
    <script src="{{asset('public/js/buttons.print.min.js')}}"></script>
   
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
var parts = $(location).attr('href').split("/");
var last_part = parts[parts.length-1];
    $(function(){
    var current = location.pathname;
    $('.list-group-horizontal a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').includes(last_part)){
            $this.addClass('active');
        }
        else{
            $this.removeClass('active');
            
        }
    })
})
})
</script>
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>

    @include('sweet::alert')

             @yield('footer')
    
            <!-- Main JS-->
            <script src="{{ asset('public/js/cool/main.js') }}"></script>
             <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        

    </div>
    </div>
</body>
</html>