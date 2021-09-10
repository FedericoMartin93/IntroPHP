angular.module("projecteco")
.controller("HomeController", function($rootScope,$scope,$http,$q){
  $rootScope.buscando=true;
  $scope.muestraEspe=true;
  $scope.datos= "";
   let data = new FormData();
   data.append("acc","r");
   let defered = $q.defer();
   $rootScope.buscando=false;
   $http.post("models/cases.php", data, {
      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
   })
   .then((res) => { 
       defered.resolve(res) 
       $scope.datos=res.data;

   })
   .catch((err) => {console.log(err.statusText)})
   .finally(() => {$rootScope.buscando=true;});
   $scope.buscaEspecialidades=(idCasa)=>{
    $scope.espSelec=-1;
    $rootScope.buscando=false;
    let data= new FormData;
    data.append("acc","selCasa");
    data.append("idCasa",idCasa);
    $http.post("models/especialitats.php", data, {
      headers:{ "Content-type" : undefined }, transformRequest : angular.identity 
   })
   .then((res) => { 
       defered.resolve(res);
       $scope.datosEspecialitats=res.data;
       console.log($scope.datosEspecialitats);
       $rootScope.buscando=false;
       $scope.muestraEspe=false;
   })
   .catch((err) => { console.log(err.statusText) })
   .finally(() => {$rootScope.buscando=true;})
   }
   $scope.buscaAlumnos=()=>{
    console.log("Buscar alumnos en la espcecialidad "+$scope.espSelec)
    if ($scope.aluSelec==-1) {
      alert("tienes que selecionar un valor válido")
    } else {
    $rootScope.buscando=false;
    let data = new FormData;
    data.append("acc","l");
    data.append("idEsp",$scope.espSelec);
    let defered=$q.defer();
    $http.post("models/alumnes.php",data,{

      // headers:{"Content-type" : undefined}, transformRequest: angular.identity
    })
    .then((res) =>{
      defered.resolve(res);
      console.log(res.data);
    $scope.alumnes=res.data;
    })
    .catch((err)=>{
      console.log(err.statusText) })
    .finally (()=>{$rootScope.buscando=true;});
    }
   }
   //   $scope.editaAlumno=()=>{
   //  if ($scope.aluSelec==-1) {
   //    alert("tienes que selecionar un valor válido")
   //  } else {
   //  $rootScope.buscando=false;
   //  let data = new FormData;
   //  data.append("acc","r");
   //  data.append("idEsp",$scope.espSelec);
   //  let defered=$q.defer();
   //  $http.post("models/update.php",data,{
   //    headers:{"Content-type" : undefined}, transformRequest: angular.identity
   //  })
   //  .then((res) =>{
   //    defered.resolve(res);
   //    console.log(res.data);
   //  $scope.alumnes=res.data;
   //  })
   //  .catch((err)=>{
   //    console.log(err.statusText)})
   //  .finally (()=>{$rootScope.buscando=true;});
   //  }
   // }
})
.controller("SesionesController", function($rootScope,$scope,$http,$q){
  let defered = $q.defer();
   $http.post("models/sesiones.php")
   .then((res) => { 
       defered.resolve(res);
       console.log(res.data); 
       $scope.datos=res.data;
   })
  .catch((err)=>{ console.log(err.statusText)})
  .finally (()=>{});
    })

.controller("loginController", function($scope,$http,$q,$location){
  $scope.email="carlos.anton@barcelonactiva.cat";
  $scope.clave="1234";
  $scope.valida=function(){
    console.log("llega");
    if ($scope.email=="" || $scope.clave=="") alert("verifica datos")
      else{
        let data = new FormData;
        data.append("acc","login");
        data.append("email",$scope.email);
        data.append("pass",$scope.clave);
          let defered = $q.defer();
          $http.post("models/profes.php",data,{
            headers:{"Content-type" : undefined}, transformRequest: angular.identity})
          .then((res) => { 
            defered.resolve(res);
            $scope.datos=res.data[0].message;
            if($scope.datos) {$location.path("/principal")}
              else alert("Datos incorrectos");
            console.log(res.data); 
            $scope.datos=res.data;
        })
        .catch((err)=>{ console.log(err.statusText)})
        .finally (()=>{});
        }
  }
})
.controller("paginaPrincipal", function($rootScope,$scope,$http,$q){
  $scope.logout=()=>{
      let data = new FormData;
      data.append("acc","logout");
      let defered = $q.defer();
      $http.post("models/profes.php", data,{
        headers:{"Content-type" : undefined}, transformRequest: angular.identity})
     
      .then((res) => { 
       defered.resolve(res);
       $scope.datos=res.data; 
       console.log($scope.datos);
       if($scope.datos) console.log("Hola");
   })
      .catch((err)=>{ console.log(err.statusText)})
      .finally (()=>{});
       }
    })
