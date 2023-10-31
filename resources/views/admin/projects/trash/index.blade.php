@extends('layouts.app')

@section('content')
  <section class="container my-5">
    <h1 class="text-center">{{ $title }}</h1>
    <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna alla index</a>
    @foreach ($trashed_projects as $project)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text"><strong>Cancellato il: </strong>{{$project->deleted_at}}</p>
        <p class="card-text"><strong>ID Progetto: </strong>{{$project->id}}</p>
        <p class="card-text"><strong>Tipo: </strong>{!! $project->getBadge() !!}</p>
        <p class="card-text"><strong>Tecnologie utilizzate: </strong>{!! $project->getTechBadges() !!}</p>
        <p class="card-text"><strong>Descrizione: </strong>{{ $project->description }}</p>
        <p class="card-text"><strong>Slug: </strong>{{ $project->slug }}</p>
        <p class="card-text"><strong>Url: </strong>{{ $project->url }}</p>
        @include('partials._trash-modal')
        @include('partials._restore-trash-modal')
      </div>
    </div>
    @endforeach
    {{$trashed_projects->links('pagination::bootstrap-5')}}
  </section>
@endsection