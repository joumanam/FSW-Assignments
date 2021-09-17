window.onload = function() {

    var pressStart = document.getElementById("start")
    var boundaries = document.getElementsByClassName("boundary");
    var endButton = document.getElementById("end");
    var gameBlock = document.getElementById("game");
    var game = 0;
    var end = false;
    var score = 0;
    var redBoundaries = false;

    pressStart.addEventListener('mouseover', function() {
        startGame();
        })

    pressStart.addEventListener('click', function() {
        resetGame();
        })

    function startGame() {
        game = 1                                                // game = 1 means it's ongoing
        end = false;
        for (var i=0; i<boundaries.length -1; i++) {
            boundaries[i].style.backgroundColor = "#eeeeee";
            boundaries[i].onmouseover = overBorders;
            }
        document.getElementById("status").innerHTML = "Begin by moving your mouse over the \"S\".";
        endButton.onmouseover = endGame;

    }

    function endGame() {
        end = true;
        if (redBoundaries == false || game == 1 || gameBlock.onmouseover) {
            score += 5;
            document.getElementById("status").innerHTML = "You Won! Your score is: " + score; 
            game = 0;
        }
     }
        
    function overBorders() {
        if (end == false) {
            if (game == 1) {
                game = 0;
                end = true;
                for (var i=0; i<boundaries.length -1; i++) {
                    boundaries[i].style.backgroundColor = "red";
                } 
            }  
            if (game == 0 || end == true) {
                score -= 10;
                document.getElementById("status").innerHTML = "Oops! You Lost. Your score is: " + score;
                redBoundaries = true;
            }

        }
    }

    function resetGame() {
        // end = false;
        // game = 0;
        score = 0;
    }

    

}
    