$(".progress_sm").each(function () {
    $(this).click(function (e) {

        $("#graph_line").children().remove();
        $('#panel-line-chart').css('display', 'block');
        let attributeId = $(this).children().attr('data-attributeId');
        let playerId = $(this).children().attr('data-playerId');
        let csrf = $(this).children().attr('data-csrf');
        recogerValores(attributeId, playerId, csrf);

    });
    $(this).hover(function () {
        $(this).css("cursor", "pointer"); //Cambia el cursor al hover
    });
});


//Realiza una petición ajax que devuelve los valores del atributo y el jugador enviados
function recogerValores(attributeId, playerId, csrf) {
    var formData = new FormData();
    formData.append('attributeId', attributeId);
    formData.append('playerId', playerId)
    formData.append('_token', csrf);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'post',
        url: '/players/getPlayerValuesOfAttribute',
        data: formData,
        processData: false,
        contentType: false,
        success: function(resp) {
            pintarGrafica(resp);
            //console.log(resp);

        },
        /* error: function() {
             Swal.fire({
                 type: 'error',
                 title: 'Oops...',
                 text: 'Something went wrong!'
             })
         }*/
    })
}

function pintarGrafica(data) {
    console.log(data);
    Morris.Line({
        element: "graph_line",
        xkey: "date",
        ykeys: ["value"],
        labels: ["Value"],
        hideHover: "auto",
        lineColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
        data: data.values,
        resize: true,
    });

    $('#attributeName').html(data.attribute.name);
    //$('#attributeTypeName').html('Aa');
}


$(document).ready(function () {
   $('#panel-line-chart').css('display', 'none');
});
