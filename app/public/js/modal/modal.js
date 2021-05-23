//Muestra modal de editar
$(".edit-modal").click(function (e) {
    let clase = $(this).attr("data-class");
    let attributeId = $(this).attr("data-attrId");
    let csrf = $(this).attr("data-csrf");

    var formData = new FormData();
    formData.append("attributeId", attributeId);
    formData.append("clase", clase);
    formData.append("_token", csrf);
    //alert(attrId);
    $.ajax({
        type: "post",
        url: "/table/getDataForEditModal",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $("#divModal").html(response);
            $("#edit").modal("show");
        },
    });
});

//Muestra modal de editar
$("#create-modal").click(function () {
    let clase = $(this).attr("data-class");
    let csrf = $(this).attr("data-csrf");

    var formData = new FormData();
    formData.append("clase", clase);
    formData.append("_token", csrf);
    //alert(attrId);
    $.ajax({
        type: "post",
        url: "/table/getDataForCreateModal",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $("#divModal").html(response);
            $("#create").modal("show");
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
                clase = "App\\Models\\Player";
            } else if (result.isDenied) {
                clase = "App\\Models\\Coach";
            }
            var formData = new FormData();
            formData.append("clase", clase);
            formData.append("_token", csrf);
            $.ajax({
                type: "post",
                url: "/table/getDataForCreateModal",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $("#divModal").html(response);
                    $("#create").modal("show");
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
        url: "/team/getViewForPracticesModal",
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
