CREATE DATABASE PROYECTO_QAM;

USE PROYECTO_QAM;

CREATE TABLE CATEGORIA
(
	CATEGORIA_ID INT not null,
	DESC_CATEGORIA VARCHAR(25) not null,
	ESTADO_CATEGORIA BOOLEAN not null,
	PRIMARY KEY (CATEGORIA_ID)
);

CREATE TABLE MARCA
(
	MARCA_ID INT not null,
	DESCRIP_MARCA VARCHAR(50) not null,
	ESTADO_MARCA BOOLEAN not null,
	PRIMARY KEY (MARCA_ID)
);


CREATE TABLE PRODUCTO
(
	PRODUCTO_ID BIGINT not null,
	DESCRIP_PRODUCTO VARCHAR(100) not null,
	VALOR_COMPRAUNI DOUBLE not null,
	VALOR_VENTAUNI DOUBLE not null,
	CANTIDAD_EXIST INT not null,
	CANTIDAD_MIN INT not null,
	CANTIDAD_MAX INT not null,
	FECHA_CADUCIDAD DATE not null,
	MARCA_PRODUCTO INT not null,
	CATEGORIA_PRODUCTO INT not null,
	IMAGEN_PRODUCTO VARCHAR(50) null,
	PRIMARY KEY (PRODUCTO_ID)

);


CREATE TABLE FACTURA
(
	FACTURA_ID INT not null,
	FECHA_FACTURA DATE not null,
	SUBTOTAL DOUBLE not null,
	IVA DOUBLE not null,
	TOTAL_FAC DOUBLE not null,
	PRIMARY KEY (FACTURA_ID)
);

CREATE TABLE FACT_VENTA
(
	ID_FACT_VENTA INT not null,
	TDOC_EMPLEADO VARCHAR(5) not null,
	ID_EMPLEADO VARCHAR(15) not null,
	ID_CLIENTE VARCHAR(15) not null,
	TDOC_CLIENTE VARCHAR(5) not null,
	PRIMARY KEY (ID_FACT_VENTA)
);

CREATE TABLE FACT_COMPRA
(
	ID_FACT_COMPRA INT not null,
	TDOC_EMPLEADO VARCHAR(5) not null,
	ID_EMPLEADO VARCHAR(15) not null,
	ID_PROVEEDOR VARCHAR(15) not null,
	TDOC_PROVEEDOR VARCHAR (5) not null,
	PRIMARY KEY (ID_FACT_COMPRA)
);

CREATE TABLE FACT_PRODUCTO
(
	ID_FACTURA_ID INT not null,
	ID_PRODUCTO_ID BIGINT not null,
	CANT_PRODUCTO INT not null,
	VALOR_PRODUCTO DOUBLE not null,
	PRIMARY KEY (ID_FACTURA_ID,ID_PRODUCTO_ID)
);


CREATE TABLE PERSONA
(
	PERSONA_ID VARCHAR(15) not null,
	TIPDOC_ID VARCHAR(5) not null,
	PRI_NOMBRE_PERSONA VARCHAR(45) not null,
	SEG_NOMBRE_PERSONA VARCHAR(45) null,
	PRI_APELLIDO_PERSONA VARCHAR(45) not null,
	SEG_APELLIDO_PERSONA VARCHAR(45) not null,
	DIREC_PERSONA VARCHAR(45)  null,
	CEL_PERSONA VARCHAR(10) not null,
	CORREO_PERSONA VARCHAR(45) not null,
	PASSWORD VARCHAR(45) not null,
	PRIMARY KEY (PERSONA_ID,TIPDOC_ID)
);

CREATE TABLE TIPODOC
(
	TIPO_DOC VARCHAR(5) not null,
	DESCRIP_TDOC VARCHAR(45) not null,
	ESTODO_TIPO_DOC BOOLEAN not null,
	PRIMARY KEY (TIPO_DOC)
);

CREATE TABLE ROLES
(
	ROL_ID VARCHAR(10) not null,
	DESCRIP_ROL VARCHAR(45) not null,
	PRIMARY KEY (ROL_ID)
);


CREATE TABLE ADMINISTRADOR
(
	ADMINISTRADOR_ID VARCHAR(15) not null,
	ADMINISTRADOR_TDOC VARCHAR(5) not null,
	PRIMARY KEY (ADMINISTRADOR_ID,ADMINISTRADOR_TDOC)
);



CREATE TABLE EMPLEADO
(
	EMPLEADO_ID VARCHAR(15) not null,
	EMPLEADO_TDOC VARCHAR(5) not null,
	SUELDO_EMPLEADO DOUBLE null,
	PRIMARY KEY (EMPLEADO_ID,EMPLEADO_TDOC)
);

CREATE TABLE CLIENTE
(
	CLIENTE_ID VARCHAR(15) not null,
	CLIENTE_TDOC VARCHAR(5) not null,
	PRIMARY KEY (CLIENTE_ID,CLIENTE_TDOC)
);

CREATE TABLE PERSONA_ROL
(
	ID_PERSONA VARCHAR(15) not null,
	TIPDOC VARCHAR (5) not null,
	ROL VARCHAR(10) not null,
	ESTADO_ROL TINYINT not null,
	PRIMARY KEY (ID_PERSONA,TIPDOC,ROL)
);

