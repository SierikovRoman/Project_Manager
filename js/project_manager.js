// Application module
(function () {

	var app = angular.module('ProjectManagerApp',['ngRoute']);

	app.config(function ($routeProvider) {
		$routeProvider

		.when('/', {
			templateUrl: '../../Project_Manager/templates/MembersList.html'
		})

		.when('/MemberList', {
			templateUrl: '../../Project_Manager/templates/MembersList.html'
		})

		.when('/Projects', {
			templateUrl: '../../Project_Manager/templates/ProjectsList.html'
		})
		
		.when('/ProjectTasks', {
			templateUrl: '../../Project_Manager/templates/ProjectsTasks.html'
		})

		.when('/TaskCalendar', {
			templateUrl: '../../Project_Manager/templates/ProjectsCalendar.html'
		})

		.when('/AddNewProject', {
			templateUrl: '../../Project_Manager/templates/addNewProject.html'
		});

	});

	app.controller('projectManagerController', ['$scope','$http', function($scope,$http) {
		$http.post('../../Project_Manager/php/projectManagerDetails.php').success(function(data){
			$scope.projMan = data;
		});
	}]);

	app.controller("DbController",['$scope','$http', function($scope,$http){

	// Function to get employee details from the database
	getInfo();
		function getInfo(){
			// Sending request to EmpDetails.php files 
			$http.post('../../Project_Manager/php/empDetails.php').success(function(data){
				console.log("Members dowloaded & updated");
				// Stored the returned data into scope 
				$scope.members = data;
			});
		};

	// Insert New member to db
	$scope.insertNewMember = function(info){
		$http.post('../../Project_Manager/php/insertDetails.php',{

			"name":info.name,
			"surname":info.surname,
			"email":info.email,
			"access_type":info.access_type,
			"position":info.position,
			"password":info.password

			}).success(function(data){
			if (data == true) {
				getInfo();
				console.log("Added new member");
			};
		});
	};

	// Delete member from db
	$scope.deleteInfo = function(info){
		$http.post('../../Project_Manager/php/deleteDetails.php',{

			"del_id":info.id

			}).success(function(data){
			if (data == true) {
				getInfo();
				console.log("Row deleted");
			};
		});
	}


	$scope.currentUser = {};
	$scope.editInfo = function(info){
		$scope.currentUser = info;
		$('#membersList').slideUp();
		$('#updateMember').slideToggle();
	};

	$scope.UpdateInfo = function(info){
		console.log("Updated");
		$http.post('../../Project_Manager/php/updateDetails.php',{

			"id":info.id,
			"name":info.name,
			"surname":info.surname,
			"email":info.email,
			"access_type":info.access_type,
			"position":info.position,
			"password":info.password

			}).success(function(data){
				if (data == true) {
					getInfo();
					console.log("Updated");
				}
		});
	};

	$scope.updateMsg = function(id){
		$('#membersList').slideToggle();
		$('#updateMember').slideUp();
	}
	//====================================
	//============= PROJECTS =============
	

	getInfoProj();
	function getInfoProj(){
		// Sending request to ProjDetails.php files 
		$http.post('../../Project_Manager/php/projDetails.php').success(function(data){
			console.log("Projects downloaded & apdated");
			// Stored the returned data into scope 
			$scope.projects = data;
		});
	};

	// Insert New project to db
	// $scope.insertNewProject = function(info){
	// 	$http.post('../../Project_Manager/php/insertProject.php',{

	// 		"title":info.title,
	// 		"start_dt":info.start_dt,
	// 		"end_dt":info.end_dt,
	// 		"progress":info.progress

	// 		}).success(function(data){
	// 		if (data == true) {
	// 			getInfoProj();
	// 			console.log("Added new project");
	// 		};
	// 	});
	// };

	// // Delete project from db
	// $scope.deleteInfoProj = function(info){
	// 	$http.post('../../Project_Manager/php/projectInfoCalendar.php',{

	// 		"id":info.id

	// 		}).success(function(data){
	// 		if (data == true) {
	// 			getInfoProj();
	// 			console.log("Project deleted");
	// 		};
	// 	});
	// };

	//=================================
	//============= TASKS =============
	

	getInfoTasks();
	function getInfoTasks(){
		// Sending request to ProjDetails.php files 
		$http.post('../../Project_Manager/php/taskDetails.php').success(function(data){
			console.log("Tasks downloaded & updated");
			// Stored the returned data into scope 
			$scope.tasks = data;
		});
	};


	}]);

})();
















// функция узнает размер окна браузера, и задает её для блока div
function fullHeight(){
    $('.block-left').css({
        height: $(window).height() + 'px'
    });
};
 
// задаем высоту при первичной загрузке
fullHeight();
 
// высота при изменении размера окна браузера
$(window).resize( fullHeight );





