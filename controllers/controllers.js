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
			.otherwise({ redirectTo: '/view1' });
	});
	
	sampleApp.factory('findSamplesFactory', function() {
		var samples = [
			{ number: '56-77B', box: '1', row: 'A', level: '1' },
			{ number: '58-66A-F', box: '1', row: 'A', level: '1' },
			{ number: '58-82', box: '1', row: 'A', level: '1' },
			{ number: '56-77B', box: '1', row: 'A', level: '1' },
			{ number: '56-77B', box: '1', row: 'A', level: '1' },
			{ number: '56-77B', box: '1', row: 'A', level: '1' }

		];
		
		var factory = {};
		factory.getSamples = function() {
			return samples;
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
		$scope.samples = findSamplesFactory.getSamples();
		
		$scope.addSamples = function() {
			var sampleNumber = $scope.newSample.number;
			var sampleBox = $scope.newSample.box;
			var sampleRow = $scope.newSample.row;
			var sampleLevel = $scope.newSample.level
			findSamplesFactory.insertSamples(sampleNumber, sampleBox, sampleRow, sampleLevel);
			$scope.newSample.number = ' ';
			$scope.newSample.box = ' ';
			$scope.newSample.row = ' ';
			$scope.newSample.level = ' ';
		};
	});
	
	sampleApp.controller('addSampleAppController', function ($scope, findSamplesFactory) {
		$scope.samples = findSamplesFactory.getSamples();
		
		$scope.addSamples = function() {
			var sampleNumber = $scope.newSample.number;
			var sampleBox = $scope.newSample.box;
			var sampleRow = $scope.newSample.row;
			var sampleLevel = $scope.newSample.level
			findSamplesFactory.insertSamples(sampleNumber, sampleBox, sampleRow, sampleLevel);
			$scope.newSample.number = ' ';
			$scope.newSample.box = ' ';
			$scope.newSample.row = ' ';
			$scope.newSample.level = ' ';
		};
	});