Vamos a subir un fichero


<form method="post" action="models/ficheros.php" enctype="multipart/form-data">

	<input type="file" name="nameInputFile" id="nameInputFile" accept="image/jpg, image/png"><br>

	<input type="text" name="txtAlt" id="txtAlt" value="Texto de la imagen"><br>

	<input type="submit" name="" value="Subir Fichero">

</form>

<form method="post" action="models/ficheros.php" enctype="multipart/form-data">
	Seleccionar varios ficheros <br>
	<input type="file" name="nameInputFile[]" id="" multiple="multiple">


	Seleccionar una carpeta <br>
	<input type="submit" value="Subir ficheros">

</form>