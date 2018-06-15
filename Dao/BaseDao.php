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
interface BaseDao {

    public static function agregar($dto);
    
    public static function eliminar($key);
    
    public static  function modificar($dto);
    
    public static function listarTodos();
}
