@extends('layouts.app')

@section('content')
<h1 class="mt-2 text-center">Modifica Progetto</h1>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <h4>Correggi i seguenti errori</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="container my-3 d-flex flex-column flex-wrap justify-content-center align-items-center">
    <form action="{{route('admin.projects.update', $project)}}" method="POST" class="row">
        @csrf
        @method('PUT')
        <div class="col-6">
            <label for="title" class="form-label">Titolo</label>
            <input type="text"  name="title" id="title" value="{{old('title') ?? $project->title}}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="type_id" class="form-label">Tipo di progetto</label>
            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                <option>Seleziona</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" @if (old('$type_id') ?? $project->type_id == $type->id ) selected @endif>{{$type->label}}
                </option>
                @endforeach
            </select>
            @error('type_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text"  name="description" id="description" value="{{old('description') ?? $project->description}}" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="url" class="form-label">Url</label>
            <input type="text"  name="url" id="url" value="{{old('url') ?? $project->url}}" class="form-control @error('url') is-invalid @enderror">
            @error('url')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button class="btn btn-success my-3 col-3">Salva</button>
    </form>
    <a class="btn btn-primary col-3" href="{{route('admin.projects.index')}}">Torna alla home page</a>
</div>
@endsection