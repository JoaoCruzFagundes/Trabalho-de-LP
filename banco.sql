CREATE DATABASE trablp;
USE trablp;

Create table usuarios (
ID Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
login Varchar(30),
senha Varchar(40),
Primary Key (ID)) ENGINE = MyISAM;

CREATE TABLE item(
id_item BIGINT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
descricao VARCHAR(255) NOT NULL,
valor DECIMAL(10,2) NOT NULL
);

CREATE TABLE compra(
id_compra BIGINT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
id_cliente BIGINT NOT NULL,
cartao VARCHAR(16) NOT NULL,
FOREIGN KEY(id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE item_compra(
id_item_compra BIGINT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
id_item BIGINT NOT NULL,
id_compra BIGINT NOT NULL,
FOREIGN KEY(id_item) REFERENCES item(id_item),
FOREIGN KEY(id_compra) REFERENCES compra(id_compra)
);
