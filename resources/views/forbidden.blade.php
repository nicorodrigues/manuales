@extends('layouts.main')

@section('content')

    @if(@session('manual') === null)
        <script type="text/javascript">
        window.location = "/";
        </script>
        {{exit}}
    @endif
    <div class="forbidden">
        <div class="forbidden-text">

            <i class="fas fa-ban"></i>

            @if (!isset($forbidden) || $forbidden === 1)
                <h1>No tenés acceso a esta sección</h1>
            @elseif ($forbidden === 2)
                <h1>Ya pediste acceso, ni bien pueda te habilito!</h1>
            @endif
        </div>

        <form class="" action="/forbidden" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="manual" value="{{@session('manual')}}">
            <button type="submit">Pedir Acceso</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src='/js/sweetalert2.js'></script>
@endsection
