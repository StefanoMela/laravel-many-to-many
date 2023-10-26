@extends('layouts.app')

@section('content')
<section class="container mt-5">
  <h1>{{ $title }}</h1>
  <h5>Fai log in per modificare i progetti</h5>

  <section class="container my-5">
    <h1 class="text-center">{{ $title }}</h1>
    @foreach ($projects as $project)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text"><strong>Tipo: </strong>{!! $project->getBadge() !!}</p>
        <p class="card-text"><strong>Descrizione: </strong>{{ $project->description }}</p>
        <p class="card-text"><strong>Slug: </strong>{{ $project->slug }}</p>
        <p class="card-text"><strong>Url: </strong>{{ $project->url }}</p>
      </div>
    </div>
    @endforeach
  </section>
  {{$projects->links('pagination::bootstrap-5')}}
@endsection