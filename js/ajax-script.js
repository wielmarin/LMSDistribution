jQuery( document ).ready(function() {

console.log('test');


/*
jQuery('#portal-content-side-list li').click(function() {
	
	var menuItem = jQuery(this).attr('id');
	
	console.log(menuItem);
	
	jQuery('#portal-content-right-space').load('/LMS/wp-content/themes/LMS_distribution/portal' + menuItem + '.html');
});

*/

jQuery('#portal-content-side-list ul:first > li').click(function() {
	
		var clickedlink = jQuery(this);
	
		var ourRequest = new XMLHttpRequest();
		ourRequest.open('GET', 'http://localhost/lms/wp-json/wp/v2/pages');
		ourRequest.onload = function() {
		  if (ourRequest.status >= 200 && ourRequest.status < 400) {
			var pagesData = JSON.parse(ourRequest.responseText);
			
			var clickedItem = jQuery("#portal-content-side-list ul:first > li").index(clickedlink);
			
			console.log(clickedItem); // Gives Correct Index Value
			
			var jsonLink = (pagesData[clickedItem]._links.self[0].href);
			console.log(jsonLink); // Give incorrect link
			
			
			var linkId = (pagesData[clickedItem].id); // ARE BEING INDEX IN DESCENDING ORDER
			console.log(linkId);
			
			
			
			/*
			/////////////// Second level
			
			var secondRequest = new XMLHttpRequest();
			secondRequest.open('GET', 'http://localhost/' + jsonLink);
			secondRequest.onload = function() {
			  if (secondRequest.status >= 200 && secondRequest.status < 400) {
				var data = JSON.parse(secondRequest.responseText);
				createPortalBox(data);
			  } else {
				console.log("We connected to the server, but it returned an error.");
			  }
			};

		secondRequest.onerror = function() {
		  console.log("Connection error");
		};

		secondRequest.send();
		
			function createPortalBox(pagesData) {
				var ourHTMLString = '';
			for (i=0; i< pagesData.length; i++ ) {
				ourHTMLString += '<h2>' + pagesData[i].title.rendered + '</h2>';
			}
				jQuery('#portal-content-right-space').html(ourHTMLString);
			}
			
			
			
			
			
			
			/////////////////

			*/
			
			
		  } else {
			console.log("We connected to the server, but it returned an error.");
		  }
		};

		ourRequest.onerror = function() {
		  console.log("Connection error");
		};

		ourRequest.send();

});


	
/*
jQuery('#portal-content-side-list li').click(function() {
	
	var linkhref =  jQuery(this).find('a').attr('href');
	console.log(linkhref);
	

		var ourRequest = new XMLHttpRequest();
		ourRequest.open('GET', 'http://localhost/lms/wp-json/wp/v2/pages?parent=169');
		ourRequest.onload = function() {
		  if (ourRequest.status >= 200 && ourRequest.status < 400) {
			var data = JSON.parse(ourRequest.responseText);
			createHTML(data);
		  } else {
			console.log("We connected to the server, but it returned an error.");
		  }
		};

		ourRequest.onerror = function() {
		  console.log("Connection error");
		};

		ourRequest.send();

});


function createHTML(pagesData) {
	var ourHTMLString = '';
for (i=0; i< pagesData.length; i++ ) {
	ourHTMLString += '<h2>' + pagesData[i].title.rendered + '</h2>';
}
	jQuery('#portal-content-right-space').html(ourHTMLString);
}
*/

// Ready Function
});