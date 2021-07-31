CREATE DATABASE avaliacaoii_pweb2;
USE avaliacaoii_pweb2;

CREATE TABLE user(
    nome_c VARCHAR(100) NOT NULL,
    nome_u VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(32) NOT NULL, 
    CONSTRAINT PRIMARY KEY(nome_u, email)
);