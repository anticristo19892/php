mi_base_de_datosusuariosusuariosusuariosCREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    PASSWORD  VARCHAR(255) NOT NULL
);

CREATE TABLE admoinistrador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(40) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(70) NOT NULL,
    PASSWORD  VARCHAR(355) NOT NULL
);

usuariosadmoinistradoremprendedores CREATE TABLE emprendedor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    PASSWORD  VARCHAR(255) NOT NULL
);



php