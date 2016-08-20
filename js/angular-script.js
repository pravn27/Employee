var crudApp = angular.module('crudApp',[]);
crudApp.controller("maincontroller",['$scope','$http', function($scope,$http){

	

	getInfo();
	function getInfo(){
		$http.post('databaseFiles/empDetails.php').success(function(data){
			$scope.details = data;
		});
	}

	//default value of gender 
	$scope.empInfo = {'gender' : 'male'};
	// Enabling show_form variable to enable Add employee button
	$scope.show_form = true;

	// Function to add toggle behaviour to form
	$scope.formToggle =function(){
		$('#empForm').slideToggle();
		$('#editForm').css('display','none');
	}


	$scope.insertInfo = function(info){
		$http.post('databaseFiles/insertDetails.php',{"name":info.name,"email":info.email,"address":info.address,"gender":info.gender}).success(function(data){
			if (data == true) {
				alert("Saved successfully");
				getInfo();
				$('#empForm').css('display', 'none');
				$scope.empInfo.name = "";
				$scope.empInfo.email = "";
				$scope.empInfo.address = "";
			}
		});
	}

	$scope.deleteInfo = function(info){
		$http.post('databaseFiles/deleteDetails.php',{"del_id":info.emp_id}).success(function(data){
		if (data == true) {
		getInfo();
		}
		});
	}

	$scope.currentUser = {};
	$scope.editInfo = function(info){
		$scope.currentUser = info;
		$('#empForm').slideUp();
		$('#editForm').slideToggle();
	}

	$scope.UpdateInfo = function(info){
		$http.post('databaseFiles/updateDetails.php',{"id":info.emp_id,"name":info.emp_name,"email":info.emp_email,"address":info.emp_address,"gender":info.emp_gender}).success(function(data){
			$scope.show_form = true;
			if (data == true) {
				getInfo();
			}
		});
	}

	$scope.updateMsg = function(emp_id){
		$('#editForm').css('display', 'none');
	}
}]);