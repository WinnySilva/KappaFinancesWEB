/**
 * Created by Fabio Abib on 02/07/2016.
 */

//Pegar o nome da cidade conforme o estado.

$(document).ready( function() {

    $( "#loading" ).show();

    $("#idestado").change(function(){

        $.ajax({
                "type": "GET",
                "url" : "../Back/Cidades.php",
                data: {title:$(this).val()} ,
                "success" : function(data){

                    $("#resultado").html(data);


            }
        });
        return false;

    });
    $( document ).ajaxStart(function() {
        $( "#loading" ).show();
    }).ajaxStop(function() {
        $( "#loading" ).hide();
    });
})

//Esconder estados e cidades.

$(document).ready(function(){
    $('#idpais').on('change', function() {
        if ( this.value == 'Brasil')
        {
            $("#divEC").show();
        }
        else
        {
            $("#divEC").hide();
        }

    });
});