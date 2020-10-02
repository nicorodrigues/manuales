@extends('layouts.main')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/2.0.18/plyr.css">
@endsection

@section('content')
    @if (@session('forbidden'))
        <script src='/js/sweetalert2.js'></script>
        @if (@session('forbidden') === 1)
            <script type="text/javascript">
                swal('Te habilito ni bien pueda !');
            </script>
        @elseif (@session('forbidden') === 2)
            <script type="text/javascript">
                swal('Tranqui, ya te voy a habilitar !');
            </script>
        @endif
    @endif
@endsection

@section('scripts')
    <script src="https://cdn.plyr.io/2.0.18/plyr.js"></script>
    <script>plyr.setup('.video');</script>
@endsection
