
@section('style')
<!-- select2 -->
<link href="{{asset('backend/css/select/select2.min.css')}}" rel="stylesheet">
@endsection


@section('script')
    <!-- select2 -->
<script src="{{asset('backend/js/select/select2.full.js')}}"></script>
<script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select president",
        allowClear: true
      });
    });
</script>
@endsection