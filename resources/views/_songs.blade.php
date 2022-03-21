<div class="songs__list">
<h3>{{$type}}</h3>

<ul>
    @foreach($songs as $song)
    

    <div>
        <img src="/img/image2.png"/>
        <a href="#" class="song" data-file="{{$song->url}}">{{$song['title']}}</a>
        
        Posté par <a href="/users/{{$song->user->id}}"> {{$song->user->name}}</a>
</div>
    @endforeach
</ul>
</div>