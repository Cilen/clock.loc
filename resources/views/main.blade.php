@extends('layouts.app')

@section('content')
    <clocks-list v-bind:images-path='"{!! url('images/medium').'/'!!}"'
                 v-bind:clocks-data='{!! json_encode($data["clocks"]) !!}'
                 v-bind:filter='{!! json_encode($data["filter"]) !!}'
                 v-bind:filter-url='"{!! route('filter') !!}"'
                 v-bind:main-url='"{!! route('main') !!}"'>
    </clocks-list>

@endsection

@section('scripts')
    <script>
        var data = {!! json_encode($data) !!};





    </script>

@endsection
