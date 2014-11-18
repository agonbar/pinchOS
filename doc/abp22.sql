CREATE TABLE usuario(
	usuarioID	int,
	nombre		varchar(255),
	contrasena	varchar(255),
	correo		varchar(255),
	estado		varchar(2),
	concurso	int
);
CREATE TABLE participantes(
	usuarioID	int,
	direccion	varchar(255),
	telefono	varchar(255),
	nombreLocal	varchar(255),
	horario		varchar(255),
	fotos		varchar(255),
	web		varchar(255)
);
CREATE TABLE pinchos(
	codigo		int,
	autor		int,
	nombre		varchar(255),
	precio		int,
	descripcion	varchar(255),
	foto		varchar(255),
	cocinero	varchar(255),
	estado		boleean
);
CREATE TABLE premiados(
	codigo		int,
	nVotos		int
);
CREATE TABLE vota(
	pincho		int,
	usuario		int
);
CREATE TABLE concurso(
	id		int,
	nombre		varchar(255),
	bases		varchar(255),
	ciudad		varchar(255),
	foto		varchar(255),
	premio		varchar(255)
);