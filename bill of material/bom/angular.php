<!DOCTYPE html>
<html>
<script src="angular.min.js"></script>
<script type="text/javascript">

var app = angular.module('ngchangeApp', []);

app.controller('ngchangeCtrl', function ($scope) {

$scope.getdetails = function () {

if ($scope.chkselct == true)

$scope.result = true;

else

$scope.result = false;

}

});

</script>

</head>

<body>

<div ng-app="ngchangeApp" ng-controller="ngchangeCtrl">

<h2>Show / Hide Div Elements with Checkbox</h2>

Show / Hide Div <input type="checkbox" ng-change="getdetails()" ng-model="chkselct"><br /><br />

<div style="padding:10px; border:1px solid black; width:30%; font-weight:bold" ng-show='result'>Hi Welcome to Tutlane.com... Angularjs</div>

</div>
</body>
</html>