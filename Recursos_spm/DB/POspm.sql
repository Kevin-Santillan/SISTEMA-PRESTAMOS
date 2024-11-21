--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 9.6.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: _cliente; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._cliente (
    cliente_id character varying(1) DEFAULT NULL::character varying,
    cliente_dni character varying(1) DEFAULT NULL::character varying,
    cliente_nombre character varying(1) DEFAULT NULL::character varying,
    cliente_apellido character varying(1) DEFAULT NULL::character varying,
    cliente_telefono character varying(1) DEFAULT NULL::character varying,
    cliente_direccion character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._cliente OWNER TO rebasedata;

--
-- Name: _detalle; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._detalle (
    detalle_id character varying(1) DEFAULT NULL::character varying,
    detalle_cantidad character varying(1) DEFAULT NULL::character varying,
    detalle_formato character varying(1) DEFAULT NULL::character varying,
    detalle_tiempo character varying(1) DEFAULT NULL::character varying,
    detalle_costo_tiempo character varying(1) DEFAULT NULL::character varying,
    detalle_descripcion character varying(1) DEFAULT NULL::character varying,
    prestamo_codigo character varying(1) DEFAULT NULL::character varying,
    item_id character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._detalle OWNER TO rebasedata;

--
-- Name: _empresa; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._empresa (
    empresa_id character varying(1) DEFAULT NULL::character varying,
    empresa_nombre character varying(1) DEFAULT NULL::character varying,
    empresa_email character varying(1) DEFAULT NULL::character varying,
    empresa_telefono character varying(1) DEFAULT NULL::character varying,
    empresa_direccion character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._empresa OWNER TO rebasedata;

--
-- Name: _item; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._item (
    item_id character varying(1) DEFAULT NULL::character varying,
    item_codigo character varying(1) DEFAULT NULL::character varying,
    item_nombre character varying(1) DEFAULT NULL::character varying,
    item_stock character varying(1) DEFAULT NULL::character varying,
    item_estado character varying(1) DEFAULT NULL::character varying,
    item_detalle character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._item OWNER TO rebasedata;

--
-- Name: _pago; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._pago (
    pago_id character varying(1) DEFAULT NULL::character varying,
    pago_total character varying(1) DEFAULT NULL::character varying,
    pago_fecha character varying(1) DEFAULT NULL::character varying,
    prestamo_codigo character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._pago OWNER TO rebasedata;

--
-- Name: _prestamo; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._prestamo (
    prestamo_id character varying(1) DEFAULT NULL::character varying,
    prestamo_codigo character varying(1) DEFAULT NULL::character varying,
    prestamo_fecha_inicio character varying(1) DEFAULT NULL::character varying,
    prestamo_hora_inicio character varying(1) DEFAULT NULL::character varying,
    prestamo_fecha_final character varying(1) DEFAULT NULL::character varying,
    prestamo_hora_final character varying(1) DEFAULT NULL::character varying,
    prestamo_cantidad character varying(1) DEFAULT NULL::character varying,
    prestamo_total character varying(1) DEFAULT NULL::character varying,
    prestamo_pagado character varying(1) DEFAULT NULL::character varying,
    prestamo_estado character varying(1) DEFAULT NULL::character varying,
    prestamo_observacion character varying(1) DEFAULT NULL::character varying,
    usuario_id character varying(1) DEFAULT NULL::character varying,
    cliente_id character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._prestamo OWNER TO rebasedata;

--
-- Name: _usuario; Type: TABLE; Schema: public; Owner: rebasedata
--

CREATE TABLE public._usuario (
    usuario_id character varying(1) DEFAULT NULL::character varying,
    usuario_dni character varying(1) DEFAULT NULL::character varying,
    usuario_nombre character varying(1) DEFAULT NULL::character varying,
    usuario_apellido character varying(1) DEFAULT NULL::character varying,
    usuario_telefono character varying(1) DEFAULT NULL::character varying,
    usuario_direccion character varying(1) DEFAULT NULL::character varying,
    usuario_email character varying(1) DEFAULT NULL::character varying,
    usuario_usuario character varying(1) DEFAULT NULL::character varying,
    usuario_clave character varying(1) DEFAULT NULL::character varying,
    usuario_estado character varying(1) DEFAULT NULL::character varying,
    usuario_privilegio character varying(1) DEFAULT NULL::character varying
);


ALTER TABLE public._usuario OWNER TO rebasedata;

--
-- Data for Name: _cliente; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._cliente (cliente_id, cliente_dni, cliente_nombre, cliente_apellido, cliente_telefono, cliente_direccion) FROM stdin;
\.


--
-- Data for Name: _detalle; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._detalle (detalle_id, detalle_cantidad, detalle_formato, detalle_tiempo, detalle_costo_tiempo, detalle_descripcion, prestamo_codigo, item_id) FROM stdin;
\.


--
-- Data for Name: _empresa; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._empresa (empresa_id, empresa_nombre, empresa_email, empresa_telefono, empresa_direccion) FROM stdin;
\.


--
-- Data for Name: _item; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._item (item_id, item_codigo, item_nombre, item_stock, item_estado, item_detalle) FROM stdin;
\.


--
-- Data for Name: _pago; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._pago (pago_id, pago_total, pago_fecha, prestamo_codigo) FROM stdin;
\.


--
-- Data for Name: _prestamo; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._prestamo (prestamo_id, prestamo_codigo, prestamo_fecha_inicio, prestamo_hora_inicio, prestamo_fecha_final, prestamo_hora_final, prestamo_cantidad, prestamo_total, prestamo_pagado, prestamo_estado, prestamo_observacion, usuario_id, cliente_id) FROM stdin;
\.


--
-- Data for Name: _usuario; Type: TABLE DATA; Schema: public; Owner: rebasedata
--

COPY public._usuario (usuario_id, usuario_dni, usuario_nombre, usuario_apellido, usuario_telefono, usuario_direccion, usuario_email, usuario_usuario, usuario_clave, usuario_estado, usuario_privilegio) FROM stdin;
\.


--
-- PostgreSQL database dump complete
--

