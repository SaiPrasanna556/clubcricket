function GetPlayerStats(player_id){
    $.ajax({
        type:'get',
        url:'/team/player/stats/'+ player_id,
        success:function(data){
            $(".stats").html(data);
        },
        error:function(data){
            alert(data.responseText);
        }
    });
}

function loadDefaultImage(){
   // $("#player_image").attr('src','../images/players/no_player.png');

}