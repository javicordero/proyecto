//Cambia el color de las barras de los atributos en funcion del valor
$('.progress-bar').each(function() {
    if ($(this).attr('data-transitiongoal') <= 30) {
        $(this).addClass('bg-red');
    } else {
        if ($(this).attr('data-transitiongoal') <= 60) {
            $(this).addClass('bg-blue');
        } else {
            $(this).addClass('bg-green');
        }
    }
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
            pintarGrafica(resp);

        },
    })
}


function pintarGrafica(data) {
    console.log(data);

    let i = 0;
    let datasetValue = [];
    let j = 0;
    let valores = [];
    let dates = [];

    //Genera un array con las fechas
    while(data[0][j] != undefined){
        dates.push(data[0][j].date);
        j++;
    }


    //Genera el dataset para cada atributo
    while(data[i] != undefined){
        let name = data[i].name
        valores = [];
        j = 0;
        while(data[i][j] != undefined){
            valores.push(data[i][j].value);
            j++;
        }
        console.log(valores);
        i++;
        var color = random_rgba();
        datasetValue[i] = {
            label: name,
            data: valores,
            backgroundColor: color,
            borderColor: color,
            pointBorderColor: color,
            pointBackgroundColor: color,
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointBorderWidth: 1,
            tension: 0.25,
            hidden: true,
        }
    }

    datasetValue.shift()
    var ctx = document.getElementById("lineChart");

    var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: dates,
        datasets: datasetValue
      },
    });


}




//Genera un color aleatorio
function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ')';
}

