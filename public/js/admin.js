function UpdateWinner(match_id){
    $.ajax({
        type:"get",
        url:'/admin/fixtures/updateWinnerForm/' + match_id,
        success:function(data){            
            $(".winner_body").html(data);
            $("#winnerModal").modal('show');
        },
        error:function(data){}
    });
}

