/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     27/07/2016 10:39:40 p.m.                     */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists FACTURA;

drop table if exists FACTURA_DETALLE;

drop table if exists PRODUCTO;

drop table if exists TIPOS_PRODUCTO;

drop table if exists USUARIOS;


/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE                                               
(
   	ID_CLIENTE		int not null,
   	NOMBRE			char(50),
   	APELLIDO		char(50),
    	RAZON_SOCIAL		char(20),
    	NIT_CI			char(20),
   	primary key AUTO_INCREMENT(ID_CLIENTE)
);

/*==============================================================*/
/* Table: FACTURA                                               */
/*==============================================================*/
create table FACTURA                                               
(
   	ID_FACTURA          		INT not null,
   	ID_CLIENTE       	INT not null,
  	ID_USUARIO 	      	INT not null,
   	FECHA			date,
   	TOTAL			float,
    	ID_SUCURSAL    INT not null,
   primary key AUTO_INCREMENT(ID_FACTURA)
);

/*==============================================================*/
/* Table: FACTURA_DETALLE                                       */
/*==============================================================*/
create table FACTURA_DETALLE                                       
(
   ID_FACTURA_DETALLE                   INT not null,
   ID_FACTURA            int not null,
   ID_PRODUCTO           int not null,
   CANTIDAD		int,
   SUBTOTAL	       float,
   primary key AUTO_INCREMENT(ID_FACTURA_DETALLE )
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO                                              
(
   ID_PRODUCTO          int not null,
   NOMBRE               char(30),
   PRECIO               float,
   ID_TIPO              int,
   STOCK		int,
   primary key AUTO_INCREMENT(ID_PRODUCTO)
);
/*==============================================================*/
/* Table: TIPO_PRODUCTO                                        */
/*==============================================================*/
create table TIPO_PRODUCTO
(
  ID_TIPO               int not null,
  DESCRIPCION           char(50),
  PORCENTAJE_IMPUESTO   float,
  primary key AUTO_INCREMENT (ID_TIPO)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   ID_USUARIO        int not null,
   NOMBRE             char(50),
   PASSWORD           char(6),
   ES_ADMINISTRADOR   boolean,
   primary key AUTO_INCREMENT(ID_USUARIO)
);
/*==============================================================*/
/* Table: COMPANIA                                              */
/*==============================================================*/
create table COMPANIA
(
   ID_COMPANIA        int not null,
   NOMBRE_COMPANIA    char(50),
   DIRECCION	      char(50),
   TELEFONO 	      char(10),
   NIT                char(20),
   primary key AUTO_INCREMENT(ID_COMPANIA)
);
/*==============================================================*/
/* Table: SUCURSAL                                             */
/*==============================================================*/
create table SUCURSAL
(
   ID_SUCURSAL                 	int not null,
   NOMBRE_SUCURSAL     		char(50),
   RAZON_SOCIAL_SUCURSAL       	char(20),
   NIT                		char(20),
   TELEFONO       		char(20),
   DIRECCION            	char(50),
   ID_COMPANIA        		int not null,
   primary key AUTO_INCREMENT(ID_SUCURSAL)
);


alter table FACTURA_DETALLE add constraint FK_RELATIONSHIP_4 foreign key (ID_FACTURA)
      references FACTURA (ID_FACTURA) on delete restrict on update restrict;

alter table FACTURA_DETALLE add constraint FK_ESTA foreign key (ID_PRODUCTO)
      references PRODUCTO (ID_PRODUCTO) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_RELATIONSHIP_5 foreign key (ID_TIPO)
      references TIPO_PRODUCTO (ID_TIPO) on delete restrict on update restrict;

alter table FACTURA add constraint FK_ELABORA foreign key (ID_USUARIO)
      references USUARIOS (ID_USUARIO) on delete restrict on update restrict;

alter table FACTURA add constraint FK__ foreign key (ID_CLIENTE)
      references CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table FACTURA add constraint FK_RELATIONSHIP_6 foreign key (ID_SUCURSAL)
      references SUCURSAL (ID_SUCURSAL) on delete restrict on update restrict;

alter table SUCURSAL add constraint FK_RELATIONSHIP_7 foreign key (ID_COMPANIA)
      references COMPANIA (ID_COMPANIA) on delete restrict on update restrict;
