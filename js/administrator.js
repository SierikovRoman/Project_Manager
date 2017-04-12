// Application module
(function () {

	var app = angular.module('AdministratorApp',['ngRoute']);

	app.config(function ($routeProvider) {
		$routeProvider

		.when('/', {
			templateUrl: '../../Project_Manager/templates/MembersList.html'
		})

		.when('/MemberList', {
			templateUrl: '../../Project_Manager/templates/MembersList.html'
		})
		
		.when('/AddNewMember', {
			templateUrl: '../../Project_Manager/templates/addNewMember.html'
		})

		.when('/ProjectCalendar', {
			templateUrl: '../../Project_Manager/templates/ProjectsCalendar.html'
		})

		.when('/Projects', {
			templateUrl: '../../Project_Manager/templates/ProjectsList.html'
		})

		.when('/AddNewProject', {
			templateUrl: '../../Project_Manager/templates/addNewProject.html'
		})

		.when('/MakeReport', {
			templateUrl: '../../Project_Manager/templates/addNewProject.html'
		});

	});


	//===========================================
	//================= LOGICA ==================

	app.controller("DbController",['$scope','$http', function($scope,$http){

	// Function to get employee details from the database
	getInfo();
		function getInfo(){
			// Sending request to EmpDetails.php files 
			$http.post('../../Project_Manager/php/empDetails.php').success(function(data){
				console.log("Member list downloaded");
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
				console.log(info.name);
				console.log(info.surname);
				console.log(info.access_type);
				console.log(info.position);
				console.log(info.password);
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
	};


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
			"access_id":info.access_id,
			"position_id":info.position_id,
			"password":info.password

			}).success(function(data){
				if (data == true) {
					getInfo();
					console.log("Member updated");
					console.log(info.id);
					console.log(info.name);
					console.log(info.surname);
					console.log(info.access_id);
					console.log(info.position_id);
					console.log(info.password);
				}
		});
	};

	$scope.updateMsg = function(id){
		$('#membersList').slideToggle();
		$('#updateMember').slideUp();
	}

	//====================================
	//============ PROJECTS ==============
	

	getInfoProj();
	function getInfoProj(){
		// Sending request to ProjDetails.php files 
		$http.post('../../Project_Manager/php/projDetails.php').success(function(data){
			console.log("Project list downloaded & updated");
			// Stored the returned data into scope 
			$scope.projects = data;
		});
	};


	getID();
	function getID(){
		$http.post('../../Project_Manager/php/projectManagerDetails.php').success(function(data){
			console.log("Project Manager list downloaded");
			$scope.projCount = data;
		});
	};


	// Insert New project to db
	$scope.insertNewProject = function(info){
		$http.post('../../Project_Manager/php/insertProject.php',{

			"title":info.title,
			"start_dt":info.start_dt,
			"end_dt":info.end_dt,
			"emp_id":info.emp_id

			}).success(function(data){
			if (data !=null) {
				getInfoProj();
				console.log("Added new project");
				console.log(data);
			};
		});
	};

	// Delete project from db
	$scope.deleteInfoProject = function(info){
		$http.post('../../Project_Manager/php/deleteProject.php',{

			"id":info.id

			}).success(function(data){
			if (data == true) {
				getInfoProj();
				console.log("Project deleted");
			};
		});
	};

	$scope.currenProject = {};
	$scope.editInfoProject = function(info){
		$scope.currentProject = info;
		$('#projectList').slideUp();
		$('#updateProject').slideToggle();
	};

	$scope.UpdateProject = function(info){
		//console.log("Updated");
		$http.post('../../Project_Manager/php/updateProjectDetails.php',{

			"id":info.id,
			"title":info.title,
			"start_dt":info.start_dt,
			"end_dt":info.end_dt,
			"emp_id":info.emp_id

			}).success(function(data){
				if (data == true) {
					getInfo();
					console.log("Project updated");
					console.log(info.title);
					console.log(info.start_dt);
					console.log(info.end_dt);
					//console.log(info.emp_id);
				}
		});
	};

	$scope.setUpdateProject = function(id){
		$('#projectList').slideToggle();
		$('#updateProject').slideUp();
	}


	}]);

})();


	//====================================
	//============== DESIGN ==============


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




