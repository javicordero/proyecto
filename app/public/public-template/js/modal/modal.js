//Muestra modal de crear
$(".card__players").click(function () {
    let csrf = $(this).attr("data-csrf");
    let playerId = $(this).attr("data-playerId");

    let url =  "/players/getModalCard"

    var formData = new FormData();
    formData.append("_token", csrf);
    formData.append("playerId", playerId);

    $.ajax({
        type: "post",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $("#divModal").html(response);
            $("#modal").modal("show");
        },
    });
});

