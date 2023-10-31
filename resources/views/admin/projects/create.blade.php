@extends('layouts.app')

@section('content')
<h1 class="text-center my-3">Inserisci il tuo progetto</h1>
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
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-6">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" value="{{old('title')}}"
                class="form-control @error('title') is-invalid @enderror">
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
                <option value="{{$type->id}}" @if (old('$type_id')==$type->id ) selected @endif>{{$type->label}}
                </option>
                @endforeach
            </select>
            @error('type_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <label for="technologies" class="form-label">Tecnologie del progetto</label>
            <div class="form-check @error('technologies') is-invalid @enderror">
                @foreach ($technologies as $technology)
                <div class="col-12">
                    <input type="checkbox" class="form-check-input" name="technologies[]"
                        id="technology-{{$technology->id}}" value="{{$technology->id}}" @if(in_array($technology->id,
                    old('technologies')?? [])) checked
                    @endif
                    >
                    <label class="form-check-label" for="technology-{{$technology->id}}">{{$technology->label}}</label>
                </div>
                @endforeach
            </div>
            @error('technologies')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <div class="input-group w-50">
                <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control @error('image') is-invalid @enderror">
                <label class="input-group-text" for="image">Upload</label>     
            </div>
            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" name="description" id="description" value="{{old('description')}}"
                class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="url" class="form-label">Url</label>
            <input type="text" name="url" id="url" value="{{old('url')}}"
                class="form-control @error('url') is-invalid @enderror">
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