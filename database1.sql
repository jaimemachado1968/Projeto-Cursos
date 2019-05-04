CREATE DATABASE projeto_cursos;

CREATE TABLE usuarios(
	id_usuario INT NOT NULL PRIMARY KEY UNIQUE auto_increment, 
    nome VARCHAR(65) NOT NULL,
    email VARCHAR(65) NOT NULL UNIQUE,
    senha VARCHAR(65) NOT NULL, 
    cpf INT,
    foto VARCHAR(65), /* CAMINHO DA IMAGEM */
    tipo_usuario INT    
);

CREATE TABLE tipo_usuario( 
	id_tipo_usuario INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(65) NOT NULL
);

CREATE TABLE cursos(
	id_cursos INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(65) NOT NULL,
    descricao VARCHAR(1000),
    preco FLOAT DEFAULT 0.0,
    tag VARCHAR(65),
    imagem VARCHAR(1000),
    professor INT
);

CREATE TABLE professor(
	id_professor INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
    nome VARCHAR(100) NOT NULL
);
ALTER TABLE usuarios
CHANGE tipo_usuario tipo_usuario_fk INT;

ALTER TABLE usuarios 
ADD FOREIGN KEY (tipo_usuario_fk) REFERENCES tipo_usuario(id_tipo_usuario);

ALTER TABLE cursos
CHANGE professor professor_fk INT;

ALTER TABLE cursos
ADD FOREIGN KEY (professor_fk) REFERENCES professor(id_professor);

INSERT INTO tipo_usuario (nome)
VALUES ("admin");

INSERT INTO tipo_usuario (nome)
VALUES ("professor"),("alunos");

SELECT * FROM tipo_usuario;

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ("Hendy", "hendy@mail.com", "123", "99999999999", "foto.png", 2);

ALTER TABLE usuarios
CHANGE cpf cpf BIGINT(12);

SELECT * FROM usuarios;

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ("Jaime", "jpmachado.1968@gmail.com", "123", "11832184862", "jaime.png",3);

SELECT * FROM usuarios;

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
VALUES ("Luan", "luan@gmail.com", "123", "11832184866", "luan.png",3);

SELECT nome, email, tipo_usuario_fk FROM usuarios;

SELECT * FROM usuarios
WHERE tipo_usuarios-fk = 2;

SELECT * FROM usuarios
WHERE nome LIKE "V%";

INSERT INTO tipo_usuario (id_tipo_usuario, nome)
VALUES ("1", "admin");

SELECT * FROM tipo_usuario;

SELECT * FROM usuarios
WHERE nome LIKE "H%" OR tipo_usuario_fk = 3;

SELECT * FROM usuarios
WHERE nome IN ("Hendy", "Vitoria", "Livia");

SELECT nome, email FROM usuarios
ORDER BY nome ASC;

SELECT nome, email FROM usuarios
WHERE tipo_usuario_fk =3
ORDER BY nome ASC;

SELECT nome, email FROM usuarios
WHERE tipo_usuario_fk =3
ORDER BY nome DESC;

UPDATE usuarios
SET email = "vitoria_1@gmail.com"
WHERE nome = "Vitoria";

SET sql_safe_updates = 0; 
/*desabilita o sistema de segurança do sql*/

UPDATE usuarios
SET foto = "nicolascage.png"
WHERE tipo_usuario_fk = 3;
/*troca foto de todos para Nicholas Cage*/

SELECT * FROM usuarios;

DELETE FROM usuarios
WHERE nome = "joao";
/* deleta o usuario de nome Joao*/

DELETE FROM usuarios
WHERE tipo_usuario_fk=2;
/* deleta o usarios de tipo_usuario_fk 2 (professores)*/
INSERT INTO `usuarios`
(`nome`,
`email`,
`senha`,
`cpf`,
`foto`,
`tipo_usuario_fk`)
VALUES
('Tomaz',
'tomaz@digitalhouse.com',
'1234',
12345678901,
'tomaz.jpg',
3);

SELECT * FROM usuarios





