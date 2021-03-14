CREATE TABLE sus_usuario_gral (
sug_id int(11) DEFAULT NULL,
sug_nombre varchar(120) DEFAULT NULL,
sug_apellido varchar(120) DEFAULT NULL,
sug_nacimiento date DEFAULT NULL,
sug_dni int(11) DEFAULT NULL,
sug_actualizacion timestamp DEFAULT CURRENT_TIMESTAMP
sug_ejemplos varchar(120) DEFAULT NULL,
sug_comentario_aideas_1 varchar(120) DEFAULT NULL,
sug_comentario_aideas_2 varchar(120) DEFAULT NULL,
sug_correo_1 varchar(120) DEFAULT NULL,
sug_correo_2 varchar(120) DEFAULT NULL,
sug_telefono_1 int(11) DEFAULT NULL,
sug_telefono_2 int(11) DEFAULT NULL,
sug_celular int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_correo_postal (
scp_id int(11) DEFAULT NULL,
scp_tipo int(11) DEFAULT NULL,
scp_calle varchar(120) DEFAULT NULL,
scp_numero int(11) DEFAULT NULL,
scp_piso_dto varchar(120) DEFAULT NULL,
scp_cp int(11) DEFAULT NULL,
scp_partido int(11) DEFAULT NULL,
scp_ciudad varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_info_profesional (
sip_id int(11) DEFAULT NULL,
sip_profesional tinyint(1) DEFAULT NULL,
sip_carrera int(11) DEFAULT NULL,
sip_institucion int(11) DEFAULT NULL,
sip_empresa varchar(120) DEFAULT NULL,
sip_actividad_empresa int(11) DEFAULT NULL,
sip_area_empresa int(11) DEFAULT NULL,
sip_cargo int(11) DEFAULT NULL,
sip_web varchar(120) DEFAULT NULL,
sip_independiente tinyint(1) DEFAULT NULL,
sip_actividad_veterinaria int(11) DEFAULT NULL,
sip_industria_ditribuidos tinyint(1) DEFAULT NULL,
sip_produccion_agropecuaria tinyint(1) DEFAULT NULL,
sip_dueno_empleado tinyint(1) DEFAULT NULL,
sip_pequenos_animales tinyint(1) DEFAULT NULL,
sip_grandes_animales tinyint(1) DEFAULT NULL,
sip_confin_pets tinyint(1) DEFAULT NULL,
sip_comentarios varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_intereses (
sin_id int(11) DEFAULT NULL,
sin_descripcions varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_intereses_usuarios (
siu_id int(11) DEFAULT NULL,
siu_suscripto int(11) DEFAULT NULL,
siu_intereses int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_suscripciones (
ssu_id int(11) DEFAULT NULL,
ssu_motivar_digital tinyint(1) DEFAULT NULL, 
ssu_2_2_digital tinyint(1) DEFAULT NULL,
ssu_motivar_impreso tinyint(1) DEFAULT NULL,
ssu_2_2_impreso tinyint(1) DEFAULT NULL,
ssu_forma_envio varchar(100) DEFAULT NULL,
ssu_fuentes varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_planificacion_envios (
spe_id int(11) DEFAULT NULL,
spe_enero tinyint(1) DEFAULT NULL,
spe_febrero tinyint(1) DEFAULT NULL,
spe_marzo tinyint(1) DEFAULT NULL,
spe_abril tinyint(1) DEFAULT NULL,
spe_mayo tinyint(1) DEFAULT NULL,
spe_junio tinyint(1) DEFAULT NULL,
spe_julio tinyint(1) DEFAULT NULL,
spe_agosto tinyint(1) DEFAULT NULL,
spe_septiembre tinyint(1) DEFAULT NULL,
spe_octubre tinyint(1) DEFAULT NULL,
spe_noviembre tinyint(1) DEFAULT NULL,
spe_diciembre tinyint(1) DEFAULT NULL,
spe_civa int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_instituciones (
sit_id int(11) DEFAULT NULL,
sit_nombre varchar(50) DEFAULT NULL
sit_pais int(11) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_carreras (
sca_id int(11) DEFAULT NULL,
sca_nombre varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_areas (
sar_id int(11) DEFAULT NULL,
sar_nombre varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_cargos (
scr_id int(11) DEFAULT NULL,
scr_nombre varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE sus_area_veterinanria (
sav_id int(11) DEFAULT NULL,
sav_nombre varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE `sus_usuario_gral`
  ADD PRIMARY KEY (`sug_id`);
ALTER TABLE `sus_correo_postal`
  ADD PRIMARY KEY (`scp_id`);
ALTER TABLE `sus_info_profesional`
  ADD PRIMARY KEY (`sip_id`);
ALTER TABLE `sus_intereses`
  ADD PRIMARY KEY (`sin_id`);
ALTER TABLE `sus_intereses_usuarios`
  ADD PRIMARY KEY (`siu_id`);
ALTER TABLE `sus_suscripciones`
  ADD PRIMARY KEY (`ssu_id`);
ALTER TABLE `sus_planificacion_envios`
  ADD PRIMARY KEY (`spe_id`);
ALTER TABLE `sus_instituciones`
  ADD PRIMARY KEY (`sit_id`);
ALTER TABLE `sus_carreras`
  ADD PRIMARY KEY (`sca_id`);
ALTER TABLE `sus_areas`
  ADD PRIMARY KEY (`sar_id`);
ALTER TABLE `sus_cargos`
  ADD PRIMARY KEY (`scr_id`);
ALTER TABLE `sus_area_veterinanria`
  ADD PRIMARY KEY (`sav_id`);

ALTER TABLE `sus_usuario_gral`
  MODIFY `sug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_correo_postal`
  MODIFY `scp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_info_profesional`
  MODIFY `sip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_intereses`
  MODIFY `sin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_intereses_usuarios`
  MODIFY `siu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_suscripciones`
  MODIFY `ssu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_planificacion_envios`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_instituciones`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_carreras`
  MODIFY `sca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_areas`
  MODIFY `sar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_cargos`
  MODIFY `scr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
ALTER TABLE `sus_area_veterinanria`
  MODIFY `sav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


  CREATE TABLE sus_profesion (
sup_id int(11) DEFAULT NULL,
sup_nombre varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `sus_profesion`
  ADD PRIMARY KEY (`sup_id`);
ALTER TABLE `sus_profesion`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

INSERT INTO `sus_profesion`(`sup_nombre`) VALUES 
('Veterinario'),
('Médico Veterinario'),
('Ingeniero Agronomo'),
('Ingeniero Zootecnista'),
('Otro')

INSERT INTO `sus_carreras`(`sca_nombre`) VALUES 
('Abogacía'),
('Accidentología Vial'),
('Acompañante Terapéutico'),
('Actividad física y deportiva'),
('Actor de Teatro, cine y TV'),
('Actor y Director de Artes Escénicas'),
('Actuación'),
('Actuario'),
('Acuicultura'),
('Administración'),
('Administración Aduanera - Despachante de Aduana'),
('Administración Aeronáutica'),
('Administración Agropecuaria'),
('Administración Ambiental'),
('Administración Bancaria'),
('Administración de Agencias de Viajes y Turismo'),
('Agente de Viajes y Turismo'),
('Administración de Bienes Culturales'),
('Administración de Recursos Humanos'),
('Administración de Salud'),
('Administración y Sistemas'),
('Artes Electrónicas'),
('Biodiversidad'),
('Bioinformática'),
('Bioingeniería'),
('Administración de Servicios de Salud'),
('Administración Hotelera'),
('Agrimensura'),
('Agronomía'),
('Análisis de sistemas'),
('Antropología'),
('Archivología'),
('Arquitectura'),
('Arte Dramático (Teatro)'),
('Artes Audiovisuales'),
('Artes Electrónicas'),
('Artes Plásticas'),
('Artes y Ciencias del Teatro'),
('Asesor - Asesoramiento en Imagen'),
('Asesor en Imagen Corporativa'),
('Asistente en Administración Hotelera'),
('Asistente en Ceremonial y Organización'),
('Astronomía'),
('Aviación'),
('Azafata'),
('Bellas Artes'),
('Bibliotecología'),
('Bibliotecología y Ciencias de la Información'),
('Bioinformática'),
('Bioingeniería'),
('Bioquímica'),
('Biotecnología'),
('Bioterio'),
('Bromatología'),
('Calígrafo público '),
('Ciencia Política'),
('Ciencias Ambientales'),
('Canto'),
('Chef Internacional'),
('Ciencia y Tecnología de los Alimentos'),
('Ciencias Ambientales'),
('Ciencias del Gobierno'),
('Composición con Medios Electroacústicos'),
('Creatividad Educativa '),
('Criminalística'),
('Ciencias Antropológicas'),
('Ciencias biológicas'),
('Ciencias de la Atmósfera'),
('Ciencias de la Computación'),
('Ciencias de la Comunicación'),
('Ciencias de la Educación'),
('Ciencias Físicas'),
('Ciencias Geológicas'),
('Ciencias Matemáticas'),
('Ciencias Políticas'),
('Ciencias Químicas'),
('Ciencias Veterinarias'),
('Cine - Dirección Cinematográfica'),
('Cocinero'),
('Comercio Internacional'),
('Comisarios de a Bordo y Azafata'),
('Compaginación Cinematográfica'),
('Comunicación Publicitaria'),
('Contador Público'),
('Cosmetología, Cosmiatría y Estética'),
('Counseling'),
('Crítica Cinematográfica'),
('Danza'),
('Dermatocosmiatría'),
('Despachante de Aeronaves'),
('Diagnóstico por Imágenes'),
('Dibujante asistido por Computadora'),
('Diseño Asistido'),
('Dirección de cine'),
('Dirección de Fotografía'),
('Dirección Teatral'),
('Diseño Asistido'),
('Diseño de Animaciones y Dibujos Animados'),
('Diseño de Espectáculos'),
('Diseño de Historietas'),
('Diseño de Imagen Empresaria'),
('Diseño de Imagen y Sonido '),
('Diseño de Indumentaria y Textil'),
('Diseño de Indumentaria con Tecnología Digital aplicada'),
('Diseño de Información'),
('Diseño de Interiores - Decorador de Interiores'),
('Diseño de Interiores y Equipamiento'),
('Diseño de Joyas'),
('Diseño de Mobiliario'),
('Diseño de Modas'),
('Diseño de Packaging'),
('Diseño de Parques y Jardines'),
('Diseño de Productos, Orientación Indumentaria'),
('Diseño de Sitios Web'),
('Diseño del Espacio Escénico'),
('Diseño del Paisaje'),
('Diseño en Animación y Efectos Visuales'),
('Diseño en Comunicación Visual'),
('Diseño Escenográfico'),
('Diseño Fotográfico'),
('Diseño Gráfico'),
('Diseño Gráfico Multimedial'),
('Diseño Gráfico Publicitario'),
('Diseño Industrial'),
('Diseño Informático Editorial'),
('Diseño Multimedial'),
('Diseño Textil e Indumentaria'),
('Ecología Urbana'),
('Enología y Viticultura '),
('Estadística'),
('Estudios Orientales'),
('Genética'),
('Diseño Web'),
('Diseño y Programación de Simuladores Virtuales'),
('Ecología'),
('Economía y Administración de la Pequeña y Mediana Empresa'),
('Economía'),
('Economía y Administración Agraria'),
('Edición'),
('Enfermería '),
('Farmacia'),
('Filosofía'),
('Enfermero Universitario'),
('Floricultura'),
('Fonoaudiología'),
('Fotografía'),
('Gastronomía'),
('Geografía'),
('Gestión Cultural y Emprendimientos Culturales'),
('Gestión de Agroalimentos'),
('Gestión y Administración Municipal'),
('Grafología'),
('Guionista cinematográfico'),
('Guionista Cinematográfico'),
('Guionista de Radio y TV'),
('Hemoterapia'),
('Historia'),
('Humanística y Ceremonial'),
('Iluminación Cinematográfica'),
('Iluminación y Cámara Cinematográficas'),
('Ingeniería Civil'),
('Ingeniería de Alimentos'),
('Ingeniería Electricista'),
('Ingeniería Electrónica'),
('Ingeniería en Agrimensura'),
('Ingeniería en Informática'),
('Ingeniería en Alimentos'),
('Ingeniería en Automatización y Control Industrial'),
('Ingeniería en Ecología'),
('Ingeniería en Materiales'),
('Ingeniería en Seguridad e Higiene en el Trabajo'),
('Ingeniería Zootecnista'),
('Martillero y Corredor Público'),
('Oceanografía'),
('Organización de la Producción'),
('Ingeniería en Ecología'),
('Ingeniería Mecánica'),
('Ingeniería Naval y Mecánica'),
('Ingeniería Química'),
('Kinesiología y Fisiatría'),
('Letras'),
('Instrumentación Quirúrgica'),
('Jardinería'),
('Locutor Integral de Radio y TV'),
('Manejo de Áreas Protegidas'),
('Martillero y Corredor Público Rural'),
('Medicina'),
('Meteorólogo'),
('Musicoterapia'),
('Nutrición'),
('Observador Meteorológico'),
('Obstetricia'),
('Oceanografía'),
('Odontología'),
('Operador Técnico de Estudio y Planta Transmisora de Radiodifusión'),
('Óptico Técnico'),
('Organización de Eventos'),
('Paleontología'),
('Periodismo y Comunicación'),
('Piloto Privado y Comercial de Avión'),
('Podólogo Universitario'),
('Producción de Bioimágenes'),
('Producción Vegetal'),
('Psicomotricidad'),
('Relaciones Laborales - Recursos Humanos'),
('Salud Ambiental'),
('Seguridad Ciudadana'),
('Producción Vegetal Orgánica'),
('Producción y Dirección de Radio y TV'),
('Producción de Medios Audiovisuales, Eventos y Espectáculos'),
('Producción y Dirección de Televisión, Cine y Radio'),
('Profesorado en Artes Plásticas'),
('Profesorado en Ciencias Económicas'),
('Profesorado en Comunicación Social'),
('Profesorado en Portugués'),
('Programador de Sistemas'),
('Psicología'),
('Psicología Social'),
('Psicomotricidad'),
('Psicopedagogía'),
('Publicidad'),
('Relaciones del Trabajo '),
('Salud Ambiental'),
('Seguridad Vial y Transporte'),
('Tecnología Educativa'),
('Sistemas de Información de las Organizaciones'),
('Sociología'),
('Teatro'),
('Tecnicatura Universitaria en Web'),
('Tecnología en Alimentos'),
('Terapia Ocupacional'),
('Trabajo Social'),
('Traductorado Público'),
('Tripulante de Cabina de Pasajeros'),
('Turismo'),
('Vestuarista'),
('Visitador Medico - Agente de Propaganda medica'),
('Web'),
('Yoga')


INSERT INTO `sus_instituciones`(sit_nombre , sit_pais) VALUES 
('UBA - Posgrados de Ciencias Veterinarias', 9 ),
('UNNE - Universidad Nacional del Nordeste', 9 ),
('UNR - Universidad Nacional de Rosario', 9 ),
('UNL - Universidad Nacional del Litoral', 9 ),
('UNMdP - Universidad Nacional de Mar del Plata', 9 ),
('USAL - Universidad del Salvador', 9 ),
('UNLP - Universidad Nacional de la Plata', 9 ),
('UNICEN - Universidad Nacional del Centro de la Provincia de Buenos Aires', 9 ),
('UNRC - Universidad Nacional de Río Cuarto', 9 ),
('UMAZA - Universidad Maza', 9 ),
('UNC - Universidad Nacional de Córdoba', 9 ),
('UCC - Universidad Católica de Córdoba', 9 ),
('UCASAL - Universidad Católica de Salta', 9 ),
('Profesional Schools', 9 ),
('ISTM - Instituto Superior de Tecnología Médica', 9 ),
('UNLVirtual - Universidad Nacional del Litoral', 9 ),
('UNVM - Universidad Nacional de Villa María', 9 ),
('UNT - Universidad Nacional de Tucumán', 9 ),
('UNLaR - Universidad Nacional de La Rioja', 9 ),
('UNLPam - Universidad Nacional de la Pampa', 9 ),
('UNaF - Universidad Nacional de Formosa', 9 ),
('UCCuyo - Universidad Católica de Cuyo', 9 ),
('UBA - Universidad de Buenos Aires', 9 ),
('UBA - Posgrados de Agronomía', 9 ),
('UDELAR - Universidad de la República', 186 ),
('Profesional Schools Uruguay', 186 ),
('SCC - Instituto st. clare´s college', 186 ),
('CPCS - Centro Politécnico del Cono Sur', 186 ),
('UDE - Universidad de la Empresa', 186 ),
('UV - Universidad Veracruzana', 117 ),
('UANL - Universidad Autónoma de Nuevo León', 117 ),
('UAAAN - Universidad Autónoma Agraria Antonio Narro', 117 ),
('UBJ - Universidad Benito Juárez', 117 ),
('UAN - Universidad Autónoma de Nayarit', 117 ),
('UNAM - Universidad Nacional Autónoma de México', 117 ),
('BUAP - Benemérita Universidad Autónoma de Puebla', 117 ),
('UMA - Universidad Mesoamericana', 117 ),
('ULSA - Universidad La Salle Noroeste', 117 ),
('UJED - Universidad Juárez del Estado de Durango', 117 ),
('UAEM - Universidad Autónoma del Estado de México', 117 ),
('UAG - Universidad Autónoma de Guerrero', 117 ),
('IESCH - Instituto de Estudios Superiores de Chiapas', 117 ),
('UATX - Universidad Autónoma de Tlaxcala', 117 ),
('UAQ - Universidad Autónoma de Querétaro', 117 ),
('UAM - Universidad Autónoma Metropolitana', 117 ),
('UABJO - Universidad Autónoma de Benito Juárez Oaxaca', 117 ),
('UAZ - Universidad Autónoma Zacatecas', 117 ),
('ITSON - Instituto Tecnológico de Sonora', 117 ),
('UADY - Universidad Autónoma de Yucatán', 117 ),
('UPAEP - Universidad Popular Autónoma del Estado de Puebla', 117 ),
('UAT - Universidad Autónoma de Tamaulipas', 117 ),
('UNPA - Universidad del Papaloapan', 117 ),
('UNAD - Universidad Nacional Abierta y a Distancia', 42 ),
('UDEA - Universidad de Antioquia', 42 ),
('UNAL - Universidad Nacional de Colombia', 42 ),
('CENAL - Centro Nacional de Capacitación Laboral', 42 ),
('JDC - Fundación Universitaria Juan de Castellanos', 42 ),
('LASALLISTA - Corporación Universitaria Lasallista', 42 ),
('UCALDAS - Universidad de Caldas', 42 ),
('UAN - Universidad Antonio Nariño', 42 ),
('UDES - Universidad de Santander', 42 ),
('UAM - Fundación Universitaria Autónoma de las Américas', 42 ),
('Universidad CES', 42 ),
('UNILLANOS - Universidad de Los Llanos', 42 ),
('UNISYSTEM - Corporación Unisystem de Colombia', 42 ),
('CIANDCO - Centro de Investigación & Capacitación Odontológica', 42 ),
('CORHUILA - Corporación Universitaria del Huila', 42 ),
('UTP - Universidad Tecnológica de Pereira', 42 ),
('UT - Universidad del Tolima', 42 ),
('UNIAGRARIA - Fundación Universitaria Agraria de Colombia', 42 ),
('REMINGTON - Corporación Universitaria Remington', 42 ),
('UDEC - Universidad de Cundinamarca', 42 ),
('UNIPAZ - Instituto Universitario de la Paz', 42 ),
('UNIPAMPLONA - Universidad de Pamplona', 42 ),
('UCC - Universidad Cooperativa de Colombia', 42 ),
('UNISALLE - Universidad de La Salle', 42 ),
('UIS - Universidad Industrial de Santander', 42 ),
('UNISARC - Universidad Santa Rosa de Cabal', 42 ),
('UPTC - Universidad Pedagógica y Tecnológica de Colombia', 42 ),
('UAX - Universidad Alfonso X el Sabio', 59 ),
('USC - Universidade de Santiago de Compostela', 59 ),
('ULPGC - Universidad de Las Palmas de Gran Canaria', 59 ),
('UM - Universidad de Murcia', 59 ),
('Distribuciones Cj', 59 ),
('UCM - Universidad Complutense de Madrid', 59 ),
('UNIZAR - Universidad de Zaragoza', 59 ),
('ULE - Universidad de León', 59 ),
('CCC - CCC Centro de Estudios', 59 ),
('UEx - Universidad de Extremadura', 59 ),
('UNC - Universidad Nacional de Cajamarca', 139 ),
('UNALM - Universidad Nacional Agraria La Molina', 139 ),
('UPCH - Universidad Peruana Cayetano Heredia', 139 ),
('Profesional Schools', 139 ),
('UCSUR - Universidad Científica del Sur', 139 ),
('UCSM - Universidad Católica de Santa María', 139 ),
('UAP - Universidad Alas Peruanas', 139 ),
('UST - Universidad Santo Tomás', 38 ),
('Universidad de Chile', 38 ),
('IPVC - Instituto Profesional Valle Central', 38 ),
('UNAB - Universidad Andrés Bello', 38 ),
('UdeC - Universidad de Concepción', 38 ),
('Universidad del Mar', 38 ),
('UDLA - Universidad de Las Américas', 38 ),
('DUOC - Duoc UC', 38 ),
('Universidad Pedro De Valdivia', 38 ),
('Universidad San Sebastián', 38 ),
('IDMA - Centro de Formación Técnica del Medio Ambiente', 38 ),
('UACH - Universidad Austral de Chile', 38 ),
('La Ibero - Universidad Iberoamericana de Ciencias y Tecnología', 38 ),
('UPACÍFICO - Universidad del Pacífico', 38 ),
('UVM - Universidad de Viña del Mar', 38 ),
('UAC - Universidad de Aconcagua', 38 ),
('UCT - Universidad Católica de Temuco', 38 ),
('UC - Pontificia Universidad Católica de Chile', 38 ),
('Universidad Columbia', 138 ),
('Universidad Comunera del Paraguay', 138 ),
('CBM - Centro Universitário Barão de Mauá', 26 ),
('Centro Universitário Moura Lacerda', 26 ),
('Centro Universitário Unilton Lins', 26 ),
('CESCAGE - Centro de Ensino Superior dos Campos Gerais', 26 ),
('CESUMAR - Centro Universitário de Maringá', 26 ),
('ESBAM - Escola Superior Batista do Amazonas', 26 ),
('Estácio', 26 ),
('FAA - Fundação Educacional Dom André Arcoverde', 26 ),
('Faculdade Anhanguera', 26 ),
('FAG - Faculdade Assis Gurgacz', 26 ),
('FIO - Faculdades Integradas de Ourinhos', 26 ),
('FTC - Faculdade de Tecnologia e Ciências', 26 ),
('FURB - Universidade de Blumenau', 26 ),
('PUC Goiás - Pontifícia Universidade Católica de Goiás', 26 ),
('UEFS - Universidade Estadual de Feira de Santana', 26 ),
('UFCG - Universidade Federal de Campina Grande', 26 ),
('UFPel - Universidade Federal de Pelotas', 26 ),
('UFRGS - Universidade Federal do Rio Grande do Sul', 26 ),
('UFSJ - Universidade Federal de São João del-Rei', 26 ),
('ULBRA - Universidade Luterana do Brasil', 26 ),
('UMB - Centro Universitário de Barra Mansa', 26 ),
('UNESC - Centro Universitário do Espírito Santo', 26 ),
('UNIC - UNIC', 26 ),
('UnICESP - Universidade ICESP', 26 ),
('UNIDESC - Centro Universitário de Desenvolvimento do Centro-Oeste', 26 ),
('UNIFESO - Centro Universitário Serra dos Órgãos', 26 ),
('UniFil', 26 ),
('UNIFRAN - Universidade de Franca', 26 ),
('UNIJUÍ - Universidade Regional do Noroeste do Estado do Rio Grande do Sul', 26 ),
('Unime', 26 ),
('UNIMES - Universidade Metropolitana de Santos', 26 ),
('Unimonte', 26 ),
('UNIP - Universidade Paulista', 26 ),
('UNIPÓS - Pós-graduação e Educação Continuada Dr. Lester Pontes de Menezes', 26 ),
('UNIRP - Centro Universitário de Rio Preto', 26 ),
('UNISA - Universidade de Santo Amaro', 26 ),
('UNISO - Universidade de Sorocaba', 26 ),
('UNIVAG - Centro Universitário de Várzea Grande', 26 ),
('Universidade Anhembi Morumbi', 26 ),
('Universidade UNIGRANRIO', 26 ),
('Unoeste - Universidade do Oeste Paulista', 26 ),
('UNOPAR - Universidade Norte do Paraná', 26 ),
('UPF - Universidade de Passo Fundo', 26 ),
('USP - Universidade de São Paulo', 26 ),
('USS - Universidade Severino Sombra', 26 ),
('UTP - Universidade Tuiuti do Paraná', 26 ),
('UVV - Centro Universitário Vila Velha', 26 ),
('Profesional Schools', 52 ),
('UAGRARIA - Universidad Agraria del Ecuador', 52 ),
('UCE - Universidad Central del Ecuador', 52 ),
('UCSG - Universidad Católica de Santiago de Guayaquil', 52 ),
('UDLA - Universidad de las Américas', 52 ),
('UEB - Universidad Estatal de Bolivar', 52 ),
('UNL - Universidad Nacional de Loja', 52 ),
('UPS - Universidad Politénica Salesiana', 52 ),
('USFQ - Universidad San Francisco de Quito', 52 ),
('UTC - Universidad Técnica de Cotopaxi', 52 ),
('UTMACH - Universidad Tecnica de Machala', 52 ),
('UCV - Universidad Central de Venezuela', 189 ),
('UCLA - Universidad Centroccidental Lisandro Alvarado', 189 )

INSERT INTO `sus_areas`(sar_nombre) VALUES 
('Desarrollo'),
('Investigación'),
('Producción'),
('Control de Calidad'),
('Empaque / Envases'),
('Ingeniería'),
('Mantenimiento'),
('Dirección'),
('Ventas'),
('Compras'),
('Importación / Exportación'),
('Marketing'),
('Logística'),
('Cuidado del Medio Ambiente'),
('Comunicación'),
('Arquitectura e Instalaciones'),
('Otra')

INSERT INTO `sus_cargos`(scr_nombre) VALUES 
('Veterinario'),
('Veterinario Auxiliar'),
('Dueño / Empresario'),
('Presidente / Director / Gerente General'),
('Gerente'),
('Jefe de Area'),
('Asistente'),
('Operario'),
('Independiente'),
('Estudiante'),
('Empleado'),
('Otro')



INSERT INTO `sus_intereses`(sin_descripcions) VALUES 
('Información del sector de la sanidad animal en argentina'),
('Información técnica'),
('Conocer nuevos productos / proveedores'),
('Cursos y capacitación'),
('Networking / Eventos')