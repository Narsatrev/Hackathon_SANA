<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $datos_paciente['nombre']?>
        </title>
        <script src="frameworks/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/grid.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/version.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/detector.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/formatinf.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/errorlevel.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/bitmat.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/datablock.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/bmparser.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/datamask.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/rsdecoder.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/gf256poly.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/gf256.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/decoder.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/qrcode.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/findpat.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/alignpat.js"></script>
        <script type="text/javascript" src="frameworks/js-qr/databr.js"></script>
        <script type="text/javascript" src="frameworks/js-qr-gen/qrcode.js"></script>
        <meta charset="utf-8"/>
    </head>
<?php
    $db_hostname='localhost';
    $db_username='root';
    $db_password='';
    $db_name='InfogericQR';

$id_paciente=$_POST['id_paciente'];

$conexion=mysqli_connect($db_hostname,$db_username,$db_password,$db_name) OR die ('No se pudo   conectar a la base de datos:'.mysqli_error());
    $paciente=mysqli_query($conexion,"SELECT * from paciente WHERE id='$id_paciente'");
    $n=mysqli_num_rows($paciente);
    if(!$n>0){
        echo "El paciente no existe";
    }

//recuperar datos del contacto
    $datos_paciente=mysqli_fetch_assoc($paciente);                
?>

    <body>
        Nombre:
        <?php echo $datos_paciente['nombre']?><br/>
        Edad:
        <?php echo $datos_paciente['edad']?><br/>
        Sexo:
        <?php echo $datos_paciente['sexo']?><br/>
        Tipo de sangre:
        <?php echo $datos_paciente['tipo_sangre']?><br/>
        Peso:
        <?php echo $datos_paciente['peso']?><br/>
        Talla:
        <?php echo $datos_paciente['talla']?><br/>
        Tabaquismo:
        <?php echo $datos_paciente['tabaquismo']?><br/>
        Escolaridad (años):
        <?php echo $datos_paciente['escolaridad']?><br/>
        Estado civil:
        <?php echo $datos_paciente['estado_civil']?><br/>
        Número de medicamentos:
        <?php echo $datos_paciente['numero_medicamentos']?><br/>
        Última actualización de medicamentos:
        <?php echo $datos_paciente['fecha_actual_medicamentos']?><br/>
        Dirección:
        <?php echo $datos_paciente['direccion']?><br/>
        
        Contacto:
        <?php
        //traer datos contacto!!
        echo $datos_paciente['contacto']
        ?><br/>
        Estado Nutricional:
        <?php echo $datos_paciente['estado_nutricional']?><br/>
        Seguro social:
        <?php echo $datos_paciente['seguro_social']?><br/>
        Datos medicos:
        <?php echo $datos_paciente['datos_medicos']?><br/>
        Descripción anexo:
        <?php echo $datos_paciente['descripcion_anexo']?><br/>
        Auxiliar:
        <?php echo $datos_paciente['auxiliar']?><br/>
        
        <div id='qrcode_paciente'></div>
        
        <script>
            var qrcode = new QRCode(document.getElementById("qrcode_paciente"), {
	           width : 100,
	           height : 100
            });
            qrcode.makeCode(window.location.href);
        </script>
        
        
    </body>
</html>
