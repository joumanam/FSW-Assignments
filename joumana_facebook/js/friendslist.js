$(document).ready(function(){

	$("form").submit(function(e){
        e.preventDefault();
    });
		
	friendslistAPI().then(users => {
		$.each(users, function(_index,user){
			$('<tr>').append(
			$('<td>').text(user.name).addClass("text-center text-uppercase").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%", "font-weight": "bold"}),
			$('<td>').text("Living in " + user.location).addClass("text-center").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%"}),
			$('<td>').text("Born in " + user.birthdate).addClass("text-center").css({"background-color": "#9baed5", "color": "purple", "font-size": "130%"}),
			$('<td>').append("<button type='button' id='add_" + user.id + "' class='btn btn-warning addFriend'>Remove Friend</button>").append("<button type='button' id='block_" + user.id + "' class='btn btn-danger blockBtn'>Block User</button>").addClass("text-center").css({"background-color": "#9baed5", "font-size": "130%"}),
			).appendTo("#result-table");
			})
		});
	

    async function friendslistAPI(){
		const response = await fetch("http://localhost/joumana_facebook/php/friendslist.php");
		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const articles = await response.json();
		return articles;
	}

});
	


	
