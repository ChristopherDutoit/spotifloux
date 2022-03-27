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
<form method="post" action="/chanson/store" enctype="multipart/form-data" 
class="formulaire">
    @csrf
    <h1 class="nouvelle">Nouvelle Chanson</h1>
    <input type="text" required placeholder="Title" name="title" value="{{old('title')}}"
    class="titre"/>
    <br>
    <h2 class="fichier">Fichier</h2>
    <input type="file" required  name="song" class="file"/>
    <br>
    <label for="thumbnail" class="miniature">Ajouter une miniature</label><br>
    <input type="file"  class="ajout-miniature" required  name="thumbnail"/>
    <br>
    <h2 class="note1">Note</h2>
    <input type="number" class="note" required min="0" max="10" placeholder='notes' value="{{old('note')}}" name="note"/>
    <br>
    <input type="submit" class="submit"/>
</form>
@endsection