@extends('layouts.app')

@section('content')
    <clocks-list v-bind:images-path="'{!! url('/images/medium').'/' !!}'"
                 v-bind:clocks='{!! json_encode($data["clocks"]) !!}'
                 v-bind:filter='{!! json_encode($data["filter"]) !!}'>
    </clocks-list>

@endsection

@section('scripts')
    <script>
        var data = {!! json_encode($data) !!};





    </script>

@endsection
