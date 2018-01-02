
//-----------------------  FUNCIONES PARA CREDITO PERSONAL --------------------------------﻿
function llenar_tabla_cliente(valor) {
    alert("paso8");
    var depto = valor;
//var numero=valor.id.substr(7)
//alert(valor.id);
    if (depto != "") {//alert("paso"+depto);
        $.post("../cuenta_cobrar/llenar_tabla_cliente.php", {libro: depto}, function (mensaje) {
            $('#lista_personas_naturales').html(mensaje).fadeIn();

        });

    }

}



//-----------------------  FIN FUNCIONES PARA CREDITO PERSONAL --------------------------------﻿