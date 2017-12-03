
-- Table: public.rol

-- DROP TABLE public.rol;

CREATE TABLE public.rol
(
    codigo integer NOT NULL DEFAULT nextval('rol_codigo_seq'::regclass),
    nombre character varying(50) COLLATE pg_catalog."default",
    CONSTRAINT rol_pkey PRIMARY KEY (codigo)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.rol
    OWNER to postgres;
    
   

CREATE TABLE public.pagina
(
    codigo integer NOT NULL DEFAULT nextval('pagina_codigo_seq'::regclass),
    nombre character varying(50) COLLATE pg_catalog."default",
    url character varying(100) COLLATE pg_catalog."default",
    estado boolean,
    CONSTRAINT pagina_pkey PRIMARY KEY (codigo)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.pagina
    OWNER to postgres;

-- Table: public.persona

-- DROP TABLE public.persona;

CREATE TABLE public.persona
(
    codigo integer NOT NULL DEFAULT nextval('persona_codigo_seq'::regclass),
    nombre character varying(50) COLLATE pg_catalog."default",
    telefono character varying(50) COLLATE pg_catalog."default",
    usuario character varying(50) COLLATE pg_catalog."default",
    clave character varying(250) COLLATE pg_catalog."default",
    rol_codigo integer,
    CONSTRAINT persona_pkey PRIMARY KEY (codigo),
    CONSTRAINT fk1 FOREIGN KEY (rol_codigo)
        REFERENCES public.rol (codigo) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.persona
    OWNER to postgres;


CREATE TABLE public.color
(
    codigo integer NOT NULL DEFAULT nextval('colores_codigo_seq'::regclass),
    nombre character varying(50) COLLATE pg_catalog."default",
    CONSTRAINT color_pkey PRIMARY KEY (codigo)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.color
    OWNER to postgres;


CREATE TABLE public.persona_color
(
    persona_codigo integer,
    color_codigo integer,
    CONSTRAINT fk1 FOREIGN KEY (persona_codigo)
        REFERENCES public.persona (codigo) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk2 FOREIGN KEY (color_codigo)
        REFERENCES public.color (codigo) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.persona_color
    OWNER to postgres;
 
-- Table: public.pagina_rol

-- DROP TABLE public.pagina_rol;

CREATE TABLE public.pagina_rol
(
    codigo integer NOT NULL DEFAULT nextval('pagina_rol_codigo_seq'::regclass),
    rol_codigo integer,
    pagina_codigo integer,
    CONSTRAINT pagina_rol_pkey PRIMARY KEY (codigo),
    CONSTRAINT fk1 FOREIGN KEY (rol_codigo)
        REFERENCES public.rol (codigo) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk2 FOREIGN KEY (pagina_codigo)
        REFERENCES public.pagina (codigo) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.pagina_rol
    OWNER to postgres;

