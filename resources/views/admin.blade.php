@extends('layouts.main')

@section('title')
    Admin Panel
@endsection

@section('content')
    <ul class="tabla">
        <li class="tabla-fila">
            <div class="tabla-row">
                Nombre
            </div>
            <div class="tabla-row">
                Email
            </div>
            <div class="tabla-row">
                Curso
            </div>
            <div class="tabla-row">
                Permiso
            </div>
        </li>
        @foreach ($users as $user)
            @foreach ($user->manuals as $manual)
                @php
                    $pivot = $userManual->where('user_id', $user->id)->where('manual_id', $manual->id)->first();
                @endphp
                <li class="tabla-fila">
                    <div class="tabla-row">
                        {{$user->name}}
                    </div>
                    <div class="tabla-row tabla-email">
                        {{$user->email}}
                    </div>
                    <div class="tabla-row">
                        {{$manual->name}}
                    </div>
                    <div class="tabla-row">
                        <input type="hidden" name="id" value="{{$pivot->id}}">
                        @if ($pivot->forbidden === 0)
                            <input type='checkbox' class='ios8-switch' id='toggle-{{$pivot->id}}' checked/>
                            <label for="toggle-{{$pivot->id}}">Permitido</label>
                        @elseif ($pivot->forbidden === 1)
                            <input type='checkbox' class='ios8-switch' id='toggle-{{$pivot->id}}'/>
                            <label for="toggle-{{$pivot->id}}">No Permitido</label>
                        @endif
                    </div>
                </li>
            @endforeach
        @endforeach
    </ul>
@endsection

@section('scripts')
    <script src="/js/app.js"></script>
    <script src="/js/admin.js"></script>
@endsection
