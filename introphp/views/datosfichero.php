Vista de Datos de fichero.<br/>
<div ng-repeat="datoFichero in datosFicheros">
    <img ng-src="img/{{datoFichero.foto!=null?datoFichero.foto:'noimage.png'}}" alt="{{datoFichero.descripcion}}" title="{{datoFichero.descripcion}}">
    {{datoFichero.descripcion}}-{{datoFichero.foto}} <button ng-click="update($index)">Editar</button>
</div>
<button ng-click="habilitaNuevo()">Añadir foto</button>
<br/>
<br/>
 
<div ng-show="formularioFichero">
    <label>Nombre de la foto: {{foto}}</label><br/>
    <label for="">Indica la descripción</label><input type="text" name="descripcion" id="descripcion" ng-model="descripcion"><br/>
    <label for="selImagen">Examinar ficheros</label>
    <input id="selImagen" type="file" accept="image/png, image/jpg" ng-show="false" onchange="angular.element(this).scope().getFileDetails(this)"><br/>
    <button ng-click="insertaRegistro()">{{literalBotonFomulario}} Registro</button>
</div>