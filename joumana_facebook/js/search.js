$(document).ready(function(){

	$("form").submit(function(e){
        e.preventDefault();
    });

// We're displaying the search results in a table

	$("#search-btn").click(async function() {
	$("#result-table tr").remove();
	var input = "";
	input = $("#search-box").val();
	if(input != "") {
		await findUsersAPI(input).then(users => {
			$.each(users, function(_index,user){
				$('<tr>').append(
				$('<td>').text(user.name).addClass("text-center text-uppercase").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%", "font-weight": "bold"}),
				$('<td>').text("Living in " + user.location).addClass("text-center").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%"}),
				$('<td>').text("Born in " + user.birthdate).addClass("text-center").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%"}),
				$('<td>').append("<button type='button' id='add_" + user.id + "' class='btn btn-success addFriend'>Add Friend</button>").append("<button type='button' id='block_" + user.id + "' class='btn btn-danger blockBtn'>Block User</button>").addClass("text-center").css({"background-color": "#9baed5", "font-size": "130%"}),
				).appendTo("#result-table");
			})
		});
	}
	})

    async function findUsersAPI(name){
		const response = await fetch("http://localhost/joumana_facebook/php/search.php", { 
			method: 'POST',
			body: new URLSearchParams({
				"search": name
			})
	})


		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const name_arr = await response.json();
		return name_arr;
	}

});
	
// What happens when we press Add Friend

$("#add_").click(async function() {
	
	})
	
