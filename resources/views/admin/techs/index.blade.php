@extends('layouts.app')

@section('content')
<section class="container mt-3 d-flex flex-column align-items-center justify-content-center">
    <h1>Modifica progetti</h1>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Vai ai progetti</a>
    <h5 class="mt-3">Lista tipi di progetto possibili:</h5>
    <table class="table table-hover table-bordered my-3 w-50">
        <thead>
            <tr>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <td>
                    {{$type->label}}
                    <a class="btn btn-primary" href="{{route('admin.types.show', $type)}}">Dettagli</a>
                    <a class="btn btn-warning" href="{{route('admin.types.edit', $type)}}">Modifica</a>            
                    @include('partials._types-modal')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection