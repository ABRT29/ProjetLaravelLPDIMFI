@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="{{ route('editPost', ['id' => $post->id]) }}" method="POST">
                @csrf

                <h3>Edit content</h3>
                <hr>
                <div class="form-group">
                    <label for="exampleFormControlText1">Title</label>
                    <input class="form-control" id="exampleFormControlText1" name="title" type="text" value="{{ $post->title}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" >{{ $post->content}}</textarea>
                </div>

                <input type="submit" value="envoyer">
            </form>

        </div>
    </div>
</div>
@endsection
