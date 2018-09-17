
@extends('admin.layouts.app')

@section('content')


    <clocks-table>
    </clocks-table>


@endsection
@section('scripts')
    <script>
        var clockUrl = "{!! url('/admin/clocks') !!}";
        var data = {!! json_encode($data) !!};
    </script>


@endsection
