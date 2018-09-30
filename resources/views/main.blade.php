@extends('layouts.app')

@section('content')
    <clocks-list></clocks-list>
@endsection

@section('scripts')
    <script>
        var data = {!! json_encode($data) !!};
        var imagesPath = "{!! url('/images/medium').'/' !!}"
    </script>

@endsection
