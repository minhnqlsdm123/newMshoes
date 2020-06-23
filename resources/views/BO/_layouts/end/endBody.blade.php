<script src="{{asset('')}}assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="{{asset('')}}assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="{{asset('')}}assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="{{asset('')}}assets/libs/js/main-js.js"></script>
<script type="text/javascript">
    $("document").ready(function(response){
        setTimeout(()=>{
            $('.alert').hide('slow')
        },3000)
    })
</script>
@yield('endJs')
