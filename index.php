<!DOCTYPE html>
<html ng-app="crudApp">
 <head>
	<title>Employee details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
 </head>
 <body>
 	<div class="" ng-controller="maincontroller">
 	<br/> <br/>
 		<nav class="navbar navbar-default">
			<div class="navbar-header">
			<div class="alert alert-default navbar-brand search-box">
				<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">
				Add Employee<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>
			</div>
			<div class="alert alert-default input-group search-box">
				<span class="input-group-btn">
					<input type="text" class="form-control" placeholder="Search Employee Detail" ng-model="search_query">
				</span>
			</div>
			</div>
		</nav>
		<div class="col-md-6 col-md-offset-3">
			<div ng-include ="'templates/form.html'"></div>
			<div ng-include ="'templates/editForm.html'"></div>
		</div>
		<div class="clearfix"></div>
	<!-- Table to show employee details -->
		<div style="color:black;" class="table-responsive">
			<table class="table table-hover">
				<tr>
					<th>Employee ID</th>
					<th>Employee Name</th>
					<th>Email Address</th>
					<th>Gender</th>
					<th>Address</th>
					<th></th>
					<th></th>
				</tr>
			<tr ng-repeat="detail in details| filter:search_query">
				<td><span>{{detail.emp_id}}</span></td>
				<td>{{detail.emp_name}}</td>
				<td>{{detail.emp_email}}</td>
				<td>{{detail.emp_gender}}</td>
				<td>{{detail.emp_address}}</td>
				<td>
					<button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
				</td>
				<td>
					<button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>
			</table>
		</div>	
 	</div>
 	<script type="text/javascript" src="js/angular-script.js"></script>
 </body>
</html>