<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" ng-app="ProjectManagerApp">
<head>
	<meta charset="UTF-8">
	<title>Project Manager</title>
  <script>document.write('<base href="' + document.location + '" />');</script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="libs/normalize-css/normalize.css"> -->
  <link rel="stylesheet" type="text/css" href="libs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/test.css">
  <link rel="stylesheet" type="text/css" href="libs/fullcalendar-3.3.1/fullcalendar.css">

  <script src="libs/jquery/dist/jquery.min.js"></script>
  <script src="libs/moment/min/moment.min.js"></script>
  <script src="libs/fullcalendar-3.3.1/fullcalendar.js"></script>
  <script src="libs/angular/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="js/project_manager.js"></script>

</head>
<body>
	<div class="container-fluid" ng-controller="DbController">
		<div class="row">
			<div class="col-lg-2 col-mg-2 col-sm-2 hidden-xs block-left">
				<div class="userPhoto">
					<img src="images/jeka.png" alt="projectManager" class="img-responsive img-circle">
				</div>
				<div class="links">
					<ul class="nav nav-pills nav-stacked">
            <li>
              <a href="#/MemberList" ng-click="updateMembers()"> MEMBERS </a> <!-- ng-click="membersList()" -->
            </li>
            <li>
              <a href="#/Projects" ng-click="updateProjects()"> MY PROJECT </a>
            </li>
            <li>
              <a href="#/ProjectTasks" ng-click="updateTasks()"> PROJECT TASKS </a>
            </li>
            <li>
              <a href="#/AddNewTask"> ADD NEW TASK </a>
            </li>
            <li>
              <a href="#/TaskCalendar"> TASK CALENDAR </a>
            </li>
            <li>
              <a href="#/MakeReport"> MAKE REPORT </a>
            </li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-10 col-mg-10 col-sm-10 col-xs-12 block-right">
				
				<!-- Navigation_start -->
        <nav ng-include src="'templates/navigationMenuProjectManager.html'"></nav>
				<!-- Navigation_end -->

				<!-- Main_start -->
				<div class="main-container">

          <div ng-include src="'templates/updateProjectModel.html'"></div>   

          <ng-view></ng-view>
        
			  </div>
				<!-- Main_end -->

			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="projectInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Project Name</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Progress</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <th>1</th>
              <th>09.19.16</th>
              <th>10.10.16</th>
              <th>
                <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                  60%
                </div>
              </div>
              </th>
            </tr>
          </table>
        </div>

          <div class="panel-group" id="accordion">
          <div class="panel panel-default" id="accordion-1">
            <div class="panel-heading sprint-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  SPRINT NAME #1
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
              <div class="panel-body-sprint">

                <!-- Table -->
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Project Manager</th>
                      <th>Progress</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <tr>
                      <th>1</th>
                      <th>09.19.16</th>
                      <th>10.10.16</th>
                      <th>Oleg</th>
                      <th>
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                          60%
                        </div>
                      </div>
                      </th>
                    </tr>
                  </tbody>
                </table>

                <!-- TASK_1 -->  
                <div class="panel-task ">
                <div class="panel-heading task-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion-1" href="#collapseTwo">
                      TASK NAME #1
                    </a>
                  </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <table class="table">
                          <tbody id="tbody">
                          <!-- TASK_ID -->
                            <tr>
                              <th>
                                <label>#</label>
                              </th>
                              <th>
                                <p>1</p>
                              </th>
                            </tr>
                          <!-- START_TIME -->
                            <tr>
                              <th>
                                <label>Start time</label>
                              </th>
                              <th>
                                <p>11.11.2017</p>
                              </th>
                            </tr>
                          <!-- END_TIME -->
                            <tr>
                              <th>
                                <label>End time</label>
                              </th>
                              <th>
                                <p>30.30.2017</p>
                              </th>
                            </tr>
                          <!-- ESTIMATED_TIME -->
                            <tr>
                              <th>
                                <label>Estimated Time</label>
                              </th>
                              <th>
                                <p>5 hours</p>
                              </th>
                            </tr>
                          <!-- MEMBERS -->
                            <tr>
                              <th>
                                <label>Members</label>
                              </th>
                              <th>
                                <p>sasasasasa</p>
                              </th>
                            </tr>
                          <!-- STATUS -->
                            <tr>
                              <th>
                                <label>Status</label>
                              </th>
                              <th>
                                <p><span class="label label-success">Done</span></p>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <!-- END_TASK_1 -->

                <!-- TASK_2 -->
                <div class="panel-task">
                <div class="panel-heading task-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion-1" href="#collapseThree">
                      TASK NAME #2
                    </a>
                  </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <table class="table">
                          <tbody id="tbody">
                          <!-- TASK_ID -->
                            <tr>
                              <th>
                                <label>#</label>
                              </th>
                              <th>
                                <p>2</p>
                              </th>
                            </tr>
                          <!-- START_TIME -->
                            <tr>
                              <th>
                                <label>Start time</label>
                              </th>
                              <th>
                                <p>11.11.2017</p>
                              </th>
                            </tr>
                          <!-- END_TIME -->
                            <tr>
                              <th>
                                <label>End time</label>
                              </th>
                              <th>
                                <p>30.30.2017</p>
                              </th>
                            </tr>
                          <!-- ESTIMATED_TIME -->
                            <tr>
                              <th>
                                <label>Estimated Time</label>
                              </th>
                              <th>
                                <p>5 hours</p>
                              </th>
                            </tr>
                          <!-- MEMBERS -->
                            <tr>
                              <th>
                                <label>Members</label>
                              </th>
                              <th>
                                <p>sasasasasa</p>
                              </th>
                            </tr>
                          <!-- STATUS -->
                            <tr>
                              <th>
                                <label>Status</label>
                              </th>
                              <th>
                                <p><span class="label label-warning">In Process</span></p>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <!-- END_TASK_2 -->

                <!-- TASK_3 -->
                <div class="panel-task">
                <div class="panel-heading task-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion-1" href="#collapseFour">
                      TASK NAME #3
                    </a>
                  </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                      <div class="panel-body">
                        <table class="table">
                          <tbody id="tbody">
                          <!-- TASK_ID -->
                            <tr>
                              <th>
                                <label>#</label>
                              </th>
                              <th>
                                <p>3</p>
                              </th>
                            </tr>
                          <!-- START_TIME -->
                            <tr>
                              <th>
                                <label>Start time</label>
                              </th>
                              <th>
                                <p>11.11.2017</p>
                              </th>
                            </tr>
                          <!-- END_TIME -->
                            <tr>
                              <th>
                                <label>End time</label>
                              </th>
                              <th>
                                <p>30.30.2017</p>
                              </th>
                            </tr>
                          <!-- ESTIMATED_TIME -->
                            <tr>
                              <th>
                                <label>Estimated Time</label>
                              </th>
                              <th>
                                <p>5 hours</p>
                              </th>
                            </tr>
                          <!-- MEMBERS -->
                            <tr>
                              <th>
                                <label>Members</label>
                              </th>
                              <th>
                                <p>sasasasasa</p>
                              </th>
                            </tr>
                          <!-- STATUS -->
                            <tr>
                              <th>
                                <label>Status</label>
                              </th>
                              <th>
                                <p><span class="label label-danger">To Do</span></p>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <!-- END_TASK#3 -->

               </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <button type="button" class="btn btn-danger del" data-toggle="modal" data-target="#deletinProject" onclick="deleting()">Delete Project</button>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- LOG_OUT -->
<!-- <div ng-include src="'templates/logOut.html'"></div> -->
<div class="modal fade" id="logOut" tabindex="-1" role="dialog" aria-labelledby="LOGOUT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="LOGOUT">Log out</h4>
      </div>
      <div class="modal-body">
      <h5>Do really want to exit?</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick='location.href="Index.php"''>Log out</button>
      </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>