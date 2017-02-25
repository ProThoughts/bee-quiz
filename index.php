<?php
require_once './vendor/spyc/Spyc.php';
$questions = Spyc::YAMLLoad('./questions/question0.yml');
$questionTemplate = file_get_contents('./html/question.html');
var_dump($_POST);
?>
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
	  <form ng-submit="submit()" ng-cloak>
	<?php foreach($questions as $i => $question): ?>
	<?php echo $html = strtr($questionTemplate, array('^i' => $i + 1, '^title' => $question['title'])); ?>
	<?php endforeach; ?>

    <button class="md-raised md-primary md-button md-ink-ripple" type="submit" ><span class="ng-scope">答えを見る</span><div class="md-ripple-container"></div></button>
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
	angular.module('MyApp', ['ngMaterial']).controller('AppCtrl', function($scope) {
		$scope.submit = function() {
			alert('test' + $scope.data.group1);
		}
		$scope.data = {};


	}).config(function($mdIconProvider) {

	});
</script>
</body>
</html>
