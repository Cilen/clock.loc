
@extends('admin.layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (! isset($data['clock_id']))
        <article-form></article-form>
    @else
{{--        <clock-form v-bind:clock-data='{!! json_encode($data) !!}'--}}
{{--                    v-bind:update-url='"{!! url("/admin/clocks")."/".$data["clock_id"] !!}"'--}}
{{--        ></clock-form>--}}
    @endif


@endsection
@section('scripts')
    <script>
    </script>


@endsection
