<?php 
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();
}
header('Content-Type: application/json');

include ("conexion.php");

$query_fetch =  "select * from persona as p inner join direccion as d on p.idpersona = d.idpersona"; 

if (!$resultado = $conexion->query($query_fetch)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $query_fetch . "\n";
    echo "Errno: " . $conexion->errno . "\n";
    echo "Error: " . $conexion->error . "\n";
    exit;
}

    $delimiter = ";";
    $filename = "suscriptores_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');

   //set column headers
	$fields = array('idpersona', 
					'mail', 
					'apellido', 
					'nombre', 
					'is_motivar_digital', 
					'is_motivar_impreso', 
					'is_dosmasd_digital', 
					'is_dosmasd_impreso', 
					'is_profesional', 
					'tipo_profesional', 
					'tipo_prof_otro', 
					'is_estudiante', 
					'carrera', 
					'institucion', 
					'tipo_empresa', 
					'area', 
					'area_otra', 
					'cargo', 
					'cargo_otro', 
					'act_principal', 
					'tipo_actividad', 
					'relacion', 
					'is_animal_peq', 
					'is_animal_gde', 
					'tipo_animal_gde', 
					'comentario', 
					'iddireccion', 
					'calle', 
					'numero', 
					'piso', 
					'codigo_postal', 
					'localidad', 
					'partido', 
					'provincia', 
					'pais', 
					'comentario');

    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while($registro = $resultado->fetch_assoc()){
        // $status = ($row['status'] == '1')?'Active':'Inactive';
        // $lineData = array($row['id'], $row['name'], $row['email'], $row['phone'], $row['created'], $status);
        $lineData = $registro;

        fputcsv($f, $lineData, $delimiter);
    }    

    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);



$conexion->close();

?>