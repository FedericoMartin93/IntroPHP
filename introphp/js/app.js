let app= angular.module('projecteco',['ngRoute']);

app.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'views/home.html',
		controller:'HomeController'
	})
	.when('/sesiones/',{
		templateUrl:'views/sesiones.php',
		controller:'SesionesController',
		title:'sesiones'
	})
	.when('/login/',{
		templateUrl:'views/login.html',
		controller:'loginController',
		title:'login'
	})
	.when('/principal/',{
		templateUrl:'views/principal.php',
		controller:'paginaPrincipal',
		title:'Página Principal'
	})
	.when('/agregar/',{
		templateUrl:'views/agregar.php',
		controller:'agregarCasaController',
		title:'Página de agregar Casa'
	})
	.when('/multiple/',{
		templateUrl:'views/multiple.php',
		controller:'multipleController',
		title:'Página de JSON múltiple'
	})
	.when('/fechas/',{
		templateUrl:'views/fechas.php',
		controller:'fechasController',
		title:'Fechas'
	})
	.when('/ficheros/',{
		templateUrl:'views/ficheros.php',
		controller:'ficherosController',
		title:'ficheros'
	})
	.when('/datosfichero/',{
        templateUrl:'views/datosfichero.php',
        controller:'DatosficheroController',
        title: "Ficheros"
    })
    .when('/mailing/',{
        templateUrl:'views/mailing.php',
        controller:'MailingController',
        title: "Mailing"
    })
    .when('/recupera/',{
        templateUrl:'views/recupera.php',
        controller:'RecuperaController',
        title: "recupera"
    })
    .when('/masivo/',{
        templateUrl:'views/masivo.php',
        controller:'MasivoController',
        title: "Masivo"
    })
	.otherwise({
		redirectTo:'/'
	})
}]);