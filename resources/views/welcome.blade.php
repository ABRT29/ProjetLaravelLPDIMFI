@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach ($list as $lists)
                    <div class="card" data-postid="{{ $lists->id }}">
                        <div class="card-body">
                        <h2 class="card-title">{{ $lists->title }}</h2>
                        <p class="card-text">{{ $lists->content }}</p>
                        <p>{{$lists->user->name}}</p>
                        <hr>
                        <p class="card-text">Auteur ID {{ $lists->user_id }}</p>
                        <p class="card-text">Post ID {{ $lists->id }}</p>
                        </div>
                        <div class="interaction">
                            <a class="like" href="#" >{{ Auth::user()->likes()->where('post_id', $lists->id)->first() ? Auth::user()->likes()->where('post_id', $lists->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                            <a class="like"  href="#" >{{ Auth::user()->likes()->where('post_id', $lists->id)->first() ? Auth::user()->likes()->where('post_id', $lists->id)->first()->like == 0 ? 'You dont like this post' : 'Dislike' : 'Dislike'  }}</a>
                        </div>
                    </div>

                    <hr>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/like.js') }}"></script>

    <script type="text/javascript">
      var token = "{{ Session::token() }}";
      var urlLike = "{{ route('like') }}";
    </script>
