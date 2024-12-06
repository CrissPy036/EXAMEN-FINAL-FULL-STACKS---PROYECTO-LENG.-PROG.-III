-- Crear la base de datos
CREATE DATABASE gestion_pedidos;

USE gestion_pedidos;

-- Crear tabla persona
CREATE TABLE persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_persona VARCHAR(255) NOT NULL
);

INSERT INTO
    persona (nombre_persona)
VALUES ('Administrador'),
    ('Fulana Martinez'),
    ('Agapito Meaurio'),
    ('Cristhian Gonzalez');

-- Crear tabla usuario
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NOT NULL UNIQUE,
    id_persona INT NOT NULL,
    pass_hash VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_persona) REFERENCES persona (id)
);

INSERT INTO
    usuario (
        nombre_usuario,
        id_persona,
        pass_hash
    )
VALUES (
        'admin',
        1,
        '$2y$12$thrEFZjHMFFukUg4gDJXgebpBgkvJfyIL/n8bwCNwnwYqU8I9GXjS'
    );

-- Crear tabla cliente
CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ruc VARCHAR(20) NOT NULL UNIQUE,
    nombre_completo VARCHAR(255) NOT NULL,
    direccion TEXT,
    telefono VARCHAR(20)
);

INSERT INTO
    cliente (
        ruc,
        nombre_completo,
        direccion,
        telefono
    )
VALUES (
        '00000000',
        'Cliente Ocasional',
        NULL,
        NULL
    ),
    (
        '12345678',
        'Juan Pérez',
        'Calle Falsa 123',
        '0987654321'
    ),
    (
        '32249336',
        'María López',
        NULL,
        '0981234567'
    ),
    (
        '55779986',
        'Carlos Gómez',
        'Avenida Siempre Viva 742',
        NULL
    );

-- Crear tabla estado
CREATE TABLE estado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_estado VARCHAR(255) NOT NULL
);

INSERT INTO estado (descripcion_estado) VALUES ('Pendiente');

INSERT INTO estado (descripcion_estado) VALUES ('Trabajando');

INSERT INTO estado (descripcion_estado) VALUES ('Completado');

INSERT INTO estado (descripcion_estado) VALUES ('Cancelado');

-- Crear tabla pedido
CREATE TABLE pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creado_en DATE,
    id_cliente INT NOT NULL,
    contacto VARCHAR(255),
    descripcion TEXT,
    id_estado INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES cliente (id),
    FOREIGN KEY (id_estado) REFERENCES estado (id)
);

INSERT INTO
    pedido (
        id_cliente,
        contacto,
        descripcion,
        id_estado,
        creado_en
    )
VALUES (
        1,
        '0976583508',
        'Pedido de diseño gráfico para banners publicitarios',
        1,
        '2024-12-03'
    );