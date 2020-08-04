<html lang="es">
	<head> 
		<title>TEST ETR</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="styl.css">
		
	</head>
	<body>

		<section class="text-center" >
			<input type="file" id="archivoInput" onchange="return Ext()" />
<br><br>
            <input type="button" value="Run" onclick="refresh()">
<br><br>
            <input type="text" id="filename">
<br>
    <button type="button" id="download-btn">
        Descargar archivo
    </button>
        </section>
			<div id="main">
                <textarea id="visorArchivo"></textarea>
                <iframe id="visor"></iframe>
                <input type="button" value="Run" onclick="refresh()">
			</div>
<!--     <div>
      <input type="button" id="bt" value="Save data to file" onclick="saveFile()" />
    </div>
-->

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
                '<embed src="'+e.target.result+'" />';
            };
            visor.readAsText(archivoInput.files[0]);
            //visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>

<script type="text/javascript">
    
    // Refrescar editor
function refresh() {
  var textContent = document.getElementById('visorArchivo').value;
  document.getElementById('visor').srcdoc = textContent;
}
</script>


<script>
    function download(filename, text) {
        var element = document.createElement('a');
        element.style.display = 'none';
    //Definir el tipo de dato
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    //Añade el atributo al link
        element.setAttribute('download', filename);
        document.body.appendChild(element);

    //Click simulado del link
        element.click();

        document.body.removeChild(element);
    }

    //Descarga del archivo
        document.getElementById("download-btn").addEventListener("click", function(){
            var text = document.getElementById("visorArchivo").value;
            var filename = document.getElementById("filename").value;

            download(filename, text);
        }, false);
    </script>





<!-- <script type="text/javascript">
    //Descargar el archivo del editor

 let saveFile = () => {
    //Datos del editor
    const edit = document.getElementById('visorArchivo');

    let data = edit.value;
//Transformar los datos
    const textToBLOB = new Blob([data], { type: 'text/plain' });
    const sFileName = 'formData.txt';

    let newLink = document.createElement("a");
        newLink.download = sFileName;

        if (window.webkitURL != null) {
            newLink.href = window.webkitURL.createObjectURL(textToBLOB);
        }
        else {
            newLink.href = window.URL.createObjectURL(textToBLOB);
            newLink.style.display = "none";
            document.body.appendChild(newLink);
        }

        newLink.click(); 
    }
</script>
-->