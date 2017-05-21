var searchApp = angular.module("searchApp", []);
searchApp.controller("searchController", function($scope) {
});
	$(".submitdeleteform").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type:"POST",
			url: $(this).data('url'),
			data: $(this).serialize(),
			success: function(msg) {
				console.log(msg);
			}
		});
	});