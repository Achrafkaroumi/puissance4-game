            var game_active = false; 
			var active_player = 0; 
			
			var gameboard = []; 
			var player_color = []; 
			
			player_color[1] = "rouge"; 
            player_color[2] = "bleu"; 

            var cmp1=0;
            var cmp2=0;

            var sonGlisse = new Audio("sound/coin.wav");
            var sonWin = new Audio("sound/winsound.wav");

function beginGame() {
                /*
				| 0,0 | 0,1 | 0,2 | 0,3 | 0,4 | 0,5 | 0,6 |
				| 1,0 | 1,1 | 1,2 | 1,3 | 1,4 | 1,5 | 1,6 |
				| 2,0 | 2,1 | 2,2 | 2,3 | 2,4 | 2,5 | 2,6 |
				| 3,0 | 3,1 | 3,2 | 3,3 | 3,4 | 3,5 | 3,6 |
				| 4,0 | 4,1 | 4,2 | 4,3 | 4,4 | 4,5 | 4,6 |
				| 5,0 | 5,1 | 5,2 | 5,3 | 5,4 | 5,5 | 5,6 |
				*/
		for (row=0; row<=5; row++) {
			gameboard[row] = [];
				for (col=0; col<=6; col++) {
					gameboard[row][col] = 0;
				}	
			}	
            	
		drawBoard(); 		//fonction dessiner le jeu	
		active_player = 1;  //le joueur qui est active(on commence par le joueur rouge)
        setUpTurn();        //affiche message contient le tour du joueur
        document.getElementById('game_status').style.visibility="hidden";
}


function drawBoard() {  //dessiner le jeu
    checkForWin(); // Vérifiez si un joueur a gagné.
    for (col = 0; col<=6; col++) {
        for (row=0; row<=5; row++) {
            document.getElementById('square_'+row+'_'+col).innerHTML ="<span class='piece player"+gameboard[row][col]+"'> </span>"; //dessiner les cercles
        }	
    }
}

function setUpTurn() {   //affiche message contient le tour du joueur
    if (game_active) { //le jeu est actif.
        document.getElementById('game_info').innerHTML = "Joueur actuel: <span class='player"+active_player+"'>(" + player_color[active_player] + ")</span>"; //Le tour du joueur
        document.getElementById('game_info').style.fontSize="22px";
        document.getElementById('game_info').style.color="white";
    }
}


function checkForWin() {  //vérifier le gagnant

     //vérifier horizontal
    for (i=1; i<=2; i++) {
        for (col = 0; col <=3; col++) {
            for (row = 0; row <=5; row++) {
                if (gameboard[row][col] == i) { 
                    if ((gameboard[row][col+1] == i) && (gameboard[row][col+2] == i) && (gameboard[row][col+3] == i)) {
                        endGame(i);  //La partie finit avec le joueur qui a remporté la victoire
                        document.getElementsByClassName('click_button').style.dispaly='none'; 
                        return true; //le jeu est terminé.
                    }
                }
               
            }
        }
    }
    

    //vérifier vertical
    for (i=1; i<=2; i++) {
        for (col = 0; col <=6; col++) {
            for (row = 0; row <=2; row++) { // 3 rows : 0,1,and 2            
                if (gameboard[row][col] == i) {
                    if ((gameboard[row+1][col] == i) && (gameboard[row+2][col] == i) && (gameboard[row+3][col] == i)) {
                        endGame(i); //La partie finit avec le joueur qui a remporté la victoire
                        document.getElementsByClassName('click_button').style.dispaly='none';
                        return true; //le jeu est terminé.
                    }
                }
               
            }
        }
    }
    



    //vérifier la diagonale vers le bas
    for (i=1; i<=2; i++) {
        for (col = 0; col <=3; col++) {
            for (row = 0; row <=2; row++) {
                if (gameboard[row][col] == i) {
                    if ((gameboard[row+1][col+1] == i) && (gameboard[row+2][col+2] == i) && (gameboard[row+3][col+3] == i)) {
                        endGame(i); //La partie finit avec le joueur qui a remporté la victoire
                        document.getElementsByClassName('click_button').style.dispaly='none';
                        return true; //le jeu est terminé
                    }
                }
                
            }
        }
    }
                 
    


    //vérifier la diagonale vers le haut
    for (i=1; i<=2; i++) {
        for (col = 0; col <=3; col++) {
            for (row = 3; row <=5; row++) {
                if (gameboard[row][col] == i) {
                    if ((gameboard[row-1][col+1] == i) && (gameboard[row-2][col+2] == i) && (gameboard[row-3][col+3] == i)) {
                        endGame(i); //La partie finit avec le joueur qui a remporté la victoire
                        document.getElementsByClassName('click_button').style.dispaly='none';
                        return true; //le jeu est terminé
                    }
                }
                
            }
        }
    }
}




function endGame(winningPlayer) {       //Fin du jeu
    game_active = false;
        if((winningPlayer)==1){  
            cmp1++;
        }else{
            cmp2++;
        }
    document.getElementById('message').innerHTML = "Le joueur " + player_color[winningPlayer]+" a gagné la partie!";
    document.getElementById('scorePLY').innerHTML= cmp1+" - "+cmp2;
    document.getElementById('scorePL').innerHTML= cmp1+" - "+cmp2; 
    document.getElementById('game_status').style.visibility="visible";
    sonWin.play();
}



function drop(col) {                //Drop circle
    sonGlisse.play();
    for (row=5; row>=0; row--) { 
        if (gameboard[row][col] == 0) {
            // définit la ligne vide par le numero du joueur active
            gameboard[row][col] = active_player;
            drawBoard(); //dessiner le tableau.
            
            if (active_player == 1) { 
                for(i=0;i<=6;i++){
                    document.getElementsByName("btn")[i].style.backgroundColor="blue";
                }
                active_player = 2;
                
            } else {
                for(i=0;i<=6;i++){
                    document.getElementsByName("btn")[i].style.backgroundColor="red";
                }
                active_player = 1;
                
            }
            setUpTurn(); //la tour du joueur actif
            return true;
        }
    }

}




