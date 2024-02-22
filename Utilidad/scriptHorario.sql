DROP DATABASE IF EXISTS horario;
CREATE DATABASE horario;
USE horario;

CREATE TABLE ofertaEducativa (
codOe char(3) ,
fechaActa timestamp,
nombre varchar(70),
descripcion varchar(255),
tipo ENUM('CFGS','CFGM'),
fechaLey timestamp,
PRIMARY KEY (codOe, fechaActa));


CREATE TABLE profesor(
codProf char(3) PRIMARY KEY,
nombre varchar(20),
apellidos varchar(40),
fechaAlta date);


CREATE TABLE curso(
codOe char(3),
fechaActa timestamp,
codCurso char(2),
codTutor char(3) UNIQUE NOT NULL,
PRIMARY KEY(codOe, fechaActa, codCurso),
CONSTRAINT FK_codOe FOREIGN KEY (codOe,fechaActa)
REFERENCES ofertaEducativa(codOe,fechaActa) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_codTutor FOREIGN KEY (codTutor)
REFERENCES profesor(codProf) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE tramoHorario(
codTramo char(2) PRIMARY KEY,
horaInicio TIME,
horaFin TIME,
dia ENUM('LUNES' , 'MARTES' , 'MIERCOLES' , 'JUEVES', 'VIERNES'));

CREATE TABLE asignatura(
codAsig varchar(6) PRIMARY KEY,
nombre varchar(80) NOT NULL,
horasSemanales tinyint unsigned,
horasTotales smallint unsigned
);

CREATE TABLE reparto(
codOe char(3),
fechaActa timestamp,
codCurso char(2),
codAsig VARCHAR(6),
codProf char(3),
PRIMARY KEY(codOe,fechaActa, codCurso, codAsig),
CONSTRAINT FK_CodOeYCurso FOREIGN KEY (codOe,fechaActa, codCurso)
REFERENCES curso(codOe,fechaActa,codCurso) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodAsig FOREIGN KEY (codAsig)
REFERENCES asignatura(codAsig) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodProf FOREIGN KEY (codProf)
REFERENCES profesor(codProf) ON DELETE RESTRICT ON UPDATE CASCADE);

CREATE TABLE horario(
codOe char(3),
fechaActa timestamp,
codCurso char(2),
codAsig varchar(6),
codTramo char(2),
PRIMARY KEY(codOe,fechaActa, codCurso, codAsig, codTramo),
CONSTRAINT FK_CodOeCurso FOREIGN KEY (codOe,fechaActa, codCurso)
REFERENCES Curso(codOe,fechaActa,codCurso) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodAsignatura FOREIGN KEY (codAsig)
REFERENCES Asignatura(codAsig) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_CodTramo FOREIGN KEY (codTramo)
REFERENCES TramoHorario(codTramo) ON DELETE CASCADE ON UPDATE CASCADE);
