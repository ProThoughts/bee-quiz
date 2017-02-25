<?php
$questions = array();
$questions[0] = array(
	'title'=> '分蜂は1群れから年に1回しか出てこない。',
	'answer' => 1,
	'explanation'=> '分蜂の数は、群れの大きさや周囲の蜜源の環境によっても変わりますが、平均で3回程度のようです。',
);
$questions[1] = array(
	'title'=> '分蜂は1群れから年に1回しか出てこない。',
	'answer' => 1,
	'explanation'=> '分蜂の数は、群れの大きさや周囲の蜜源の環境によっても変わりますが、平均で3回程度のようです。',
);

$questionTemplate = file_get_contents('./html/question.html');
?>

<html lang="ja" >
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Angular Material style sheet -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  <link rel="stylesheet" type="text/css" href="./style.css" media="all">
</head>
<body ng-app="MyApp" ng-cloak>
	<div>
	  <form ng-submit="submit()" ng-controller="AppCtrl" ng-cloak>
	<?php foreach($questions as $i => $question): ?>
	<?php echo $html = strtr($questionTemplate, array('^i' => $i + 1)); ?>
	<?php endforeach; ?>

    <button class="md-raised md-primary md-button md-ink-ripple" type="submit" ng-transclude="" ><span class="ng-scope">答えを見る</span><div class="md-ripple-container"></div></button>
  </form>
</div>

  <!--
    Your HTML content here
  -->  
  
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
      alert('submit');
    };

    $scope.addItem = function() {
      var r = Math.ceil(Math.random() * 1000);
      $scope.radioData.push({ label: r, value: r });
    };

    $scope.removeItem = function() {
      $scope.radioData.pop();
    };

  })
  .config(function($mdIconProvider) {
    $mdIconProvider.iconSet("avatars", 'icons/avatar-icons.svg',128);
  });
  </script>
  
</body>
</html>
