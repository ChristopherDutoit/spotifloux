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
<form method="post" action="/chanson/store" enctype="multipart/form-data">
    @csrf
    <input type="text" required placeholder="Title" name="title" value="{{old('title')}}"/>
    <br>
    <input type="file" required  name="song"/>
    <br>
    <label for="thumbnail">Ajouter une miniature</label>
    <input type="file" required  name="thumbnail"/>
    <br>
    <input type="number" required min="0" max="10" placeholder='notes' value="{{old('note')}}" name="note"/>
    <br>
    <input type="submit" />
</form>
@endsection