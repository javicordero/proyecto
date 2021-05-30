//Muestra modal de editar
$('#datatable-responsive tbody').on('click', '.edit-modal', function () {
    let clase = $(this).attr("data-class");
    let attributeId = $(this).attr("data-attrId");
    let csrf = $(this).attr("data-csrf");
    let tableName = $(this).attr("data-tableName");
    let url = tableName + '/edit';

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
    let url = tableName + '/create';

    var formData = new FormData();
    formData.append("clase", clase);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: url,
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



//Muestra modal para elegir que tipo de persona quiere crear
$("#create-person").click(function (e) {
    let clase;
    let csrf = $(this).attr("data-csrf");

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-primary",
            denyButton: "btn btn-warning",
        },
        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: "¿Qué desea crear?",
            text: "Selecciona el tipo de persona",
            icon: "question",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Jugador`,
            denyButtonText: `Entrenador`,
        })
        .then((result) => {
            if (result.isConfirmed) {
                tableName = "players"
            } else if (result.isDenied) {
                tableName = "coaches"
            }
            let url = tableName + "/create";
            var formData = new FormData();
            formData.append("_token", csrf);
            $.ajax({
                type: "post",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                  //  console.log(response);
                    $("#divModal").html(response);
                    $("#modal").modal("show");
                },
            });
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
        url: "/teams/getViewForPracticesModal",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#practices-modal").modal("show");
        },
    });
});


//Modal mover jugador de equipo
$('#datatable-responsive tbody').on('click', '.move-player-modal ', function () {
    let csrf = $(this).attr("data-csrf");
    let personId = $(this).attr("data-personId");

    var formData = new FormData();
    formData.append("personId", personId);
    formData.append("_token", csrf);
    $.ajax({
        type: "post",
        url: "/teams/getPosibleTeamsForPlayer",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
           // console.log(response);
            $("#divModal").html(response);
            $("#posible-teams-modal").modal("show");
        },
    });
});