.controller("paginaPrincipal", function($rootScope,$scope,$http,$q,$location){
  let data = new FormData;
      data.append("acc","r");
      let defered = $q.defer();
      $http.post("models/profes.php", data,{
        headers:{"Content-type" : undefined}, transformRequest: angular.identity})
      .then((res) => { 
        defered.resolve(res);
        $scope.datos=res.data;
        $scope.datosProfe=res.data;
       $scope.tipo=$scope.datosProfe[0];
       $scope.nombre=$scope.datosProfe[1];
       $scope.cognom1=res.data[2];
       $scope.cognom2=res.data[3];
       $scope.email=$scope.datosProfe[4];
       $scope.telefon=parseInt($scope.datosProfe[5]);
        console.log($scope.datos);
       if($scope.datos);
      })

      .catch((err)=>{ console.log(err.statusText)})
      .finally (()=>{});

      $scope.actualizar=()=>{
        let data = new FormData;
        data.append("acc","u");
        data.append("tipo",$scope.tipo);
        data.append("nombre",$scope.nombre);
        data.append("cognom1",$scope.cognom1);
        data.append("cognom2",$scope.cognom2);
        data.append("email",$scope.email);
        data.append("telefon",$scope.telefon);

        let defered = $q.defer();

        $http.post("models/profes.php", data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
        .then((res) => { 
         defered.resolve(res);
         console.log(res.data);
        })

      .catch((err)=>{console.log(err.statusText)})
      .finally (()=>{});
      }

  $scope.logout=()=>{
      let data = new FormData;
      data.append("acc","logout");
      let defered = $q.defer();

      $http.post("models/profes.php", data,{
        headers:{"Content-type" : undefined}, transformRequest: angular.identity})
      .then((res) => { 
       defered.resolve(res);
       
       console.log($scope.datosProfe);
       if($scope.datos) console.log("Hola");
      })
      .catch((err)=>{ console.log(err.statusText)})
      .finally (()=>{}); 
    }
    })
.controller("agregarCasaController", function($rootScope,$scope,$http,$q){
  $scope.nombre="Mi nueva casa";
  $scope.profeSelec="-1";
  let data= new FormData;
  data.append("acc","l");
  data.append("tipo","d");
  let defered = $q.defer();
    $http.post("models/profes.php", data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
    .then((res) => { 
       defered.resolve(res);
       console.log(res.data);
       $scope.datosProfe=res.data;
   })
  .catch((err)=>{ console.log(err.statusText)})
  .finally (()=>{})
  $scope.agregarCasa=()=>{
    if($scope.profeSelec=="-1") alert("Selecciona director/a")
      else {
  
      let data = new FormData;
      data.append("acc","c");
      data.append("idProfe",$scope.profeSelec);
      data.append("nombre",$scope.nombre);
      let defered=$q.defer();
    
      $http.post("models/cases.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})
    
      .then((res) =>{
        defered.resolve(res);
        console.log(res.data);
        $scope.datos=res.data;
      })
    
      .catch((err)=>{console.log(err.statusText)})
    
      .finally (()=>{})
      }
    }
  })


.controller("multipleController", function($rootScope,$scope,$http,$q){
  let defered=$q.defer();
  $http.post("models/multiple.php")
    
    .then((res) =>{
      defered.resolve(res);
      console.log(res.data);
      $scope.datosAlumnos=res.data.datosAlumnos;
      $scope.datosProfe=res.data.datosProfe;
    })
    
    .catch((err)=>{console.log(err.statusText) })
    
    .finally (()=>{});
})

.controller("fechasController", function($scope,$http,$q){
  $scope.idProfe=33;
  $scope.txtName="Carlos";
  $scope.txtAp1="Antón";
  $scope.txtAp2="Mesa";

  let data = new FormData;
  data.append("idProfe",$scope.idProfe);
  data.append("txtName",$scope.txtName);
  data.append("txtAp1",$scope.txtAp1);
  data.append("txtAp2",$scope.txtAp2);

  let defered=$q.defer();
  $http.post("models/fechas.php")

   $http.post("models/fechas.php",data,{headers:{"Content-type" : undefined}, transformRequest: angular.identity})

  .then((res) =>{
    defered.resolve(res);
    console.log(res.data);
  })
  .catch((err)=>{console.log(err.statusText) })
    
  .finally (()=>{});

})

.controller("DatosficheroController", function($scope, $http, $q){
   $scope.formularioFichero=false;
   $scope.habilitaNuevo;
   let data= new FormData;
   let defered = $q.defer();
   data.append("acc","r");
   $http.post("models/datosfichero.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
   .then((res) => { 
      defered.resolve(res);
      $scope.datosFicheros=res.data;
   })
   .catch((err) => { console.log(err.statusText) })
   .finally(() => {})
 

 // funcion de actualizar campo en BBDD
   $scope.update=(posicionArray)=>{
// Declaro las variables nuevas
      $scope.idDato=$scope.datosFicheros[posicionArray].idDato;
      $scope.descripcion=$scope.datosFicheros[posicionArray].descripcion;
      $scope.foto=$scope.datosFicheros[posicionArray].foto;
   // Cambio de botón   
      $scope.literalBotonFormulario="Actualizar";
      $scope.formularioFichero=true;
   }
  $scope.habilitaNuevo=()=>{

  // Vuelvo a declarar variables con valores nuevos
      $scope.idDato=-1;
      $scope.descripcion="";
      $scope.foto="";
      $scope.nuevaFoto="";
      $scope.literalBotonFormulario="Añadir";
      $scope.formularioFichero=true;
   }
   $scope.getFileDetails=(e)=>{
      $scope.nuevaFoto=e.files[0];
   }
   $scope.insertaRegistro=()=>{
      let data= new FormData;
      let defered = $q.defer();
      if($scope.idDato==-1) data.append("acc","c");
      else data.append("acc","u");
      if($scope.nuevaFoto!="") data.append("nuevaFoto",$scope.nuevaFoto);
      data.append("idDato",$scope.idDato);
      data.append("descripcion",$scope.descripcion);
      $http.post("models/datosfichero.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
      .then((res) => { 
         defered.resolve(res);
         $scope.datosFicheros=res.data;
      })
      .catch((err) => { console.log(err.statusText) })
      .finally(() => {})
      $scope.habilitaNuevo;
      $scope.formularioFichero=false;
   }
})
.controller("MailingController",function($scope,$http,$q){
  let data= new FormData;
  let defered = $q.defer();
  $http.post("models/mailing.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
      .then((res) => { 
            defered.resolve(res);
            console.log(res.data);
      })
      .catch((err) => { console.log(err.statusText) })
      .finally(() => {})
})

.controller("RecuperaController",function($scope,$http,$q){
    let data= new FormData;
    let defered = $q.defer();

    data.append("acc","reset");
    data.append("email","federico@cobd.es");
    $http.post("models/recupera.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
        .then((res) => { 
              defered.resolve(res);
              console.log(res.data);
              $scope.datos=res.data;
        })
        .catch((err) => { console.log(err.statusText) })
        .finally(() => {})
  })
.controller("MasivoController",function($scope,$http,$q){
  let data= new FormData;
  let defered = $q.defer();
  $http.post("models/masivo.php", data, { headers:{ "Content-type" : undefined }, transformRequest : angular.identity})
  .then((res) => { 
      defered.resolve(res);
      console.log(res.data);
  })
  .catch((err) => { console.log(err.statusText) })
  .finally(() => {})
})