<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repositorio_prestamo
 *
 * @author Miranda
 */
class repositorio_prestamo {
   public static function insertar_prestamo($conexion, $prestamo) {
        $prestamo_insertado = false;
        //$prestamo = new presamo();
        if (isset($conexion)) {
            try {

                $dui = $prestamo->getId_asesor();
                $nit = $prestamo->getId_plan();
                $nombre = $prestamo->getPrestamo_original();
                


                $sql = 'INSERT INTO prestamo (id_plan,  id_asesor, prestamo_original, estado ) '
                        . ' values (:nit, :dui, :nombre, :nit)';
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);
                
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':dui', $dui, PDO::PARAM_STR);
                $sentencia->bindParam(':nit', $nit, PDO::PARAM_STR);
                // $sentencia->bindParam(':nit1', $nit1, PDO::PARAM_STR);


                $prestamo_insertado = $sentencia->execute();
//             $accion = 'Se registro al siguiente prestamo de mantenimiento: ' . $nombre . ", con direccion ". $direccion . ", telefono ". $telefono.", y correo ".$correo ;
//              self::insertar_bitacora($conexion, $accion);
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $prestamo_insertado;
    }
    
   public static function obtenerU_ultimo_prestamo($conexion) {
        $codigo = "";
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_prestamo from prestamo order by id_prestamo desc limit 1";
                $resultado = $conexion->query($sql);
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
            foreach ($resultado as $fila) {
                $codigo = $fila[0];
            }
        }
        return $codigo;
    }
}
?>