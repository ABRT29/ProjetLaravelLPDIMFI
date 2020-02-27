@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('createPost') }}" method="POST">
                @csrf

                <h3>Add to catalog</h3>
                <hr>
                <div class="form-group">
                    <label for="exampleFormControlText1">Title</label>
                    <input class="form-control" id="exampleFormControlText1" name="title" type="text" placeholder="Title of movie or series..">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                </div>

                <input type="submit" value="envoyer">
            </form>
        </div>
    </div>
</div>
@endsection
