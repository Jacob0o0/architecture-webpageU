-- Create a new database called 'Arquitectura';
CREATE DATABASE Arquitectura;

CREATE TABLE espacioUrbano(
    id INT PRIMARY KEY AUTO_INCREMENT,
    espacioUrbNom VARCHAR(200) NOT NULL,
    periodoConstruc DATE NOT NULL,
    funcion VARCHAR(500) NOT NULL,
    idArquitecto INT,
    idUbicacion INT NOT NULL,
    contextoHistorico VARCHAR(7500) NOT NULL,
    descripUrb_idDescripUrb  INT NOT NULL,
    transformaciones VARCHAR(4500) NOT NULL,
    principiosDiseño VARCHAR(3000) NOT NULL,
    importancia VARCHAR(4000)
);

CREATE TABLE descripUrbano(
    id INT PRIMARY KEY AUTO_INCREMENT,
    planUrbanistico VARCHAR(4000),
    caracteristicas VARCHAR(2500),
    orientacion VARCHAR(500),
    dimensiones VARCHAR(250),
    secciones VARCHAR(1000),
    elementos VARCHAR(2000),
    tiposEdifRodeando VARCHAR(2000)
);

CREATE TABLE edificio(
    id edificio INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    idGeneroEdif INT NOT NULL,
    usoActual VARCHAR(700),
    fechaConstruc DATE,
    idArquitecto INT,
    idUbicacion int NOT NULL,
    contextoHistorico VARCHAR(7500) NOT NULL,
    descripEdif_idDescripEdif INT NOT NULL,
    corrienteEst VARCHAR(1000),
    materialYSistem VARCHAR(1000),
    contextoUrbano VARCHAR(3000),
    transformaciones VARCHAR(4500) NOT NULL
);

CREATE TABLE descripEdif(
    id INT PRIMARY KEY AUTO_INCREMENT,
    concepto VARCHAR(4000),
    plantas VARCHAR(500),
    fachadas VARCHAR(500),
    dimensiones VARCHAR(250)
);

-------------------------------------
CREATE TABLE IF NOT EXISTS estado(
    idEstado INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    estadoNom VARCHAR(60) NOT NULL
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS alcaldia(
    idAlcaldia INT AUTO_INCREMENT NOT NULL,
    alcaldiaMuni VARCHAR(50) NOT NULL,
    idEstado INT NOT NULL,
    PRIMARY KEY (idAlcaldia),
    FOREIGN KEY (idEstado) REFERENCES estado(idEstado) ON DELETE RESTRICT
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS colonia(
    idColonia INT AUTO_INCREMENT NOT NULL,
    coloniaNom VARCHAR(100) NOT NULL,
    idAlcaldia INT NOT NULL,
    idEstado INT NOT NULL,
    PRIMARY KEY (idcolonia),
    FOREIGN KEY (idAlcaldia) REFERENCES alcaldia(idAlcaldia) ON DELETE RESTRICT,
    FOREIGN KEY (idEstado) REFERENCES estado(idEstado) ON DELETE RESTRICT
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS ubicacion(
    idUbicacion INT AUTO_INCREMENT NOT NULL, 
    ubicacion_url VARCHAR(250) NOT NULL,
    calleNum VARCHAR(50) NOT NULL,
    idColonia INT NOT NULL,
    idAlcaldia INT NOT NULL,
    idEstado INT NOT NULL,
    PRIMARY KEY (idUbicacion),
    FOREIGN KEY (idColonia) REFERENCES colonia(idColonia) ON DELETE RESTRICT,
    FOREIGN KEY (idAlcaldia) REFERENCES alcaldia(idAlcaldia) ON DELETE RESTRICT,
	FOREIGN KEY (idEstado) REFERENCES estado(idEstado) ON DELETE RESTRICT
)ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS espacioUrbano(
    id INT PRIMARY KEY AUTO_INCREMENT,
    espacioUrbNom VARCHAR(200) NOT NULL,
    periodoConstruc DATE NOT NULL,
    funcion VARCHAR(500) NOT NULL,
    idArquitecto INT,
    idUbicacion INT NOT NULL,
    contextoHistorico VARCHAR(7500) NOT NULL,
    descripUrb_idDescripUrb  INT NOT NULL,
    transformaciones VARCHAR(4500) NOT NULL,
    principiosDiseño VARCHAR(3000) NOT NULL,
    importancia VARCHAR(4000)
);

CREATE TABLE IF NOT EXISTS descripUrbano(
    id INT PRIMARY KEY AUTO_INCREMENT,
    planUrbanistico VARCHAR(4000),
    caracteristicas VARCHAR(2500),
    orientacion VARCHAR(500),
    dimensiones VARCHAR(250),
    secciones VARCHAR(1000),
    elementos VARCHAR(2000),
    tiposEdifRodeando VARCHAR(2000)
);

CREATE TABLE IF NOT EXISTS edificio(
    idedificio INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    idGeneroEdif INT NOT NULL,
    usoActual VARCHAR(700),
    fechaConstruc DATE,
    idArquitecto INT,
    idUbicacion int NOT NULL,
    contextoHistorico VARCHAR(7500) NOT NULL,
    descripEdif_idDescripEdif INT NOT NULL,
    corrienteEst VARCHAR(500),
    materialYSistem VARCHAR(500),
    contextoUrbano VARCHAR(1000),
    transformaciones VARCHAR(4500) NOT NULL
);

CREATE TABLE IF NOT EXISTS descripEdif(
    id INT PRIMARY KEY AUTO_INCREMENT,
    concepto VARCHAR(4000),
    plantas VARCHAR(500),
    fachadas VARCHAR(500),
    dimensiones VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS biografia(
    idPersonaje INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nomPer varchar(45) NOT NULL,
    apePer varchar(45) NOT NULL,
    apePer2 varchar(45) NOT NULL,
    fechaNac date NOT NULL,
    idEstado int NOT NULL,
    FOREIGN KEY (idEstado) REFERENCES estado(idEstado) ON DELETE RESTRICT 
)ENGINE = INNODB;
    
CREATE TABLE IF NOT EXISTS estudio(
    idDiscilplina INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    disciplina varchar(100) NOT NULL,
    fechaInic date NOT NULL,
    fechaTer date NOT NULL,
    idPersonaje INT NOT NULL,
    FOREIGN KEY (idPersonaje) REFERENCES biografia(idPersonaje) ON DELETE
    RESTRICT
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS obra(
    idObra INT AUTO_INCREMENT NOT NULL,
    nomObra VARCHAR(200) NOT NULL,
    fechaRealizo DATE NOT NULL,
    idUbicación INT NOT NULL,
    idPersonaje INT NOT NULL,
    PRIMARY KEY (idObra),
    FOREIGN KEY (idUbicacion) REFERENCES ubicacion(idUbicacion) ON DELETE RESTRICT,
    FOREIGN KEY (idPersonaje) REFERENCES biografia(idPersonaje) ON DELETE RESTRICT
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS arquitecto(
    idEdificio INT NOT NULL,
    idObra INT NOT NULL,
    idPersonaje INT NOT NULL,
    idEspacioUrb INT NOT NULL,
    FOREIGN KEY (idEdificio) REFERENCES edificio(idEdificio) ON DELETE RESTRICT,
    FOREIGN KEY (idObra) REFERENCES obra(idObra) ON DELETE RESTRICT, 
    FOREIGN KEY (idPersonaje) REFERENCES biografia(idPersonaje) ON DELETE RESTRICT,
    FOREIGN KEY (idEspacioUrb) REFERENCES espacioUrbano(id) ON DELETE RESTRICT
)ENGINE = INNODB;