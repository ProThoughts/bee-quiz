angular.module('MyApp', ['ngMaterial']).controller('QuizCtrl', function($scope, $http, $location, $anchorScroll) {
  var questionFilePath = './api/question1.json';
  $http.get(questionFilePath).then(function(response) {
    $scope.questions = response.data.questions;
    $scope.title = response.data.title;
    $scope.explanation = response.data.explanation;
    $scope.answer_ref = response.data.answer_ref;
  });

  $scope.submit = function() {
    var correctQuestions = $scope.questions.filter(function(val) {
      return (val.value == val.answer);
    });
    $scope.score = correctQuestions.length / $scope.questions.length * 100;
    ga('send', 'event', 'quiz', 'answer', 'quiz' + id, $scope.score);
    $location.hash('top');
    $anchorScroll();
  }

  $scope.reset = function(){
    angular.forEach($scope.questions, function(value, index) {
      value.value = null;
    });
    $scope.questionForm.$setPristine();
    $location.hash('top');
    $anchorScroll();
  }
});

