$(document).ready(function () {

        //$('#panel-line-chart').show();
        let csrf = $('.progress-bar').attr('data-csrf');
        let playerId = 1;
        console.log(csrf);

            recogerValores(playerId, csrf)
});

//Realiza una petición ajax que devuelve los valores del atributo y el jugador enviados
function recogerValores(playerId, csrf) {
    var formData = new FormData();
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
            console.log(resp);
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

/*function pintarGrafica(data) {
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
}*/


function pintarGrafica(data) {
    console.log(data.attributes);

    var ctx = document.getElementById("lineChart");
    let datasetValue = [];
    let i = 0;
    data.attributes.forEach(element => {
        console.log(element.name);
        datasetValue[i] = {
            label: element.name,
        }
        i ++;
    });



    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: data.attributes.map(item => item.date),
        datasets: [
        {
          label: datasetValue,
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: [31, 74, 6, 39, 20, 85, 7]
        },
    ]
      },
    });

    //$('#attributeName').html(data.attribute.name);
    //$('#attributeTypeName').html('Aa');
}


$(document).ready(function () {

});



