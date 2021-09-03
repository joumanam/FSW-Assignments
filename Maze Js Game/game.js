
window.onload = function() {
    var start = document.getElementById("start");
    var end = document.getElementById("end");
    start.onmouseover = startGame;
    var score = 0;

    var lost = false;
    var ending = false;

    
    function startGame() {

        ending = false;
        lost = false;
        var boundaries = document.getElementsByClassName("boundary");
        for (var i=0; i<boundaries.length -1; i++) {
            boundaries[i].style.backgroundColor = "#eeeeee";
            boundaries[i].onmouseover = overBorders;
        }
        document.getElementById("status").innerHTML = "Begin by moving your mouse over the \"S\".";
        end.onmouseover = endGame;


    function overBorders() {
        if(!ending) {
            lost = true;
            var boundaries = document.getElementsByClassName("boundary");
            for (var i=0; i<boundaries.length -1; i++) {
                boundaries[i].style.backgroundColor = "red";
            }
             score -= 10;
            document.getElementById("status").innerHTML = "You lost! " + score;}
    }}

    function endGame() {
        ending = true;
        if(!lost) {
            score += 5;
            document.getElementById("status").innerHTML = "You won! " + score;
        }
  
}}
	
	
		