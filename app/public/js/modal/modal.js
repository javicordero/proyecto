//Muestra modal de editar
$("#datatable-responsive tbody").on("click", ".edit-modal", function () {
    let clase = $(this).attr("data-class");
    let attributeId = $(this).attr("data-attrId");
    let csrf = $(this).attr("data-csrf");
    let tableName = $(this).attr("data-tableName");
    let url = "/admin/" + tableName + "/edit";

    console.log(clase);
    var formData = new FormData();
    formData.append("attributeId", attributeId);
    formData.append("clase", clase);
    formData.append("_token", csrf);
    //alert(attrId);
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

//Muestra modal de crear
$("#create-modal").click(function () {
    let clase = $(this).attr("data-class");
    let csrf = $(this).attr("data-csrf");
    let tableName = $(this).attr("data-tableName");
    let url = "/admin/" + tableName + "/create";

    var formData = new FormData();
    formData.append("clase", clase);
    formData.append("_token", csrf);

    if (tableName == "games") {
        let teamId = $(this).attr("data-teamId");
        formData.append("teamId", teamId);
    }

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

//Modal practices
$("#btn-modal-practices").click(function () {
    let teamId = $(this).attr("data-teamId");
    let csrf = $(this).attr("data-csrf");

    var formData = new FormData();
    formData.append("teamId", teamId);
    formData.append("_token", csrf);
    //alert(attrId);
    $.ajax({
        type: "post",
        url: "/admin/teams/getViewForPracticesModal",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#modal").modal("show");
        },
    });
});

//Modal mover jugador de equipo
$(".move-player-modal").click(function () {
    let csrf = $(this).attr("data-csrf");
    let personId = $(this).attr("data-personId");

    var formData = new FormData();
    formData.append("personId", personId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/admin/teams/getPosibleTeamsForPlayer",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $("#divModal").html(response);
            $("#posible-teams-modal").modal("show");
        },
    });
});

//COnvocatoria modal
$("#convocatoria-modal").click(function () {
    let csrf = $(this).attr("data-csrf");
    let teamId = $(this).attr("data-teamId");
    var formData = new FormData();
    formData.append("teamId", teamId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/admin/teams/getAllListablePlayers",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#modal").modal("show");
        },
    });
});

//Jugadores sin equipo modal
$("#freePlayers-modal").click(function () {
    let csrf = $(this).attr("data-csrf");
    let teamId = $(this).attr("data-teamId");
    var formData = new FormData();
    formData.append("teamId", teamId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/admin/teams/freePlayersForTeam",
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

//Evaluar jugador modal
$("#attributes-modal").click(function () {
    let csrf = $(this).attr("data-csrf");
    let playerId = $(this).attr("data-playerId");
    var formData = new FormData();
    formData.append("playerId", playerId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/admin/players/evaluate",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#modal").modal("show");
        },
    });
});

//Modal video
$("#datatable-responsive tbody").on("click", ".game-video-modal", function () {
    let attrId = $(this).attr("data-attrId");
    let csrf = $(this).attr("data-csrf");
    let url = "/admin/results/addVideo";

    var formData = new FormData();
    formData.append("attrId", attrId);
    formData.append("_token", csrf);

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
