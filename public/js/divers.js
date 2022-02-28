$(document).ready(function(){
    $('a.song').click(function(e){
        e.preventDefault()
        let url = $(this).attr("data-file")
        let audio = $("#lecteur")
        audio[0].src = url
        audio[0].onplay()
    }
    )
})