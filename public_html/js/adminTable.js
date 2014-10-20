$(document).ready(function(){
	$.getJSON("resources/Administrator/select.php", function(data){
		if(data.length === 0) alert("No Applications in the database.")
		$heading = true;
		$.each(data, function(rowIndex, row){
			var Approw = "<tr id='"+row["application_id"]+"'>";
			var headingString ="<tr>";
			$.each(row, function(key, value){
				if($heading){
					headingString += "<th>"+key+"</th>";
				}
				if(key === "application_id"){
					Approw += "<td><a href='resources/Administrator/view_Application.php?application_id="+row["application_id"]+"'>";
					Approw += value+"</td></a>";
				} else if(key === "is_complete"){
					if(value == 1){
						Approw += "<td>Complete</td>";
					} else Approw += "<td>Incomplete</td>";
				} else Approw += "<td>"+value+"</td>";
			});
			Approw += "</tr>";
			if($heading){
				headingString += "</tr>";
				$("#AppHeader").append(headingString);
				$heading = false;
			}
			$("#AppBody").append(Approw);
		});
	});
});