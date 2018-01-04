<?php
include_once '../app/Conexion.php';
include_once '../modelos/persona_natural.php';
include_once '../repositorios/repositorio_expediente_natural.php';
Conexion::abrir_conexion();

$listado = repositorio_expediente_natural::obtener_persona_natural_abono(Conexion::obtener_conexion(), $_POST['libro']);

//$numero=$_POST['numero'];

foreach ($listado as $fila) {
    ?>
    <script type="text/javascript">
        //alert("codigo"); 
        document.getElementById('nprestamo_fat').innerHTML = "NO PRESTAMO: <?php echo $fila['idp'] ?>";
        document.getElementById('nombre_fat').innerHTML = "NOMBRE: <?php echo $fila['nombre'] ?>";
        document.getElementById('fecha_pres_fat').innerHTML = "FECHA DE APLICACION: <?php echo date("d-m-Y"); ?>";
        document.getElementById('nit_fat').innerHTML = "NIT: <?php echo $fila['nit'] ?>";
        document.getElementById('dui_fat').innerHTML = "DUI: <?php echo $fila['dui'] ?>";
        document.getElementById('fecha_pago_fat').innerHTML = "FECHA: <?php echo date("d-m-Y"); ?>";
        document.getElementById('fecha_fin_fat').innerHTML = "FECHA VENCIMIENTO: <?php echo date("d-m-Y"); ?>";
        document.getElementById('fecha_ultimo_fat').innerHTML = "FECHA ULTIMO PAGO: <?php echo date("d-m-Y"); ?>";
        document.getElementById('monto_fat').innerHTML = "MONT: $ <?php echo $fila['monto'] ?>";
        
        document.getElementById('tasa_fat').innerHTML = "TASA NOMINAL:  <?php echo $fila['tasa'] ?>%";
        document.getElementById('cap_fat').innerHTML = "$ <?php echo "calcular cap" ?>";
        document.getElementById('saldo_ant_fat').innerHTML = "SALDO ANTERIOR: $ <?php echo $fila['sact'] ?>";
        document.getElementById('saldo_act_fat').innerHTML = "SALDO ACTUAL: $ <?php echo "CAL SA" ?>";
        document.getElementById('mora_fat').innerHTML = "$ <?php echo $fila['mora'] ?>";
        document.getElementById('nom_caj_fat').innerHTML = "<?php echo $fila['nombreuser'] ?>";
        document.getElementById('suma_capital_fat').innerHTML = "$ <?php echo "calcular suma"; ?>";
        document.getElementById('int_mora_fat').innerHTML = "$ <?php echo "cal suma "; ?>";
        document.getElementById('total_fat').innerHTML = "$ <?php echo "cal toal" ?>";
        document.getElementById('int_fat').innerHTML = "$ <?php echo $fila['intacu'] ?>";
        document.getElementById('id_cajero_fat').innerHTML = "CAJERO NO:  <?php echo $fila['idu'] ?>";
        
        var tasa_personaa = <?php echo $fila['tasa'] ?> / 100 / 12;
        var monto_personaa = "<?php echo $fila['monto'] ?>";
        var meses_personaa = "<?php echo $fila['tiempo'] ?>";
        var cuota_personaa = 0;

        cuota_personaa = monto_personaa * ((Math.pow(1 + tasa_personaa, meses_personaa) * tasa_personaa) / (Math.pow(1 + tasa_personaa, meses_personaa) - 1));
        cuota_personaa = cuota_personaa.toFixed(2);
        document.getElementById('cuota_fat').innerHTML = "CUOTA: $ "+cuota_personaa;
        var codigo = "<?php echo $fila['idper']; ?>";
        var pass = doSearch(codigo);
        if (pass) {

            var nombre = "<?php echo $fila['nombre']; ?>";
            var dui = "<?php echo $fila['dui']; ?>";
            var nit = "<?php echo $fila['nit']; ?>";
            var dir = "<?php echo $fila['monto']; ?>";
            var tel = "<?php echo $fila['sact']; ?>";
            var linea = "";
            linea = linea.concat(
                    "<tr>",
                    '<td><input type="button" class="borrar_personatabla_cliente_abono btn-sm btn-danger" value="-"/>&nbsp;&nbsp; <input type="hidden" id="codCliente_abono" name="codCliente_abono" value="' + codigo + '"> ' + codigo + "</td>",
                    "<td>" + nombre + "</td>",
                    "<td>" + dui + "</td>",
                    "<td>" + nit + "</td>",
                    "<td>" + tel + "</td>",
                    "<td>" + dir + "</td>",
                    "</tr>"
                    );
            $("#tabla_cliente_abono tbody").empty()//elimino el anterior
            $("table#tabla_cliente_abono tbody").append(linea);

        } else {
            swal("Importane!", codigo + " ya fue ingresado", "warning")

        }


        //para no ingresar los mismos activo a la tabla
        function doSearch(codigo)
        {
            var pso = "true";
            var tableReg = document.getElementById('tabla_cliente_abono');
            var searchText = codigo;
            var cellsOfRow = "";
            var found = false;
            var compareWith = "";


            // Recorremos todas las filas con contenido de la tabla
            for (var i = 1; i < tableReg.rows.length; i++)
            {
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;
                // Recorremos todas las celdas
                for (var j = 0; j < cellsOfRow.length && !found; j++)
                {

                    compareWith = cellsOfRow[j].innerHTML;

                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                    {
                        found = true;
                    }
                }
                if (found)
                {
                    pso = false;//tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    //tableReg.rows[i].style.display = 'none';
                    pso = true;
                }
            }
            return pso;
        }

    </script>


    <?php
}
?>
<script>//para no ingrasar los mismos activoa a la tabla de presatamo

</script>