CREATE TABLE EMPRESA
(
	EMPRESA_ID INT not null,
	NOMBRE_EMPRESA VARCHAR(45) not null,
	TEL_CONTACTO VARCHAR(15) not null,
	PRIMARY KEY(EMPRESA_ID)
);

CREATE TABLE PROVEEDOR
(
	PROVEEDOR_ID VARCHAR(15) not null,
	PROVEEDOR_TDOC VARCHAR(5)not null,
	PRI_NOMBRE_PROVEEDOR VARCHAR(45) not null,
	SEG_NOMBRE_PROVEEDOR VARCHAR(45)  null,
	PRI_APELLIDO_PROVEEDOR VARCHAR(45) not null,
	SEG_APELLIDO_PROVEEDOR VARCHAR(45) not null,
	EMPRESA_PROVEEDOR INT not null,
	PRIMARY KEY (PROVEEDOR_ID,PROVEEDOR_TDOC)
);




ALTER TABLE PRODUCTO
ADD FOREIGN KEY (MARCA_PRODUCTO)
REFERENCES MARCA (MARCA_ID);

ALTER TABLE PRODUCTO
ADD FOREIGN KEY (CATEGORIA_PRODUCTO)
REFERENCES CATEGORIA (CATEGORIA_ID)
ON UPDATE CASCADE;

ALTER TABLE FACT_PRODUCTO
ADD FOREIGN KEY (ID_PRODUCTO_ID)
REFERENCES PRODUCTO (PRODUCTO_ID)
ON UPDATE CASCADE;

ALTER TABLE FACT_PRODUCTO
ADD FOREIGN KEY (ID_FACTURA_ID)
REFERENCES FACTURA (FACTURA_ID)
ON UPDATE CASCADE;

ALTER TABLE FACT_COMPRA
ADD FOREIGN KEY (ID_FACT_COMPRA)
REFERENCES FACTURA (FACTURA_ID)
ON UPDATE CASCADE;

ALTER TABLE FACT_VENTA
ADD FOREIGN KEY (ID_FACT_VENTA)
REFERENCES FACTURA (FACTURA_ID)
ON UPDATE CASCADE;

ALTER TABLE PERSONA
ADD FOREIGN KEY (TIPDOC_ID)
REFERENCES TIPODOC (TIPO_DOC)
ON UPDATE CASCADE;


ALTER TABLE CLIENTE
ADD FOREIGN KEY (CLIENTE_ID,CLIENTE_TDOC)
REFERENCES PERSONA (PERSONA_ID,TIPDOC_ID)
ON UPDATE CASCADE;

ALTER TABLE PERSONA_ROL
ADD FOREIGN KEY (ROL)
REFERENCES ROLES (ROL_ID)
ON UPDATE CASCADE;

ALTER TABLE PERSONA_ROL
ADD FOREIGN KEY (ID_PERSONA,TIPDOC)
REFERENCES PERSONA (PERSONA_ID,TIPDOC_ID)
ON UPDATE CASCADE;

ALTER TABLE ADMINISTRADOR
ADD FOREIGN KEY (ADMINISTRADOR_ID,ADMINISTRADOR_TDOC)
REFERENCES PERSONA(PERSONA_ID,TIPDOC_ID)
ON UPDATE CASCADE;


ALTER TABLE EMPLEADO
ADD FOREIGN KEY (EMPLEADO_ID,EMPLEADO_TDOC)
REFERENCES PERSONA (PERSONA_ID,TIPDOC_ID)
ON UPDATE CASCADE;

ALTER TABLE FACT_VENTA
ADD FOREIGN KEY (ID_CLIENTE,TDOC_CLIENTE)
REFERENCES CLIENTE (CLIENTE_ID,CLIENTE_TDOC)
ON UPDATE CASCADE;

ALTER TABLE FACT_VENTA
ADD FOREIGN KEY (ID_EMPLEADO,TDOC_EMPLEADO)
REFERENCES EMPLEADO (EMPLEADO_ID,EMPLEADO_TDOC)
ON UPDATE CASCADE;

ALTER TABLE FACT_COMPRA
ADD FOREIGN KEY (ID_EMPLEADO,TDOC_EMPLEADO)
REFERENCES EMPLEADO (EMPLEADO_ID,EMPLEADO_TDOC)
ON UPDATE CASCADE;

ALTER TABLE FACT_COMPRA
ADD FOREIGN KEY (ID_PROVEEDOR,TDOC_PROVEEDOR)
REFERENCES PROVEEDOR (PROVEEDOR_ID,PROVEEDOR_TDOC)
ON UPDATE CASCADE;

ALTER TABLE PROVEEDOR
ADD FOREIGN KEY (EMPRESA_PROVEEDOR)
REFERENCES EMPRESA (EMPRESA_ID)
ON UPDATE CASCADE;

ALTER TABLE PROVEEDOR
ADD FOREIGN KEY (PROVEEDOR_TDOC)
REFERENCES TIPODOC (TIPO_DOC)
ON UPDATE CASCADE;


