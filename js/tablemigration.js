/*
* This code sends a request to source.php then takes the data for the whole table in json format
* It then loops through each row of the table, in each loop sending the data to dest.php then prints out the reply from dest.php
*/

$("button.load-data").on('click', function() {
	$.ajax({
		dataType :'json',
		url : 'php/source.php',
		data : {},
		type : 'get',
		timeout : 3000,
		success : function(data) {
			for(var i = 0; i < data.length; i++) {
				// for each of the poems, send them via ajax to dest.php
				$.ajax({
					dataType : 'html',
					type : 'post', 
					data : {title : data[i].title, slug : data[i].slug, tags : data[i].tags},
					url : 'php/dest.php',
					success : function(data) {
						$(".show-progress").append(data);
					},
					error : function() {
						$(".show-progress").append("<li class='text-danger' > "+data[i].title+" not added </li>");
					}
				})
					
			}
			
		},
		error : function() {
			$(".show-progress").append("<li class='text-danger' > content not added </li>");
		}
	})
});