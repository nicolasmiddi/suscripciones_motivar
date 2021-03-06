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
('M??dico Veterinario'),
('Ingeniero Agronomo'),
('Ingeniero Zootecnista'),
('Otro')

INSERT INTO `sus_carreras`(`sca_nombre`) VALUES 
('Abogac??a'),
('Accidentolog??a Vial'),
('Acompa??ante Terap??utico'),
('Actividad f??sica y deportiva'),
('Actor de Teatro, cine y TV'),
('Actor y Director de Artes Esc??nicas'),
('Actuaci??n'),
('Actuario'),
('Acuicultura'),
('Administraci??n'),
('Administraci??n Aduanera - Despachante de Aduana'),
('Administraci??n Aeron??utica'),
('Administraci??n Agropecuaria'),
('Administraci??n Ambiental'),
('Administraci??n Bancaria'),
('Administraci??n de Agencias de Viajes y Turismo'),
('Agente de Viajes y Turismo'),
('Administraci??n de Bienes Culturales'),
('Administraci??n de Recursos Humanos'),
('Administraci??n de Salud'),
('Administraci??n y Sistemas'),
('Artes Electr??nicas'),
('Biodiversidad'),
('Bioinform??tica'),
('Bioingenier??a'),
('Administraci??n de Servicios de Salud'),
('Administraci??n Hotelera'),
('Agrimensura'),
('Agronom??a'),
('An??lisis de sistemas'),
('Antropolog??a'),
('Archivolog??a'),
('Arquitectura'),
('Arte Dram??tico (Teatro)'),
('Artes Audiovisuales'),
('Artes Electr??nicas'),
('Artes Pl??sticas'),
('Artes y Ciencias del Teatro'),
('Asesor - Asesoramiento en Imagen'),
('Asesor en Imagen Corporativa'),
('Asistente en Administraci??n Hotelera'),
('Asistente en Ceremonial y Organizaci??n'),
('Astronom??a'),
('Aviaci??n'),
('Azafata'),
('Bellas Artes'),
('Bibliotecolog??a'),
('Bibliotecolog??a y Ciencias de la Informaci??n'),
('Bioinform??tica'),
('Bioingenier??a'),
('Bioqu??mica'),
('Biotecnolog??a'),
('Bioterio'),
('Bromatolog??a'),
('Cal??grafo p??blico??'),
('Ciencia Pol??tica'),
('Ciencias Ambientales'),
('Canto'),
('Chef Internacional'),
('Ciencia y Tecnolog??a de los Alimentos'),
('Ciencias Ambientales'),
('Ciencias del Gobierno'),
('Composici??n con Medios Electroac??sticos'),
('Creatividad Educativa??'),
('Criminal??stica'),
('Ciencias Antropol??gicas'),
('Ciencias biol??gicas'),
('Ciencias de la Atm??sfera'),
('Ciencias de la Computaci??n'),
('Ciencias de la Comunicaci??n'),
('Ciencias de la Educaci??n'),
('Ciencias F??sicas'),
('Ciencias Geol??gicas'),
('Ciencias Matem??ticas'),
('Ciencias Pol??ticas'),
('Ciencias Qu??micas'),
('Ciencias Veterinarias'),
('Cine - Direcci??n Cinematogr??fica'),
('Cocinero'),
('Comercio Internacional'),
('Comisarios de a Bordo y Azafata'),
('Compaginaci??n Cinematogr??fica'),
('Comunicaci??n Publicitaria'),
('Contador P??blico'),
('Cosmetolog??a, Cosmiatr??a y Est??tica'),
('Counseling'),
('Cr??tica Cinematogr??fica'),
('Danza'),
('Dermatocosmiatr??a'),
('Despachante de Aeronaves'),
('Diagn??stico por Im??genes'),
('Dibujante asistido por Computadora'),
('Dise??o Asistido'),
('Direcci??n de cine'),
('Direcci??n de Fotograf??a'),
('Direcci??n Teatral'),
('Dise??o Asistido'),
('Dise??o de Animaciones y Dibujos Animados'),
('Dise??o de Espect??culos'),
('Dise??o de Historietas'),
('Dise??o de Imagen Empresaria'),
('Dise??o de Imagen y Sonido??'),
('Dise??o de Indumentaria y Textil'),
('Dise??o de Indumentaria con Tecnolog??a Digital aplicada'),
('Dise??o de Informaci??n'),
('Dise??o de Interiores - Decorador de Interiores'),
('Dise??o de Interiores y Equipamiento'),
('Dise??o de Joyas'),
('Dise??o de Mobiliario'),
('Dise??o de Modas'),
('Dise??o de Packaging'),
('Dise??o de Parques y Jardines'),
('Dise??o de Productos, Orientaci??n Indumentaria'),
('Dise??o de Sitios Web'),
('Dise??o del Espacio Esc??nico'),
('Dise??o del Paisaje'),
('Dise??o en Animaci??n y Efectos Visuales'),
('Dise??o en Comunicaci??n Visual'),
('Dise??o Escenogr??fico'),
('Dise??o Fotogr??fico'),
('Dise??o Gr??fico'),
('Dise??o Gr??fico Multimedial'),
('Dise??o Gr??fico Publicitario'),
('Dise??o Industrial'),
('Dise??o Inform??tico Editorial'),
('Dise??o Multimedial'),
('Dise??o Textil e Indumentaria'),
('Ecolog??a Urbana'),
('Enolog??a y Viticultura??'),
('Estad??stica'),
('Estudios Orientales'),
('Gen??tica'),
('Dise??o Web'),
('Dise??o y Programaci??n de Simuladores Virtuales'),
('Ecolog??a'),
('Econom??a y Administraci??n de la Peque??a y Mediana Empresa'),
('Econom??a'),
('Econom??a y Administraci??n Agraria'),
('Edici??n'),
('Enfermer??a??'),
('Farmacia'),
('Filosof??a'),
('Enfermero Universitario'),
('Floricultura'),
('Fonoaudiolog??a'),
('Fotograf??a'),
('Gastronom??a'),
('Geograf??a'),
('Gesti??n Cultural y Emprendimientos Culturales'),
('Gesti??n de Agroalimentos'),
('Gesti??n y Administraci??n Municipal'),
('Grafolog??a'),
('Guionista cinematogr??fico'),
('Guionista Cinematogr??fico'),
('Guionista de Radio y TV'),
('Hemoterapia'),
('Historia'),
('Human??stica y Ceremonial'),
('Iluminaci??n Cinematogr??fica'),
('Iluminaci??n y C??mara Cinematogr??ficas'),
('Ingenier??a Civil'),
('Ingenier??a de Alimentos'),
('Ingenier??a Electricista'),
('Ingenier??a Electr??nica'),
('Ingenier??a en Agrimensura'),
('Ingenier??a en Inform??tica'),
('Ingenier??a en Alimentos'),
('Ingenier??a en Automatizaci??n y Control Industrial'),
('Ingenier??a en Ecolog??a'),
('Ingenier??a en Materiales'),
('Ingenier??a en Seguridad e Higiene en el Trabajo'),
('Ingenier??a Zootecnista'),
('Martillero y Corredor P??blico'),
('Oceanograf??a'),
('Organizaci??n de la Producci??n'),
('Ingenier??a en Ecolog??a'),
('Ingenier??a Mec??nica'),
('Ingenier??a Naval y Mec??nica'),
('Ingenier??a Qu??mica'),
('Kinesiolog??a y Fisiatr??a'),
('Letras'),
('Instrumentaci??n Quir??rgica'),
('Jardiner??a'),
('Locutor Integral de Radio y TV'),
('Manejo de ??reas Protegidas'),
('Martillero y Corredor P??blico Rural'),
('Medicina'),
('Meteor??logo'),
('Musicoterapia'),
('Nutrici??n'),
('Observador Meteorol??gico'),
('Obstetricia'),
('Oceanograf??a'),
('Odontolog??a'),
('Operador T??cnico de Estudio y Planta Transmisora de Radiodifusi??n'),
('??ptico T??cnico'),
('Organizaci??n de Eventos'),
('Paleontolog??a'),
('Periodismo y Comunicaci??n'),
('Piloto Privado y Comercial de Avi??n'),
('Pod??logo Universitario'),
('Producci??n de Bioim??genes'),
('Producci??n Vegetal'),
('Psicomotricidad'),
('Relaciones Laborales??- Recursos Humanos'),
('Salud Ambiental'),
('Seguridad Ciudadana'),
('Producci??n Vegetal Org??nica'),
('Producci??n y Direcci??n de Radio y TV'),
('Producci??n de Medios Audiovisuales, Eventos y Espect??culos'),
('Producci??n y Direcci??n de Televisi??n, Cine y Radio'),
('Profesorado en Artes Pl??sticas'),
('Profesorado en Ciencias Econ??micas'),
('Profesorado en Comunicaci??n Social'),
('Profesorado en Portugu??s'),
('Programador de Sistemas'),
('Psicolog??a'),
('Psicolog??a Social'),
('Psicomotricidad'),
('Psicopedagog??a'),
('Publicidad'),
('Relaciones del Trabajo??'),
('Salud Ambiental'),
('Seguridad Vial y Transporte'),
('Tecnolog??a Educativa'),
('Sistemas de Informaci??n de las Organizaciones'),
('Sociolog??a'),
('Teatro'),
('Tecnicatura Universitaria en Web'),
('Tecnolog??a en Alimentos'),
('Terapia Ocupacional'),
('Trabajo Social'),
('Traductorado P??blico'),
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
('UNRC - Universidad Nacional de R??o Cuarto', 9 ),
('UMAZA - Universidad Maza', 9 ),
('UNC - Universidad Nacional de C??rdoba', 9 ),
('UCC - Universidad Cat??lica de C??rdoba', 9 ),
('UCASAL - Universidad Cat??lica de Salta', 9 ),
('Profesional Schools', 9 ),
('ISTM - Instituto Superior de Tecnolog??a M??dica', 9 ),
('UNLVirtual - Universidad Nacional del Litoral', 9 ),
('UNVM - Universidad Nacional de Villa Mar??a', 9 ),
('UNT - Universidad Nacional de Tucum??n', 9 ),
('UNLaR - Universidad Nacional de La Rioja', 9 ),
('UNLPam - Universidad Nacional de la Pampa', 9 ),
('UNaF - Universidad Nacional de Formosa', 9 ),
('UCCuyo - Universidad Cat??lica de Cuyo', 9 ),
('UBA - Universidad de Buenos Aires', 9 ),
('UBA - Posgrados de Agronom??a', 9 ),
('UDELAR - Universidad de la Rep??blica', 186 ),
('Profesional Schools Uruguay', 186 ),
('SCC - Instituto st. clare??s college', 186 ),
('CPCS - Centro Polit??cnico del Cono Sur', 186 ),
('UDE - Universidad de la Empresa', 186 ),
('UV - Universidad Veracruzana', 117 ),
('UANL - Universidad Aut??noma de Nuevo Le??n', 117 ),
('UAAAN - Universidad Aut??noma Agraria Antonio Narro', 117 ),
('UBJ - Universidad Benito Ju??rez', 117 ),
('UAN - Universidad Aut??noma de Nayarit', 117 ),
('UNAM - Universidad Nacional Aut??noma de M??xico', 117 ),
('BUAP - Benem??rita Universidad Aut??noma de Puebla', 117 ),
('UMA - Universidad Mesoamericana', 117 ),
('ULSA - Universidad La Salle Noroeste', 117 ),
('UJED - Universidad Ju??rez del Estado de Durango', 117 ),
('UAEM - Universidad Aut??noma del Estado de M??xico', 117 ),
('UAG - Universidad Aut??noma de Guerrero', 117 ),
('IESCH - Instituto de Estudios Superiores de Chiapas', 117 ),
('UATX - Universidad Aut??noma de Tlaxcala', 117 ),
('UAQ - Universidad Aut??noma de Quer??taro', 117 ),
('UAM - Universidad Aut??noma Metropolitana', 117 ),
('UABJO - Universidad Aut??noma de Benito Ju??rez Oaxaca', 117 ),
('UAZ - Universidad Aut??noma Zacatecas', 117 ),
('ITSON - Instituto Tecnol??gico de Sonora', 117 ),
('UADY - Universidad Aut??noma de Yucat??n', 117 ),
('UPAEP - Universidad Popular Aut??noma del Estado de Puebla', 117 ),
('UAT - Universidad Aut??noma de Tamaulipas', 117 ),
('UNPA - Universidad del Papaloapan', 117 ),
('UNAD - Universidad Nacional Abierta y a Distancia', 42 ),
('UDEA - Universidad de Antioquia', 42 ),
('UNAL - Universidad Nacional de Colombia', 42 ),
('CENAL - Centro Nacional de Capacitaci??n Laboral', 42 ),
('JDC - Fundaci??n Universitaria Juan de Castellanos', 42 ),
('LASALLISTA - Corporaci??n Universitaria Lasallista', 42 ),
('UCALDAS - Universidad de Caldas', 42 ),
('UAN - Universidad Antonio Nari??o', 42 ),
('UDES - Universidad de Santander', 42 ),
('UAM - Fundaci??n Universitaria Aut??noma de las Am??ricas', 42 ),
('Universidad CES', 42 ),
('UNILLANOS - Universidad de Los Llanos', 42 ),
('UNISYSTEM - Corporaci??n Unisystem de Colombia', 42 ),
('CIANDCO - Centro de Investigaci??n & Capacitaci??n Odontol??gica', 42 ),
('CORHUILA - Corporaci??n Universitaria del Huila', 42 ),
('UTP - Universidad Tecnol??gica de Pereira', 42 ),
('UT - Universidad del Tolima', 42 ),
('UNIAGRARIA - Fundaci??n Universitaria Agraria de Colombia', 42 ),
('REMINGTON - Corporaci??n Universitaria Remington', 42 ),
('UDEC - Universidad de Cundinamarca', 42 ),
('UNIPAZ - Instituto Universitario de la Paz', 42 ),
('UNIPAMPLONA - Universidad de Pamplona', 42 ),
('UCC - Universidad Cooperativa de Colombia', 42 ),
('UNISALLE - Universidad de La Salle', 42 ),
('UIS - Universidad Industrial de Santander', 42 ),
('UNISARC - Universidad Santa Rosa de Cabal', 42 ),
('UPTC - Universidad Pedag??gica y Tecnol??gica de Colombia', 42 ),
('UAX - Universidad Alfonso X el Sabio', 59 ),
('USC - Universidade de Santiago de Compostela', 59 ),
('ULPGC - Universidad de Las Palmas de Gran Canaria', 59 ),
('UM - Universidad de Murcia', 59 ),
('Distribuciones Cj', 59 ),
('UCM - Universidad Complutense de Madrid', 59 ),
('UNIZAR - Universidad de Zaragoza', 59 ),
('ULE - Universidad de Le??n', 59 ),
('CCC - CCC Centro de Estudios', 59 ),
('UEx - Universidad de Extremadura', 59 ),
('UNC - Universidad Nacional de Cajamarca', 139 ),
('UNALM - Universidad Nacional Agraria La Molina', 139 ),
('UPCH - Universidad Peruana Cayetano Heredia', 139 ),
('Profesional Schools', 139 ),
('UCSUR - Universidad Cient??fica del Sur', 139 ),
('UCSM - Universidad Cat??lica de Santa Mar??a', 139 ),
('UAP - Universidad Alas Peruanas', 139 ),
('UST - Universidad Santo Tom??s', 38 ),
('Universidad de Chile', 38 ),
('IPVC - Instituto Profesional Valle Central', 38 ),
('UNAB - Universidad Andr??s Bello', 38 ),
('UdeC - Universidad de Concepci??n', 38 ),
('Universidad del Mar', 38 ),
('UDLA -??Universidad de Las Am??ricas', 38 ),
('DUOC - Duoc UC', 38 ),
('Universidad Pedro De Valdivia', 38 ),
('Universidad San Sebasti??n', 38 ),
('IDMA - Centro de Formaci??n T??cnica del Medio Ambiente', 38 ),
('UACH - Universidad Austral de Chile', 38 ),
('La Ibero - Universidad Iberoamericana de Ciencias y Tecnolog??a', 38 ),
('UPAC??FICO - Universidad del Pac??fico', 38 ),
('UVM - Universidad de Vi??a del Mar', 38 ),
('UAC - Universidad de Aconcagua', 38 ),
('UCT - Universidad Cat??lica de Temuco', 38 ),
('UC - Pontificia Universidad Cat??lica de Chile', 38 ),
('Universidad Columbia', 138 ),
('Universidad Comunera del Paraguay', 138 ),
('CBM - Centro Universit??rio Bar??o de Mau??', 26 ),
('Centro Universit??rio Moura Lacerda', 26 ),
('Centro Universit??rio Unilton Lins', 26 ),
('CESCAGE - Centro de Ensino Superior dos Campos Gerais', 26 ),
('CESUMAR - Centro Universit??rio de Maring??', 26 ),
('ESBAM - Escola Superior Batista do Amazonas', 26 ),
('Est??cio', 26 ),
('FAA - Funda????o Educacional Dom Andr?? Arcoverde', 26 ),
('Faculdade Anhanguera', 26 ),
('FAG - Faculdade Assis Gurgacz', 26 ),
('FIO - Faculdades Integradas de Ourinhos', 26 ),
('FTC - Faculdade de Tecnologia e Ci??ncias', 26 ),
('FURB - Universidade de Blumenau', 26 ),
('PUC Goi??s - Pontif??cia Universidade Cat??lica de Goi??s', 26 ),
('UEFS - Universidade Estadual de Feira de Santana', 26 ),
('UFCG - Universidade Federal de Campina Grande', 26 ),
('UFPel - Universidade Federal de Pelotas', 26 ),
('UFRGS - Universidade Federal do Rio Grande do Sul', 26 ),
('UFSJ - Universidade Federal de S??o Jo??o del-Rei', 26 ),
('ULBRA - Universidade Luterana do Brasil', 26 ),
('UMB - Centro Universit??rio de Barra Mansa', 26 ),
('UNESC - Centro Universit??rio do Esp??rito Santo', 26 ),
('UNIC - UNIC', 26 ),
('UnICESP - Universidade ICESP', 26 ),
('UNIDESC - Centro Universit??rio de Desenvolvimento do Centro-Oeste', 26 ),
('UNIFESO - Centro Universit??rio Serra dos ??rg??os', 26 ),
('UniFil', 26 ),
('UNIFRAN - Universidade de Franca', 26 ),
('UNIJU?? - Universidade Regional do Noroeste do Estado do Rio Grande do Sul', 26 ),
('Unime', 26 ),
('UNIMES - Universidade Metropolitana de Santos', 26 ),
('Unimonte', 26 ),
('UNIP - Universidade Paulista', 26 ),
('UNIP??S - P??s-gradua????o e Educa????o Continuada Dr. Lester Pontes de Menezes', 26 ),
('UNIRP - Centro Universit??rio de Rio Preto', 26 ),
('UNISA - Universidade de Santo Amaro', 26 ),
('UNISO - Universidade de Sorocaba', 26 ),
('UNIVAG - Centro Universit??rio de V??rzea Grande', 26 ),
('Universidade Anhembi Morumbi', 26 ),
('Universidade UNIGRANRIO', 26 ),
('Unoeste - Universidade do Oeste Paulista', 26 ),
('UNOPAR - Universidade Norte do Paran??', 26 ),
('UPF - Universidade de Passo Fundo', 26 ),
('USP - Universidade de S??o Paulo', 26 ),
('USS - Universidade Severino Sombra', 26 ),
('UTP - Universidade Tuiuti do Paran??', 26 ),
('UVV - Centro Universit??rio Vila Velha', 26 ),
('Profesional Schools', 52 ),
('UAGRARIA - Universidad Agraria del Ecuador', 52 ),
('UCE - Universidad Central del Ecuador', 52 ),
('UCSG - Universidad Cat??lica de Santiago de Guayaquil', 52 ),
('UDLA - Universidad de las Am??ricas', 52 ),
('UEB - Universidad Estatal de Bolivar', 52 ),
('UNL - Universidad Nacional de Loja', 52 ),
('UPS - Universidad Polit??nica Salesiana', 52 ),
('USFQ - Universidad San Francisco de Quito', 52 ),
('UTC - Universidad T??cnica de Cotopaxi', 52 ),
('UTMACH - Universidad Tecnica de Machala', 52 ),
('UCV - Universidad Central de Venezuela', 189 ),
('UCLA - Universidad Centroccidental Lisandro Alvarado', 189 )

INSERT INTO `sus_areas`(sar_nombre) VALUES 
('Desarrollo'),
('Investigaci??n'),
('Producci??n'),
('Control de Calidad'),
('Empaque / Envases'),
('Ingenier??a'),
('Mantenimiento'),
('Direcci??n'),
('Ventas'),
('Compras'),
('Importaci??n / Exportaci??n'),
('Marketing'),
('Log??stica'),
('Cuidado del Medio Ambiente'),
('Comunicaci??n'),
('Arquitectura e Instalaciones'),
('Otra')

INSERT INTO `sus_cargos`(scr_nombre) VALUES 
('Veterinario'),
('Veterinario Auxiliar'),
('Due??o / Empresario'),
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
('Informaci??n del sector de la sanidad animal en argentina'),
('Informaci??n t??cnica'),
('Conocer nuevos productos / proveedores'),
('Cursos y capacitaci??n'),
('Networking / Eventos')