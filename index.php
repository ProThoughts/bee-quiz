<html lang="ja" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  <link rel="stylesheet" type="text/css" href="./style.css" media="all">
</head>
<body ng-app="MyApp" ng-cloak>
<section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
	<div ng-controller="AppCtrl">
	<form name="questionForm" ng-submit="submit()" ng-cloak novalidate>
<div ng-if="questionForm.$submitted">
<p>あなたの得点は{{ score }} 点です</p>
</div>
<div ng-repeat="(key, question) in questions">
<p>[問題{{key + 1}}] {{ question.title }} </p>
<md-radio-group ng-model='question.value' required>
<md-radio-button name="i-1" value="1" class="md-primary">はい</md-radio-button>
<md-radio-button name="i-0" value="0">いいえ</md-radio-button>
<div ng-if="questionForm.$submitted">
	<div ng-if="question.value == question.answer">
		<span>正解</span>
	</div>
	<div ng-if="question.value != question.answer">
		<span>不正解</span>
	</div>
	<span>{{ question.explanation }}</span>
</div>
</md-radio-group>
<hr />
</div>

<p ng-show="questionForm.$invalid">
全て回答してください。
</p>

	<button class="md-raised md-primary md-button md-ink-ripple" ng-disabled="questionForm.$invalid" type="submit" >
		<span class="ng-scope">答えを見る</span>
		<div class="md-ripple-container"></div></button>
	</form>
</div>
</section>
<!-- Angular Material requires Angular.js Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

<!-- Angular Material Library -->
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  
<!-- Your application bootstrap  -->
<script type="text/javascript">    
	angular.module('MyApp', ['ngMaterial']).controller('AppCtrl', function($scope, $http) {
		$scope.submit = function() {

			var correctQuestions = $scope.questions.filter(function(val) {
				return (val.value == val.answer);
			});
			$scope.score = correctQuestions.length / $scope.questions.length * 100;
		}
		$scope.data = {};
		$http.get("./api/").then(function(response) {
			$scope.questions = response.data;
		});

	}).config(function($mdIconProvider) {

	});
</script>
</body>
</html>
