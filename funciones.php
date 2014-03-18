<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Constantes


define('MSG_ERR', "Error...");
define('MSG_ERR_TITULO', "Error Titulo...");
define('MSG_ERR_URL', "Error URL...");

// Funciones de validación

/**
 * 
 * @param STRING $valor
 * @return a cadena "limpa" de caracteres extraños
 */
function limpiar($valor) {
    return strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1"))); 
}

/**
 * 
 * @param STRING $valor
 * @return TRUE se a cadea, unha vez limpa, está entre (0,50] caracteres
 */
function validarTitulo($valor) {
    $valor = limpiar($valor);
    if (strlen($valor)>0 && strlen($valor)<=50){
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * 
 * @param URL $valor
 * @return TRUE se é unha URL válida
 */
function validarURL($valor) {
    return (filter_var($valor, FILTER_VALIDATE_URL ));
}