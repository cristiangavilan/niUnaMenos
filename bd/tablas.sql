CREATE TABLE provincia (
  id_provincia int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE ciudad (
  id_ciudad int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  id_provincia int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE rol (
  id_rol int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE usuario (
  id_usuario int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_rol int(11) NOT NULL,
  nombre_usuario varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE estado (
  id_estado int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE tipo_documento (
  id_tipo_documento int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE genero (
  id_genero int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO genero (id_genero, nombre) VALUES
(1, 'femenino'),
(2, 'masculino');

-- --------------------------------------------------------

CREATE TABLE empleado (
  id_empleado int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_estado int(11) NOT NULL,
  id_tipo_documento int(11) NOT NULL,
  numero_documento varchar(50) NOT NULL,
  nombre varchar(50) NOT NULL,
  apellido varchar(50) NOT NULL,
  fecha_nacimiento date NOT NULL,
  telefono int(11) NOT NULL,
  direccion varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  id_genero int(11) NOT NULL,
  id_ciudad int(11) NOT NULL,
  FOREIGN KEY (id_estado) REFERENCES estado(id_estado),
  FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento),
  FOREIGN KEY (id_genero) REFERENCES genero(id_genero),
  FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE persona (
  id_persona int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Id_estado int(11) NOT NULL,
  id_tipo_documento int(11) NOT NULL,
  numero_documento varchar(50) NOT NULL,
  nombre varchar(50) NOT NULL,
  apellido varchar(50) NOT NULL,
  fecha_nacimiento date,
  id_genero int(11) NOT NULL,
  telefono int(11),
  direccion varchar(100),
  email varchar(100),
  id_ciudad int(11) NOT NULL,
  FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento),
  FOREIGN KEY (id_genero) REFERENCES genero(id_genero),
  FOREIGN KEY (id_ciudad) REFERENCES ciudad(id_ciudad),
  FOREIGN KEY (id_estado) REFERENCES estado(id_estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE victima (
  id_victima int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_estado int(11) NOT NULL,
  aspecto_relevante varchar(1000) NOT NULL,
  FOREIGN KEY (id_victima) REFERENCES persona(id_persona),    
  FOREIGN KEY (id_estado) REFERENCES estado(id_estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE agresor (
  id_persona_agresor int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  perfil_psicologico varchar(1000) NOT NULL,
  FOREIGN KEY (id_persona_agresor) REFERENCES persona(id_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE operador (
  id_empleado_operador int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE vinculo (
  id_vinculo int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE se_relaciona (
  id_persona1 int(11) NOT NULL AUTO_INCREMENT,
  id_vinculo int(11) NOT NULL,
  id_persona2 int(11) NOT NULL,
  PRIMARY KEY (id_persona1, id_vinculo, id_persona2),
  FOREIGN KEY (id_persona1) REFERENCES persona(id_persona),
  FOREIGN KEY (id_persona2) REFERENCES persona(id_persona),
  FOREIGN KEY (id_vinculo) REFERENCES vinculo(id_vinculo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE caso (
  id_caso int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_persona_victima int(11) NOT NULL,
  id_estado int(11) NOT NULL,
  expediente varchar(1000) NOT NULL,
  FOREIGN KEY (id_persona_victima) REFERENCES persona(id_persona),
  FOREIGN KEY (id_estado) REFERENCES estado(id_estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE tipo_alerta (
  id_tipo_alerta int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE alerta (
  id_alerta int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fecha date NOT NULL,
  hora time NOT NULL,
  gps_lat varchar(50) NOT NULL,
  gps_lng varchar(50) NOT NULL,
  id_persona_victima int(11) NOT NULL,
  id_tipo_alerta int(11) NOT NULL,
  id_empleado_operador int(11),
  observacion varchar(1000),
  FOREIGN KEY (id_persona_victima) REFERENCES persona(id_persona),
  FOREIGN KEY (id_tipo_alerta) REFERENCES tipo_alerta(id_tipo_alerta),
  FOREIGN KEY (id_empleado_operador) REFERENCES operador(id_empleado_operador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE asiste (
  id_persona_victima int(11) NOT NULL,
  id_empleado_operador int(11) NOT NULL,
  fecha date NOT NULL,
  hora time NOT NULL,
  descripcion varchar(1000) NOT NULL,
  PRIMARY KEY (id_persona_victima, id_empleado_operador, fecha, hora),
  FOREIGN KEY (id_persona_victima) REFERENCES persona(id_persona),
  FOREIGN KEY (id_empleado_operador) REFERENCES operador(id_empleado_operador)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE involucra (
  id_persona_victima int(11) NOT NULL,
  id_caso int(11) NOT NULL,
  PRIMARY KEY (id_persona_victima, id_caso),
  FOREIGN KEY (id_persona_victima) REFERENCES victima(id_victima),
  FOREIGN KEY (id_caso) REFERENCES caso(id_caso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE generada_por (
  id_persona_agresor int(11) NOT NULL,
  id_caso int(11) NOT NULL,
  PRIMARY KEY (id_persona_agresor, id_caso),
  FOREIGN KEY (id_persona_agresor) REFERENCES caso(id_caso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE atiende (
  id_empleado_operador int(11) NOT NULL,
  id_caso int(11) NOT NULL,
  PRIMARY KEY (id_empleado_operador, id_caso),
  FOREIGN KEY (id_empleado_operador) REFERENCES operador(id_empleado_operador),
  FOREIGN KEY (id_caso) REFERENCES caso(id_caso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE grupo_de_asistencia (
  id_grupo_de_asistencia int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE profesional (
  id_empleado_profesional int(11) NOT NULL PRIMARY KEY,
  profesion varchar(100) NOT NULL,
  id_grupo_asistencia int(11) NOT NULL,
  FOREIGN KEY (id_empleado_profesional) REFERENCES empleado(id_empleado),
  FOREIGN KEY (id_grupo_asistencia) REFERENCES grupo_de_asistencia(id_grupo_de_asistencia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE interviene (
  id_caso int(11) NOT NULL,
  id_empleado_profesional int(11) NOT NULL,
  PRIMARY KEY (id_empleado_profesional, id_caso),
  FOREIGN KEY (id_empleado_profesional) REFERENCES empleado(id_empleado),
  FOREIGN KEY (id_caso) REFERENCES caso(id_caso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tipo_centro_asistencial (
  id_tipo_centro_asistencial int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT
  nombre varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE centro_asistencial (
  id_centro_asistencial int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(50),
  direccion varchar(100) NOT NULL,
  telefono varchar(50) NOT NULL,
  gps_lat varchar(50) NOT NULL,
  gps_lng varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE se_contacta (
  id_empleado_operador int(11) NOT NULL,
  id_centro_asistencial int(11) NOT NULL,
  fecha date NOT NULL,
  hora time NOT NULL,
  descripcion varchar(1000) NOT NULL,
  PRIMARY KEY (id_empleado_operador, id_centro_asistencial, fecha, hora),
  FOREIGN KEY (id_empleado_operador) REFERENCES operador(id_empleado_operador),
  FOREIGN KEY (id_centro_asistencial) REFERENCES centro_asistencial(id_centro_asistencial)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;