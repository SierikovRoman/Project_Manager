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
			templateUrl: '../../Project_Manager/templates/TasksList.html'
		})

		.when('/AddNewTask', {
			templateUrl: '../../Project_Manager/templates/addNewTask.html'
		})

		.when('/TaskCalendar', {
			templateUrl: '../../Project_Manager/templates/ProjectsCalendar.html'
		});

	});

	app.controller("DbController",['$scope','$http', function($scope,$http){

	// Function to get employee details from the database
	getInfo();
		function getInfo(){
			// Sending request to EmpDetails.php files 
			$http.post('../../Project_Manager/php/empDetails.php').success(function(data){
				console.log("Members dowloaded");
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
			console.log("Projects downloaded");
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
					getInfoProj();
					getStageID();
					//alert(data);
					console.log("Project updated");
					console.log(info.id);
					console.log(info.title);
					console.log(info.start_dt);
					console.log(info.end_dt);
					console.log(info.model_id);
				}
		});
	};

	$scope.setUpdateProject = function(id){
		$('#projectList').slideToggle();
		$('#updateProjectModel').slideUp();
	};


	//=================================
	//============= TASKS =============
	

	// getInfoTasks();
	// function getInfoTasks(){
	// 	$http.post('../../Project_Manager/php/taskDetails.php').success(function(data){
	// 		console.log("Tasks downloaded & updated");
	// 		$scope.tasks = data;
	// 	});
	// };


	getMemberID();
	function getMemberID(){
		$http.post('../../Project_Manager/php/getExecutors.php').success(function(data){
			console.log("Member list downloaded");
			$scope.memberCount = data;
		});
	};

	getStageID();
	function getStageID(){
		$http.post('../../Project_Manager/php/getStages.php').success(function(data){
			console.log("Stage list downloaded");
			$scope.stageCount = data;
		});
	};


	// Insert New task to db
	$scope.insertNewTask = function(info){
		$http.post('../../Project_Manager/php/insertTask.php',{

			"title":info.title,
			"description":info.description,
			"start_dt":info.start_dt,
			"end_dt":info.end_dt,
			"executor_id":info.executor_id,
			"stage_id":info.stage_id,
			"status":info.status

			}).success(function(data){
			if (data !=null) {
				getInfoTasks();
				console.log("Added new task");
				console.log(data);
			};
		});
	};

	// Delete project from db
	$scope.deleteInfoTask = function(info){
		$http.post('../../Project_Manager/php/deleteTask.php',{

			"id":info.id

			}).success(function(data){
			if (data == true) {
				getInfoTasks();
				console.log("Task - # " + info.id + " was deleted");
			};
		});
	};


	//====================================
	//========== CASCADE MODEL ===========

	
	$scope.showStageTasks = function(info){
		$http.post('../../Project_Manager/php/taskDetails.php',{

			"stages_id":info.stages_id,

			}).success(function(data){
				if (data !=null) {
				$scope.tasks_name = data;
				console.log(data);
			};
		});
	};


	//=============================
	//========= UPDATES ===========

	$scope.updateMembers = function(){
		getInfo();
		console.log("Member List updated");
	};

	$scope.updateProjects = function(){
		getInfoProj();
		console.log("Project List updated");
	};

	$scope.updateTasks = function(){
		getInfoTasks();
		console.log("Task List updated");
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





