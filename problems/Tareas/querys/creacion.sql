CREATE TABLE tareas (
	id serial PRIMARY KEY,
	nombre text NOT NULL,
	descripcion text NOT NULL,
	estado text NOT NULL
);