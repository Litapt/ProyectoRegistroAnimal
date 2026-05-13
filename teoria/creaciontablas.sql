use prabasededatos;
CREATE TABLE direccion (
    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre_lugar VARCHAR(100),
    direccion VARCHAR(255),

    latitud DECIMAL(10,8),
    longitud DECIMAL(11,8),

    place_id VARCHAR(100),

    ciudad VARCHAR(100),
    estado VARCHAR(100),
    pais VARCHAR(100),

    codigo_postal VARCHAR(20),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT(1) DEFAULT 1
);

CREATE TABLE duenos (
    id INT AUTO_INCREMENT PRIMARY KEY,

    curp VARCHAR(18) UNIQUE NOT NULL,

    nombres VARCHAR(45) NOT NULL,
    apellido_paterno VARCHAR(45),
    apellido_materno VARCHAR(45),

    telefono VARCHAR(20),

    clave_catastral VARCHAR(20),

    id_direccion INT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT(1) DEFAULT 1,

    CONSTRAINT fk_dueno_direccion
    FOREIGN KEY (id_direccion)
    REFERENCES direccion(id)
);

CREATE TABLE especies (
    id INT AUTO_INCREMENT PRIMARY KEY,

    nombre_especie VARCHAR(50) UNIQUE NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT(1) DEFAULT 1
);

CREATE TABLE razas (
    id INT AUTO_INCREMENT PRIMARY KEY,

    id_especie INT NOT NULL,

    nombre_raza VARCHAR(100) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT(1) DEFAULT 1,

    CONSTRAINT fk_raza_especie
    FOREIGN KEY (id_especie)
    REFERENCES especies(id)
);

CREATE TABLE animal (
    id INT AUTO_INCREMENT PRIMARY KEY,

    id_dueno INT NOT NULL,
    id_raza INT NOT NULL,

    nombre VARCHAR(45) NOT NULL,

    peso DECIMAL(5,2),

    colores VARCHAR(50),

    sexo ENUM('F','M','D'),

    esterilizado BOOLEAN DEFAULT FALSE,

    carnet_de_vacunacion BOOLEAN DEFAULT FALSE,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT(1) DEFAULT 1,

    CONSTRAINT fk_animal_dueno
    FOREIGN KEY (id_dueno)
    REFERENCES duenos(id),

    CONSTRAINT fk_animal_raza
    FOREIGN KEY (id_raza)
    REFERENCES razas(id)
);