@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Administration</h1>
   <nav>
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="users/create">Créer un compte</a>
        </li>
    </ul>
   </nav>
</div>

<div class="container">
    @foreach ($user as $users)
    <div class="card">
    <div class="card-body">
      <h2 class="card-title">{{ $users->name}}</h2>
      <p class="card-text">{{ $users->email }}</p>
      <hr>
      <a class="card-link" href="users/{{ $users->id }}/edit">Editer</a>
      <a class="card-link" href="users/{{ $users->id }}/delete">Supprimer</a>
    </div>
    </div>
    <hr>
@endforeach
</div>


@endsection
