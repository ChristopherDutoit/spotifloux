@extends("layout")
@section("content")

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="/playlist/store" enctype="multipart/form-data" 
class="formulaire">
    @csrf
    <h1 class="nouvelle">Nouvelle Playlist</h1>
    <input type="text" required placeholder="Nom de la playlist" name="title" value="{{old('title')}}"
    class="titre"/>
    <input type="submit" class="submit"/>
</form>
@endsection