@extends('layouts.app')

@section('content')
  <section class="container my-5">
    <h1 class="text-center">{{ $title }}</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea il tuo progetto</a>
    <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Crea il tuo tipo di progetto</a>
    @foreach ($projects as $project)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text"><strong>Tipo: </strong>{!! $project->getBadge() !!}</p>
        <p class="card-text"><strong>Descrizione: </strong>{{ $project->description }}</p>
        <p class="card-text"><strong>Slug: </strong>{{ $project->slug }}</p>
        <p class="card-text"><strong>Url: </strong>{{ $project->url }}</p>
        <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">Dettagli</a>
        <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">Modifica</a>
        @include('partials._modal')
      </div>
    </div>
    @endforeach
    {{$projects->links('pagination::bootstrap-5')}}
  </section>
@endsection