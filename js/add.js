var $input = document.getElementById('searchBox');
var baseUrl = "https://sg.media-imdb.com/suggests/";
var $result = document.getElementById('result');
var body = document.getElementsByTagName('body');

$input.addEventListener('keyup', function(){

	//clearing blank spaces from input
	var cleanInput = $input.value.replace(/\s/g, "");
	
	//clearing result div if the input box in empty
	if(cleanInput.length === 0) {
		$result.innerHTML = "";
	}
	
	if(cleanInput.length > 0) {
		
		var queryUrl = baseUrl + cleanInput[0].toLowerCase() + "/" 
					  + cleanInput.toLowerCase()
					  + ".json";	
		$.ajax({
		    
		    url: queryUrl,
		    dataType: 'jsonp',
		    cache: true,
		    jsonp: false,
		    jsonpCallback: "imdb$" + cleanInput.toLowerCase()
		
		}).done(function (result) {
	    	
	    	//clearing result div if there is a valid response
	    	if(result.d.length > 0) {
	    		$result.innerHTML = "";
	    	}
		    
		    for(var i = 0; i < result.d.length; i++) {

		    	var category = result.d[i].id.slice(0,2);
		    	
		    	if(category === "tt" || category === "nm") {		    		
		    		//row for risplaying one result
		    		var resultRow = document.createElement('span');
		    		resultRow.setAttribute('class', 'resultRow');
		    		var destinationUrl;

		    		if(category === "tt") {
		    			destinationUrl = "http://www.imdb.com/title/" + result.d[i].id;
		    		} else {
		    			destinationUrl = "http://www.imdb.com/name/" + result.d[i].id;
		    		}
		    		
		    		//resultRow.setAttribute('href', destinationUrl);
		    		//resultRow.setAttribute('target', '_blank');
		    		
		    		//creating and setting poster
		    		var poster = document.createElement('img');
		    		poster.setAttribute('class', 'poster');

		    		if(result.d[i].i) {
			    		var imdbPoster = result.d[i].i[0];
			    		//imdbPoster = imdbPoster.replace("._V1_.jpg", "._V1._SX40_CR0,0,40,54_.jpg");
			    		/*var posterUrl = 
			    			"http://i.embed.ly/1/display/resize?key=798c38fecaca11e0ba1a4040d3dc5c07&url="
			    			+ imdbPoster
			    			+ "&height=54&width=40&errorurl=http%3A%2F%2Flalwanivikas.github.io%2Fimdb-autocomplete%2Fimg%2Fnoimage.png&grow=true"
			    		poster.setAttribute('src', posterUrl);*/
			    		poster.setAttribute('src',imdbPoster);
		    		}

		    		//creating and setting description

		    		var description = document.createElement('div');
		    		description.setAttribute('class', 'description');
		    		var name = document.createElement('h4');
		    		var snippet = document.createElement('h5');

		    		if(category === "tt" && result.d[i].y) {
		    			name.innerHTML = result.d[i].l + " (" + result.d[i].y + ")";
		    		} else {
		    			name.innerHTML = result.d[i].l;
		    		}
		    		snippet.innerHTML = result.d[i].s;

		    		// Show user choice

		    		$(description).append(name);
		    		$(description).append(snippet);
		    		$(resultRow).append(poster);
		    		$(resultRow).append(description);

		    		// Set user choice

		    		resultRow.setAttribute('data-imdbID',result.d[i].id);
		    		resultRow.setAttribute('data-title',result.d[i].l);
		    		resultRow.setAttribute('data-year',result.d[i].y);
		    		resultRow.setAttribute('data-poster',imdbPoster);

		    		$("#result").append(resultRow);

		    	}
		    }
	
		    $(".resultRow").click(function() {
				$("#imdbID").val($(this).attr('data-imdbid'));
				$("#title").val($(this).attr('data-title'));
				$("#year").val($(this).attr('data-year'));
				$("#poster").val($(this).attr('data-poster'));
				$(".preview").empty();
				$(this).clone().appendTo(".preview");
				$result.innerHTML = "";
				$(".btnSave").removeAttr("disabled");
			});

		});
	}

});