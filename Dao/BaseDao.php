<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseDao
 *
 * @author Daniel GS
 */
abstract class BaseDao {

    static function agregar($dto);
    
    static function eliminar($key);
    
    static function modificar($dto);
    
}
