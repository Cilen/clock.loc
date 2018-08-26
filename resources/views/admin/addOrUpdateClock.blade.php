
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
        <clock-form>
        </clock-form>
    @if (isset($data['clock_id']))
        <ul class="nav nav-tabs" id="tabList" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="descriptions-tab" data-toggle="tab" href="#descriptions" role="tab" aria-controls="descriptions" aria-selected="true">Опис</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="characteristics-tab" data-toggle="tab" href="#characteristics" role="tab" aria-controls="characteristics" aria-selected="false">Характеристики</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Зображення</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="descriptions" role="tabpanel" aria-labelledby="descriptions-tab">
                <descriptions-form></descriptions-form>
            </div>
            <div class="tab-pane fade" id="characteristics" role="tabpanel" aria-labelledby="characteristics-tab">
                <characteristics-form></characteristics-form>
            </div>
            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                <images-form></images-form>
            </div>
        </div>
    @endif


@endsection
@section('scripts')
    <script>
        @if (isset ($data))
            var data = {!! json_encode($data) !!};
            var descriptions = {!! json_encode($descriptions) !!};
            var descriptionUrl = "{!! url('/admin/clocks/descriptions') !!}";
            var descriptionUrl = "{!! url('/admin/clocks/characteristics') !!}";
        @endif
        var url = "{!! url('/admin/clocks') !!}";
    </script>


@endsection
