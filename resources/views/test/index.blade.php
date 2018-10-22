@extends('layout.app')
@section('content')


    111
    <div id="fake">fake</div>
    <tree-menu></tree-menu>

    @push('script')
        <script>
          $(document).ready(function () {
            $('#fake').html('<h1>h1 title</h1><style> #fake{color:red;}</style><script> console.log(11)<\/script>');
          });
        </script>
    @endpush
@endsection
