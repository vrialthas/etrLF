<html lang="es">
	<head> 
		<title>TEST ETR</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		
	</head>
	<body>

		<section class="text-center" >
			<input type="file" id="archivoInput" onchange="return Ext()" />
			<br><br>
			<div>
                <textarea id="visorArchivo"></textarea>
			</div>
		</section>

</body>
</html>
<script type="text/javascript">

function Ext()
{
    var archivoInput = document.getElementById('archivoInput');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.html|.css|.js|.php)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('No es válido');
        archivoInput.value = '';
        return false;
    }

    else
    {
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('visorArchivo').innerHTML = 
                '<embed src="'+e.target.result+'" width="500" height="375" />';
            };
            visor.readAsText(archivoInput.files[0]);
            //visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>