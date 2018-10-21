@extends('layouts.app')

@section('content')
    @include('layouts.headerMin')
    <checkout v-bind:images-path='"{!! url('images/small').'/'!!}"'
              v-bind:shop-url='"{!! route('shop').'/'!!}"'

    ></checkout>
@endsection

@section('scripts')
    <script>

    </script>

@endsection
