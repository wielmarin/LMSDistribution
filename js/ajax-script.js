jQuery( document ).ready(function() {

// Portal menu load page in space
jQuery('#portal-content-side-list a').click(function() {
	var clickedLink = jQuery(this).attr('href');
	jQuery('#portal-content-right-space').load(clickedLink);
});


// Tile menu load page in space
jQuery('#portal-content-right-space').on("click","a", function() {
	var clickedTile = jQuery(this).attr('href');
	jQuery('#portal-content-right-space').load(clickedTile);
});


/* ABANDON ALL THIS WORK??!!
var childTitle;
var pageID;
var ourHTMLString;
var childArray;

jQuery('.portalmenu a').click(function() {
	
	// var menuItem = jQuery(this).attr('id');
	var slug = jQuery(this).attr('href').split('/');
	slug = slug[slug.length - 2]; // Slug from clicked item retrieved
	// console.log(slug); 
	
	var ourRequest = new XMLHttpRequest(); // Get all posts in the portal
		ourRequest.open('GET', 'http://localhost/lms/wp-json/wp/v2/pages?categories=7'); 
		ourRequest.onload = function() {
		  if (ourRequest.status >= 200 && ourRequest.status < 400) {
			var portalPosts = JSON.parse(ourRequest.responseText); // Saved as 'portalPosts'
			
			getPageId(portalPosts); // Run function to get page ID
			loopAgain(); // Wasn't working
		//	getParent(portalPosts); // Run function to get page Parent
			//createHTML(childTitle); // Put title into HTML
			
			
	  } else {
			console.log("We connected to the server, but it returned an error.");
		  }
		};

		ourRequest.onerror = function() {
		  console.log("Connection error");
		};

		ourRequest.send();

	// Load Page with specific name fallback
	// jQuery('#portal-content-right-space').load('/LMS/wp-content/themes/LMS_distribution/portal' + menuItem + '.html');
	
// Function to get page ID from Slug	
function getPageId(portalPosts) { // Get page IDs from pages equal to slug
	for (i=0; i< portalPosts.length; i++ ) {
		if	(portalPosts[i].slug == slug) {
			pageID = portalPosts[i].id;
			console.log(pageID);
		}
	}
};



function loopAgain() {
var secondRequest = new XMLHttpRequest();
			secondRequest.open('GET', 'http://localhost/lms/wp-json/wp/v2/pages?parent=' + pageID);
			console.log('http://localhost/lms/wp-json/wp/v2/pages?parent=' + pageID);
			secondRequest.onload = function() {
				console.log(secondRequest.status);
			  if (secondRequest.status >= 200 && secondRequest.status < 400) {
				var data = JSON.parse(secondRequest.responseText);
				createPortalBox(data);
				console.log(data);

			  } else {
				
				 
				    
				
				console.log("Second We connected to the server, but it returned an error.");
			  }
			};

		secondRequest.onerror = function() {
		  console.log("Connection error");
		};

		secondRequest.send();
};
		// Build HTML for display
			function createPortalBox(data) {
				var ourHTMLString = '';
				var reversed = data.reverse();
				for (i=0; i< data.length; i++ ) {
					ourHTMLString += '<div class=" class="portalmenu">' +
					'<a href=" ' + data[i].link + ' " class="portalbox">' +
					'<img src="/lms/wp-content/uploads/2018/08/portal-video-poster.jpg" width=100% />' +
					'<h2 class="portalbox-title">' + data[i].title.rendered + '</h2>' +
					
					'</a>' +
					'</div>'
					;
				}
					jQuery('#portal-content-right-space').html(ourHTMLString); // Put HTML in div
			}

	
}); // End Click Function

******/




});