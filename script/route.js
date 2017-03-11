angular.module('MyApp', ['ngMaterial', 'ngRoute'])
.config(['$routeProvider', function($routeProvider){
    $routeProvider
      .when('/', {
        templateUrl: 'view/top.html',
      })
      .when('/quiz/:id', {
        templateUrl: 'view/quiz.html',
        controller: 'QuizCtrl'
      })
      .when('/check/', {
        templateUrl: 'view/check.html',
        controller: 'CheckCtrl'
      })
      .when('/quiz', {
        redirectTo: '/quiz/1'
      })
      .otherwise({
        redirectTo: '/'
      });

  }]);
