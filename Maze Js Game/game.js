
window.onload = function() {
    var start = document.getElementById("start");
    var end = document.getElementById("end");
    start.onmouseover = startGame;
    start.onclick = resetGame;
    var score = 0;

    var lost = false;
    var ending = false;

    var boundaries = document.getElementsByClassName("boundary");

    
    function startGame() {

        for (var i=0; i<boundaries.length -1; i++) {
            boundaries[i].style.backgroundColor = "#eeeeee";
            boundaries[i].onmouseover = overBorders;
        }
        document.getElementById("status").innerHTML = "Begin by moving your mouse over the \"S\".";
        end.onmouseover = endGame;
       
    }

    

    function overBorders() {
        if(!ending) {
            lost = true;
            for (var i=0; i<boundaries.length -1; i++) {
                boundaries[i].style.backgroundColor = "red";
            }
            document.getElementById("status").innerHTML = "You lost! " + score;}
            ending = true;

    }

    function endGame() {
        ending = true;
        if(!lost) {
            document.getElementById("status").innerHTML = "You won! " + score;
        }
   
}
    
    function resetGame() {
        ending = true;
        score = 0;
        document.getElementById("status").innerHTML = "Begin by moving your mouse over the \"S\".";
        for (var i=0; i<boundaries.length -1; i++) {
            boundaries[i].style.backgroundColor = "#eeeeee";
        }
    }





}
	
	
		