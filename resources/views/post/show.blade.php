@foreach ($list as $lists)
<div class="card">
    <div class="card-body">
      <h2 class="card-title">{{ $lists->title }}</h2>
      <p class="card-text">{{ $lists->content }}</p>
      <hr>
      <p class="card-text">Auteur ID {{ $lists->user_id }}</p>
      <p class="card-text">Post ID {{ $lists->id }}</p>
      <a class="card-link" href="edit/{{ $lists->id }}">Editer</a>
      <a class="card-link" href="delete/{{ $lists->id }}">Supprimer</a>

    </div>
  </div>
  <hr>
  @endforeach



