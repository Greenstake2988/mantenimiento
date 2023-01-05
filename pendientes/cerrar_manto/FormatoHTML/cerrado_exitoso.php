<?php
session_start();
if($_SESSION['area']=='1' and $_SESSION['sol']=='cc' )  
    { 
    //redirijo a la raiz del sitio
    header('refresh: 1; url=../../../menuadmin.php'); //redirijo esperando 1 segundos
    exit();
    }
if($_SESSION['area']=='10' and $_SESSION['sol']=='rms' )
    {
    //redirijo a la raiz del sitio
    header('refresh: 1; url=../../../menuadmin.php'); //redirijo esperando 1 segundos
    exit();
    }
header('refresh: 1; url=../../../solicitar/form_solicita_manto.php'); //redirijo al panel de solicitudes
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

