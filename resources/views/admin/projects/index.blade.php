@extends('layouts.app')

@section('content')
  <section class="container my-5">
    <h1 class="text-center">{{ $title }}</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea il tuo progetto</a>
    <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Crea il tuo tipo di progetto</a>
    <a href="{{route('admin.projects.trash.index')}}" class="btn btn-primary" >Vai al cestino</a>
    @foreach ($projects as $project)
    <div class="card my-4 h-100">
      <div class="card-body text-center">
        <h5 class="card-title">{{ $project->title }}</h5>
        @if($project->image)
        <p class="card-text"><strong>Immagine: </strong>Si</p>
        @else
        <p class="card-text"><strong>Immagine: </strong>No</p>
        @endif
        <p class="card-text"><strong>ID: </strong>{{ $project->id }}</p>
        <p class="card-text"><strong>Tipo: </strong>{!! $project->getBadge() !!}</p>
        <p class="card-text"><strong>Tecnologie utilizzate: </strong>{!! $project->getTechBadges() !!}</p>
        <p class="card-text"><strong>Descrizione: </strong>{{ $project->description }}</p>
        <p class="card-text"><strong>Slug: </strong>{{ $project->slug }}</p>
        <p class="card-text"><strong>Url: </strong>{{ $project->url }}</p>
        <p class="card-text"><strong>Pubblicato: </strong>
          <form action="{{route('admin.projects.publish', $project)}}" method="POST"
          id="form-published-{{$project->id}}">
            @method('PATCH')
            @csrf
            <div class="d-flex justify-content-center mb-4 form-check form-switch">
              <input 
              class="form-check-input checkbox-published"
              type="checkbox"
              role="switch"
              name="published"
              data-id="{{$project->id}}"
              @if ($project->published) checked @endif
              >
              <label class="form-check-label" for="published"></label>
            </div>
          </form>
        </p>
        <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">Dettagli</a>
        <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">Modifica</a>
        @include('partials._modal')
      </div>
    </div>
    @endforeach
    {{$projects->links('pagination::bootstrap-5')}}
  </section>
@endsection

@section('scripts')
<script type="text/javascript">
  const checkboxesPublished = document.getElementsByClassName('checkbox-published');
  for(checkbox of checkboxesPublished) {
    checkbox.addEventListener('click', function() {
      const projectId = this.getAttribute('data-id');
      const form = document.getElementById('form-published-' + projectId);
      form.submit();
    })
  }
</script>
@endsection