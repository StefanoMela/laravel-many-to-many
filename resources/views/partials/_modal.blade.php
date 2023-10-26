<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$project->id}}">Elimina</button>

<div class="modal fade" id="delete-modal-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina progetto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sicuro di voler eliminare il progetto "{{$project->title}}"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="my-1">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">Elimina</button>
        </form>
      </div>
    </div>
  </div>
</div>