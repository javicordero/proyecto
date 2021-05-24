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
            //console.log(resp);
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
    console.log(data);

    let i = 0;
    let datasetValue = [];
    let j = 0;
    let valores = [];
    let dates = [];

    while(data[0][j] != undefined){
        dates.push(data[0][j].date);
        j++;
    }
   

    while(data[i] != undefined){
       // console.log(data[i][0].value);
        let name = data[i].name
        valores = [];
        j = 0;
        while(data[i][j] != undefined){
            valores.push(data[i][j].value);
            j++;
        }
        console.log(valores);
        i++;
        
        datasetValue[i] = {
            label: name,
            data: valores,
            backgroundColor: "rgba(38, 185, 154, 0.31)",
            borderColor: "rgba(38, 185, 154, 0.7)",
            pointBorderColor: "rgba(38, 185, 154, 0.7)",
            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
        }
    }
    
    datasetValue.shift()
   // console.log(datasetValue);

    var ctx = document.getElementById("lineChart");

    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: dates,
        datasets: datasetValue
      },
    });

    
}





