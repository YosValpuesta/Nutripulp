CREATE DATABASE Nutripulp;
show databases;
USE Nutripulp;

CREATE TABLE productos (
 id INT(3) NOT NULL AUTO_INCREMENT,
 Nombre VARCHAR(25) NOT NULL, 
 Precio INT(3) UNSIGNED NOT NULL, 
 Existencia_L INT(3) UNSIGNED, 
 Imagen mediumblob NOT NULL,
 PRIMARY KEY (id)
);

/*Venta para tal cliente*/
CREATE TABLE ventas (
 id INT(4) NOT NULL AUTO_INCREMENT,
 id_usuario int(4) NOT NULL,
 Total DOUBLE NOT NULL,
 Fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 No_Pedido int(5) NOT NULL,
 PRIMARY KEY (id)
 );

/*Venta productos*/
CREATE TABLE productos_venta (
 id INT(4) NOT NULL AUTO_INCREMENT,
 id_venta INT(4) NOT NULL,
 id_producto INT(3) NOT NULL,
 Cantidad DOUBLE NOT NULL,
 Subtotal DOUBLE NOT NULL,
 PRIMARY KEY (id),
 FOREIGN KEY(id_venta) REFERENCES ventas,
 FOREIGN KEY(id_producto) REFERENCES productos
);