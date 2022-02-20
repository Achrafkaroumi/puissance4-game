<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/acc.css" />
	<script type="text/javascript" src="js/game.js"></script>
	<link href="css/all.min.css" rel="stylesheet"/>
	<link href="css/fontawesome.min.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo-puissance.png" />
    <title>Puissance 4</title>
</head>

<body onload="beginGame();">   
  <?php include ('menu.php') ?>
	<div class="score">
		<?php echo "<span class='playes'><i class='fas fa-user p1'></i> <a href='modiferUser.php?idU=$_SESSION[login1]'><b>$_SESSION[username1]</b></a> </span>  <span id='scorePL'></span>      <span class='playes'><i class='fas fa-user p2'></i> <a href='modiferUser.php?idU=$_SESSION[login2]'><b>$_SESSION[username2]</b> </a></span>" ?>
	</div>

 <div class="container">    
		<div id="gameboard">
            <div id="game_info">  </div> 
			  <table id="game_table">
				<thead>
					<tr>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(0);"></button></td> 
						<td class="bt"><button class="click_button" name="btn" onclick="drop(1);"></button></td>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(2);"></button></td>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(3);"></button></td>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(4);"></button></td>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(5);"></button></td>
						<td class="bt"><button class="click_button" name="btn" onclick="drop(6);"></button></td>
					</tr>
                </thead>
				<script>
				for (var row=0; row<=5; row++) {
					document.writeln("<tr>");	
					for (var col=0; col<=6; col++) {
						document.writeln("<td id='square_" + row + "_"+ col +"' class='board_square'></td>");							
					}
					document.writeln("</tr>");	
				}												
                </script>

            </table>
        </div>
    </div>
		<div id="game_status">
			<span><i class="fas fa-check-circle"></i></span>
			<h1 id="message"></h1>
			<h1 id="scorePLY"></h1>
			<a class="restart" onclick="beginGame();">Restart</a> <a class="close" href="deconnect.php">Quitter</a>
		</div>
</body>
</html>