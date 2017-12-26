<?php
class persona_juridica {
 private $id_persona_juridica;
 private $id_nombre;
 private $id_categoria;
 
 function __construct() {
     
 }
 function getId_persona_juridica() {
     return $this->id_persona_juridica;
 }

 function getId_nombre() {
     return $this->id_nombre;
 }

 function getId_categoria() {
     return $this->id_categoria;
 }

 function setId_persona_juridica($id_persona_juridica) {
     $this->id_persona_juridica = $id_persona_juridica;
 }

 function setId_nombre($id_nombre) {
     $this->id_nombre = $id_nombre;
 }

 function setId_categoria($id_categoria) {
     $this->id_categoria = $id_categoria;
 }


}
