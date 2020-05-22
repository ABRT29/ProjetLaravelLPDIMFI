@foreach ($list as $lists)
<div class="card">
    <div class="card-body">
      <h2 class="card-title">{{ $lists->title }}</h2>
      <p class="card-text">{{ $lists->content }}</p>
      <p class="card-subtitle mb-2 text-muted">Auteur ID {{ $lists->user_id }}  | Post #{{ $lists->id }}</p>
      <a class="card-link" href="edit/{{ $lists->id }}">Editer</a>
      <a class="card-link" href="delete/{{ $lists->id }}">Supprimer</a>

    </div>
  </div>
  <hr>
  @endforeach



