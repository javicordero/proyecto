
//Jugadores sin equipo modal
$(".messageNotOpen").click(function () {

    $(this).css('color', '#979797');
    $(this).css('font-weight', 'normal');

    let csrf = $(this).attr("data-csrf");
    let messageId = $(this).attr("data-messageId");
    var formData = new FormData();
    formData.append("messageId", messageId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/messages/show",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $("#messageOpen").html(response);
        },
    });
});



//Modal mover jugador de equipo
$("#newMessage-modal").click(function() {

    $.ajax({
        type: "get",
        url: "/messages/create",
        data: "",
        processData: false,
        contentType: false,
        success: function(response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#modal").modal("show");
        },
    });
});
