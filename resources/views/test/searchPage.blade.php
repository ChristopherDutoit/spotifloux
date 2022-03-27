@extends('layout')
@section('content')
<div class="searchform">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search a song or an artist" />
      <p id="result"></p>
    </div>
    <script src="/js/jquery.js"></script>
<script>
    $(document).ready(function(){

        search_music()
       function search_music(query ='')
       {
           console.log('test')
           $.ajax({
              url:"{{route('test.searchAction')}}",
              method : 'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                $('#result').html(data.table_data);   
              }
           })
       }

      $(document).on('keyup', '#search', function(){
          var query = $(this).val()
          search_music(query);
      }) 

    });
</script>
@endsection