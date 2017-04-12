// Application module
(function () {

	var app = angular.module('ProjectManagerApp',['ngRoute']);

	app.config(function ($routeProvider) {
		$routeProvider

		.when('/', {
			templateUrl: '../../Project_Manager/templates/MemberList.html'
		})

		.when('/MemberList', {
			templateUrl: '../../Project_Manager/templates/MemberList.html'
		})

		.when('/Projects', {
			templateUrl: '../../Project_Manager/templates/ProjectList.html'
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

	
	getModel();
	function getModel(){
		$http.post('../../Project_Manager/php/getModels.php').success(function(data){
			console.log("Models list downloaded");
			$scope.modelCount = data;
		});
	};

	$scope.currenProject = {};
	$scope.editInfoProject = function(info){
		$scope.currentProject = info;
		$('#projectList').slideUp();
		$('#updateProjectModel').slideToggle();
	};

	$scope.UpdateProject = function(info){
		//console.log("Updated");
		$http.post('../../Project_Manager/php/updateProjectModel.php',{

			"id":info.id,
			"title":info.title,
			"start_dt":info.start_dt,
			"end_dt":info.end_dt,
			"model_id":info.model_id

			}).success(function(data){
				if (data !=null) {
					//getInfo();
					alert(data);
					console.log("Project updated");
					// console.log(info.title);
					// console.log(info.start_dt);
					// console.log(info.end_dt);
					//console.log(info.emp_id);
				}
		});
	};

	$scope.setUpdateProject = function(id){
		$('#projectList').slideToggle();
		$('#updateProject').slideUp();
	}


	//=================================
	//============= TASKS =============
	

	getInfoTasks();
	function getInfoTasks(){
		$http.post('../../Project_Manager/php/taskDetails.php').success(function(data){
			console.log("Tasks downloaded & updated");
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





