CREATE DATABASE id21042039_bd_cultivo;
USE id21042039_bd_cultivo;

CREATE TABLE S_humedad(
    S_humedad INT PRIMARY KEY AUTO_INCREMENT,
    Temperatura VARCHAR(9),
    humedad VARCHAR(9),
    Fecha_Actual DATE
);

CREATE TABLE usuarios(
    id_usuario INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    contraseña VARCHAR(200) NOT NULL,
    fecha_creado TIMESTAMP NOT NULL DEFAULT (NOW()),
    rol VARCHAR(30) NOT NULL,
    PRIMARY KEY(id_usuario)
);