'use strict';

(function(){
	$('#userLink').click(function() {
		var sectionId= $(this).attr('section-id'),
			url = '/resources/new_applicant.php?section=' + sectionId;
		$('#userContent').load(url);
	});
}());