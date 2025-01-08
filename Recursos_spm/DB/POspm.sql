-- Creación de las tablas con los tipos de datos y tamaños adecuados

CREATE TABLE public._cliente (
    cliente_id SERIAL PRIMARY KEY,
    cliente_dni character varying(10) NOT NULL,
    cliente_nombre character varying(100) NOT NULL,
    cliente_apellido character varying(100) NOT NULL,
    cliente_telefono character varying(20) NOT NULL,
    cliente_direccion character varying(255) NOT NULL
);

CREATE TABLE public._detalle (
    detalle_id SERIAL PRIMARY KEY,
    detalle_cantidad integer NOT NULL,
    detalle_formato character varying(50) NOT NULL,
    detalle_tiempo integer NOT NULL,
    detalle_costo_tiempo numeric(10,2) NOT NULL,
    detalle_descripcion text NOT NULL,
    prestamo_codigo character varying(50) NOT NULL,
    item_id integer NOT NULL
);

CREATE TABLE public._empresa (
    empresa_id SERIAL PRIMARY KEY,
    empresa_nombre character varying(100) NOT NULL,
    empresa_email character varying(100) NOT NULL,
    empresa_telefono character varying(20) NOT NULL,
    empresa_direccion character varying(255) NOT NULL
);

CREATE TABLE public._item (
    item_id SERIAL PRIMARY KEY,
    item_codigo character varying(50) NOT NULL,
    item_nombre character varying(100) NOT NULL,
    item_stock integer NOT NULL,
    item_estado character varying(20) NOT NULL,
    item_detalle text NOT NULL
);

CREATE TABLE public._pago (
    pago_id SERIAL PRIMARY KEY,
    pago_total numeric(10,2) NOT NULL,
    pago_fecha date NOT NULL,
    prestamo_codigo character varying(50) NOT NULL
);

CREATE TABLE public._prestamo (
    prestamo_id SERIAL PRIMARY KEY,
    prestamo_codigo character varying(50) NOT NULL,
    prestamo_fecha_inicio date NOT NULL,
    prestamo_hora_inicio time NOT NULL,
    prestamo_fecha_final date NOT NULL,
    prestamo_hora_final time NOT NULL,
    prestamo_cantidad integer NOT NULL,
    prestamo_total numeric(10,2) NOT NULL,
    prestamo_pagado numeric(10,2) NOT NULL,
    prestamo_estado character varying(20) NOT NULL,
    prestamo_observacion text,
    usuario_id integer NOT NULL,
    cliente_id integer NOT NULL
);

CREATE TABLE public._usuario (
    usuario_id SERIAL PRIMARY KEY,
    usuario_dni character varying(10) NOT NULL,
    usuario_nombre character varying(100) NOT NULL,
    usuario_apellido character varying(100) NOT NULL,
    usuario_telefono character varying(20) NOT NULL,
    usuario_direccion character varying(255) NOT NULL,
    usuario_email character varying(100) NOT NULL,
    usuario_usuario character varying(50) NOT NULL,
    usuario_clave character varying(255) NOT NULL,
    usuario_estado character varying(20) NOT NULL,
    usuario_privilegio character varying(20) NOT NULL
);



