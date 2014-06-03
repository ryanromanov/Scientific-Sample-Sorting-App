var sampleApp = angular.module('sampleApp', []);
	sampleApp.config(function ($routeProvider) {
		$routeProvider
			.when('/view1',
				{
					controller: 'sampleAppController',
					templateUrl: 'views/view1.html'
				})
			.when('/view2',
				{
					controller: 'addSampleAppController',
					templateUrl: 'views/view2.html'
				})
			.when('/view3',
				{
					controller: 'redirector',
					templateUrl: 'views/view3.html'
				})
			.otherwise({ redirectTo: '/view1' });
	});
	sampleApp.factory('findSamplesFactory', function($http) {
	    var factory = {};
	    factory.getSamples = function() {
	        return $http.get('test.php');
	    };
	    factory.insertSamples = function(sampleNumber, sampleBox, sampleRow, sampleLevel) {
	        samples.push({
	            number: sampleNumber,
	            box: sampleBox,
	            row: sampleRow,
	            level: sampleLevel
	        });
	    };
	    return factory;
	});
	sampleApp.controller('sampleAppController', function ($scope, findSamplesFactory) {
	 	findSamplesFactory.getSamples().then(function(data){
	    	$scope.samples = data;
		});
		
//	    $scope.addSamples = function() {
//	        var sampleNumber = $scope.newSample.number;
//	        var sampleBox = $scope.newSample.box;
//	        var sampleRow = $scope.newSample.row;
//	        var sampleLevel = $scope.newSample.level
//	        findSamplesFactory.insertSamples(sampleNumber, sampleBox, sampleRow, sampleLevel);
//	        $scope.newSample.number = ' ';
//	        $scope.newSample.box = ' ';
//	        $scope.newSample.row = ' ';
//	        $scope.newSample.level = ' ';
//	    };
	});
	sampleApp.controller('addSampleAppController', function ($scope) {
		
//		$scope.addSamples = function() {
//			$scope.newSample = ' ';
//		};
		
	});
	sampleApp.controller('redirector', function ($scope) {
		function erase() {
			$scope.newSample = ' ';
		};
	});
	