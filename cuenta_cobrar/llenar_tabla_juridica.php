<?php
include_once '../app/Conexion.php';
include_once '../modelos/persona_juridica.php';
include_once '../repositorios/repositorio_juridico.php';
Conexion::abrir_conexion();

$listado = repositorio_juridico::obtener_persona_juridca(Conexion::obtener_conexion(), $_POST['libro']);
 

foreach ($listado as $fila) {
    ?>
<script type="text/javascript">
     var codigo="<?php echo $fila['id']; ?>";    
   var pass=doSearch(codigo);
   if(pass){
        
        var nombre="<?php echo  $fila->getId_nombre(); ?>";
        var numero="<?php echo  $fila->getNumero(); ?>" ;
        var dui="<?php echo  $fila->getDui(); ?>" ;
        var nit="<?php echo  $fila->getNit(); ?>" ;
        
        var linea="";
        linea=linea.concat(
            "<tr>",
            '<td><input type="button" class="borrar_personatabla_cliente_cpersonal btn-sm btn-danger" value="-"/>&nbsp;&nbsp; <input type="hidden" id="codCliente_cpersonal" name="codCliente_cpersonal" value="'+codigo+'"> '+codigo+"</td>",
            "<td>"+nombre+"</td>",
            "<td>"+numero+"</td>",
            "<td>"+dui+"</td>",
            "<td>"+nit+"</td>",
            "</tr>"
            );
    $("#tabla_cliente_cpersonal tbody").empty()//elino el anterior
    $("table#tabla_cliente_cpersonal tbody").append(linea);
   
    }else{
         swal("Importane!",  codigo+" ya fue ingresado", "warning")
     
    }
    
    
    //para no ingresar los mismos activo a la tabla
    function doSearch(codigo)
		{
                        var pso="true";
			var tableReg = document.getElementById('tabla_cliente_cpersonal');
			var searchText = codigo;
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
 
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
				if(found)
				{
					pso= false;//tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					//tableReg.rows[i].style.display = 'none';
                                       pso=  true;
				}
			}
		return pso;}
     
    </script>


    <?php
}
?>
    <script>//para no ingrasar los mismos activoa a la tabla de presatamo
        
    </script>