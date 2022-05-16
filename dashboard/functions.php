<?php

//================= shortcode da utilizzare ======================

$sito = $_SERVER['HTTP_HOST'];

//================= Messaggi del form ============================

$compila_form = 'Si prega di compilare tutti i campi del modulo.';
$errore_modulo = 'Errore nella compilazione del modulo';

//================= shortcode Messaggi Sito ======================

$messaggio_benvenuto = "Benvenuto nel sito ${sito}"; 

//================= shortcode Info Sito Web ======================
$company = 'RandomCompany';
$anno = date('Y');
$email_super_admin = 'hack@lspritecoder.com';
$licenza_start = '';
$author = 'SpriteCoder';

//================= shortcode da utilizzare ======================


//================= Functions to filter user inputs ==============

function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}

// =====================FUNZIONI ====================================
?>