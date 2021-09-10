<h1>Nueva casa d'oficis</h1>

<input type="text" ng-model="nombre" placeholder="Nombre CO"><br>
<select ng-model="profeSelec">
	<option value="-1">--Selecciona Profesor</option>
	<option ng-repeat="profe in datosProfe" ng-value="profe.idProfe">
	{{profe.nombre+" "+profe.cognom1+" "+profe.cognom2}}
	</option>
</select>
<br><button ng-click="agregarCasa()">Agregar Casa</button>
