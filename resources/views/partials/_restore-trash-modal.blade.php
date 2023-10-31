<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#restore-modal-{{$project->id}}">Recupera Progetto</button>

<div class="modal fade" id="restore-modal-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Recupera progetto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sicuro di voler recuperare il progetto "{{$project->title}}"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{route('admin.projects.trash.restore', $project)}}" method="POST" class="my-1">
          @csrf
          @method('PATCH')
          <button class="btn btn-success">Recupera</button>
        </form>
      </div>
    </div>
  </div>
</div>