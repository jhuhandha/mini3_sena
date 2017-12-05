function agregar(){

    $("#tblColores").append(
        `<tr>
            <td><input type="text" name="color[]" class="form-control"></td>
        </tr>`
    );

}

function colores(id_persona){

    $.ajax({
        dataType:'json',
        type:'get',
        url: uri+'/persona/obtenercolores/'+id_persona
    }).done(function(respuesta){

        $("#list_colores").empty();

        $.each(respuesta, function(i, e){
            $("#list_colores").append('<li style="background:'+e.nombre+'" class="list-group-item">'+e.nombre+'</li>');
        })

        $("#mdlColores").modal();

    })

}