CREATE DATABASE estetica;

USE estetica;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (username, senha)
VALUES ('admin', '$2y$10$QhGyz4U0Ixv2vW/bu6cdcuVK1oGz3FfZGMZrIj.vLkK3xRHUz/t3O');