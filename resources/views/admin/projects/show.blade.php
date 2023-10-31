@extends('layouts.app')

@section('content')
  <section class="container mt-5">
    <div class="card my-5">
      <div class="row d-flex justify-content-center">
        <div class="col-6">
          <img src="{{asset('/storage/'. $project->image)}}" class="img-fluid" alt="project-image">
        </div>
      </div>
      <div class="card-body text-center">
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text">{!! $project->getBadge() !!}</p>
        <p class="card-text">{!! $project->getTechBadges() !!}</p>
        <p class="card-text">{{ $project->description }}</p>
        <p class="card-text">{{ $project->slug }}</p>
        <p class="card-text">{{ $project->url }}</p>
        <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Torna ai progetti</a>
      </div>
      </div>
  </section>
@endsection
