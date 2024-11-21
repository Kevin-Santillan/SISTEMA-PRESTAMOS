<?php

    define('BASE_URL', str_replace("\config", "", realpath(dirname(__FILE__))));
    define('RUTA_DEFECTO', basename(BASE_URL));
    const BASE_SISTEMA = "http://localhost/prestamos/";

    const SERVER = 'localhost';
    const DB_PORT = '5433';
    const DB_NAME = 'prestamos';
    const USER = 'rebasedata';
    const DB_PASSWORD = 'admin';

    const SGBD = "pgsql:host=".SERVER.";port=".DB_PORT.";dbname=".DB_NAME.";user=".USER.";password=".DB_PASSWORD;

    const METHOD = "AES-256-CBC";
    const SECRET_KEY= '$PRESTAMOS@2024';
    const SECRET_IV = '749468244';


    // CÓDIGOS DE ESTADO
    const ESTADO_PRESTAMO_ACTIVO = 1;   
    const ESTADO_PRESTAMO_FINALIZADO = 2;
    const ESTADO_PRESTAMO_CANCELADO = 3;

    // Privilegios de usuario
    const PRIVILEGIO_ADMIN = 1;          
    const PRIVILEGIO_USUARIO = 2;        
    const PRIVILEGIO_GERENTE = 3;

    // TIPOS DE PAGO
    const TIPO_PAGO_EFECTIVO = 1;        
    const TIPO_PAGO_TARJETA = 2;         
    const TIPO_PAGO_TRANSFERENCIA = 3;   

    // CÓDIGOS DE ESTADO DE USUARIO
    const ESTADO_USUARIO_ACTIVO = 1;     
    const ESTADO_USUARIO_INACTIVO = 2;   
    const ESTADO_USUARIO_BLOQUEADO = 3;  

    // TABLAS (Usando identificadores numéricos)
    const T_CLIENTE = 1;
    const C_CLIENTE_ID = 2;
    const C_CLIENTE_DNI = 3;
    const C_CLIENTE_NOMBRE = 4;
    const C_CLIENTE_APELLIDO = 5;
    const C_CLIENTE_TELEFONO = 6;
    const C_CLIENTE_DIRECCION = 7;

    const T_DETALLE = 8;
    const C_DETALLE_ID = 9;
    const C_DETALLE_CANTIDAD = 10;
    const C_DETALLE_FORMATO = 11;
    const C_DETALLE_TIEMPO = 12;
    const C_DETALLE_COSTO_TIEMPO = 13;
    const C_DETALLE_DESCRIPCION = 14;
    const C_PRESTAMO_CODIGO = 15;
    const C_ITEM_ID = 16;

    const T_EMPRESA = 17;
    const C_EMPRESA_ID = 18;
    const C_EMPRESA_NOMBRE = 19;
    const C_EMPRESA_EMAIL = 20;
    const C_EMPRESA_TELEFONO = 21;
    const C_EMPRESA_DIRECCION = 22;

    const T_ITEM = 23;
    const C_ITEM_ID = 24;
    const C_ITEM_CODIGO = 25;
    const C_ITEM_NOMBRE = 26;
    const C_ITEM_STOCK = 27;
    const C_ITEM_ESTADO = 28;
    const C_ITEM_DETALLE = 29;

    const T_PAGO = 30;
    const C_PAGO_ID = 31;
    const C_PAGO_TOTAL = 32;
    const C_PAGO_FECHA = 33;
    const C_PRESTAMO_CODIGO = 34;

    const T_PRESTAMO = 35;
    const C_PRESTAMO_ID = 36;
    const C_PRESTAMO_CODIGO = 37;
    const C_PRESTAMO_FECHA_INICIO = 38;
    const C_PRESTAMO_HORA_INICIO = 39;
    const C_PRESTAMO_FECHA_FINAL = 40;
    const C_PRESTAMO_HORA_FINAL = 41;
    const C_PRESTAMO_CANTIDAD = 42;
    const C_PRESTAMO_TOTAL = 43;
    const C_PRESTAMO_PAGADO = 44;
    const C_PRESTAMO_ESTADO = 45;
    const C_PRESTAMO_OBSERVACION = 46;
    const C_USUARIO_ID = 47;
    const C_CLIENTE_ID = 48;

    const T_USUARIO = 49;
    const C_USUARIO_ID = 50;
    const C_USUARIO_DNI = 51;
    const C_USUARIO_NOMBRE = 52;
    const C_USUARIO_APELLIDO = 53;
    const C_USUARIO_TELEFONO = 54;
    const C_USUARIO_DIRECCION = 55;
    const C_USUARIO_EMAIL = 56;
    const C_USUARIO_USUARIO = 57;
    const C_USUARIO_CLAVE = 58;
    const C_USUARIO_ESTADO = 59;
    const C_USUARIO_PRIVILEGIO = 60;