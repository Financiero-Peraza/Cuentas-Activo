<?php

class repositorio_expediente_juridico {

    public static function insertar_expediente_juridico($conexion, $expediente) {
        $expediente_insertado = false;
        //$expediente = new expediente_juridico();

        if (isset($conexion)) {
            try {
                $id_prestamo = $expediente->getId_prestamo();
                $id_persona = $expediente->getId_persona_juridica();

                $sql = 'INSERT INTO expediente_juridico (id_prestamo,id_persona_juridica)'
                        . ' values ( :id_prestamo, :persona_juridica)';
                ///estos son alias para que PDO pueda trabajar 
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_prestamo', $id_prestamo, PDO::PARAM_STR);
                $sentencia->bindParam(':persona_juridica', $id_persona, PDO::PARAM_STR);

                $expediente_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                echo '<script>swal("No se puedo realizar el registro", "Revise los datos ingresados  ", "warning");</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        }
        return $expediente_insertado;
    }
    
    public static function  calculo_ratios ($balance, $estado){
    
        $ratio = new ratios();
        
        
        $ratio->setLiquidez_corriente($balance->getTotal_activo_corriente() / $balance->getTotal_pasivo_corriente() );
        $ratio->setRazon_rapida( ($balance->getTotal_activo_corriente() -$balance->getInventarios()) / $balance->getTotal_pasivo_corriente() );
        $ratio->setRotacion_inventarios($estado->getCosto_venta()/$balance->getInventarios());
        $ratio->setPeriodo_cobro(365 / ($estado->getIngreso_venta()/ $balance->getCuenta_por_cobrar()));
        $ratio->setIndice_endeudamiento(  ($balance->getTotal_pasivo_corriente()+$balance->getDeuda_largop())/ $balance->getTotal_pasivo_patrimonio()   ) ;
        $ratio->setCargo_interes_fijo($estado->getUtilidad_operativa() / $estado->getGasto_interes() );
        $ratio->setMargen_utilidad_bruta($estado->getUtilidad_bruta() / $estado->getIngreso_venta() );
//        $ratio->setMargen_utilidad_neta($estado->getUtilidad_neta() / $balance->getTotal_activo() );
          $ratio->setMargen_utilidad_neta($estado->getUtilidad_neta() / $estado->getIngreso_venta() );
        
        
        
        $ratio->setRendimiento_activo($estado->getUtilidad_neta() / $balance->getTotal_activo() );
        $ratio->setRendimiento_patrimonio( $estado->getUtilidad_neta() / ($balance->getAccioneC() + $balance->getGanancias_retenidas()));
     
        return $ratio;
    }

}

?>