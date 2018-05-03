<!DOCTYPE html>
<html>
<head>
<title>Snake</title>
</head>
<body style="background-color: black;">
<h1 id="1" style="color: white;text-align:center;font-size:500%;">SNAKE GAME</h1>
<p id="2" style="color: white;text-align:center;font-size:100%;">Created by togmar910</p>
<button id="3" style="width:70px;margin-left:910px" type="button" onclick="newgame()">Start</button>
<canvas id="myCanvas" width="1900" height="960" style="background-color:black ;"></canvas>

<script>
//Déclaration de toute les variables.
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
var x = 940;
var y = 480;
var ms = 90;
var direction = "droite";
var foodx =0;
var foody =0;
var score = 0;
var score_text ="Score:" + score;
var snake = [1, 1, 1, 1, 1, 1, 1, 1];
var length = snake.length;
var a= 0;
var b= 1;
var testx = 0;
var testy = 0;

//Fonctions de nettoyage des différent élement du canvas.

function reset() {
ctx.clearRect(0, 0, 1900, 960);
x = 940;
y = 480;
ms = 90;
direction = "droite";
foodx =0;
foody =0;
score = 0;
score_text ="Score:" + score;
snake = [1, 1, 1, 1, 1, 1, 1, 1];
length = snake.length;
a= 0;
b= 1;
testx = 0;
testy = 0;
loop = 'undefined';
newgame();
}
function clearsnake() {
	for (i = 0; i <=length; i++){

		if(b >= length){
		}
		else
		{
			ctx.clearRect(snake[a],snake[b], 20, 20);
			a +=2;
			b +=2;
		}
	}
	a= 0;
	b= 1;	
}
function clearfood() {
	ctx.clearRect(foodx, foody, 20, 20);
}

//Fonction de nettoyage des point pour éviter le score de ce superposé.

function clearpoint() {
	ctx.clearRect(0, 0, 160, 40);
}

//Fonction d'écoute des touche pour définir la direction.

function doKeyDown(evt){
	switch (evt.keyCode) {
	case 87:
	if(direction!="bas")
		{
		direction = "haut"
		}
	break;
	case 65: 
	if(direction!="droite")	
		{
		direction = "gauche"
		}		
	break;
	case 83:
	if(direction!="haut")	
		{	
		direction = "bas"
		}		
	break;
	case 68: 
	if(direction!="gauche")	
		{	
		direction = "droite"
		}
	break;
	}
}

//Fonction de dessin du seprent sur le canvas.

function drawsnake(){
	var yqueue= snake.pop();
	yqueue = y;
	snake.unshift(yqueue)
	var xqueue= snake.pop();
	xqueue = x;
	snake.unshift(xqueue)
	for (i = 0; i <=length; i++){
		if(b >= length){
		}
		else
		{
			ctx.fillStyle = "green";
			ctx.fillRect(snake[a],snake[b],20,20);
			a +=2;
			b +=2;
		}
	}
	a =0;
	b =1;
} 

//Fonction de construction du serpent au début du jeux.

function firstsnake(){
	for (i = 0; i <= length-2; i++){
		snake[i] = x;
		x-=20;
		i++;
	}
	for (i = 1; i <= length; i++){
		snake[i] = y;
		i++;
	}
	for (i = 0; i <=length; i++){
		if(b >= length){
		}
		else
		{
			ctx.fillStyle = "green";
			ctx.fillRect(snake[a],snake[b],20,20);
			a +=2;
			b +=2;
		}
	}
	a =0;
	b =1;
} 

//Fonction qui definie la direction du serpent et appel la fonction de dessin.

function directionsnake(){
	if(direction == "haut")
	{
		clearsnake();
		y -=20
		drawsnake();
	}
	else if (direction == "gauche")
	{
		clearsnake();
		x -=20
		drawsnake();
	}
	else if (direction == "bas")
	{
		clearsnake();
		y +=20
		drawsnake();
	}
	else if (direction == "droite")
	{
		clearsnake();
		x +=20
		drawsnake();
	}
}

//Fonction d'aggrandisement du serpent après avoir mangé une pomme

function agrandirserpent(){
	var finy= snake[length];
	var finx= snake[length-1];
	console.log(snake);
	if(direction == "haut")
	{
		snake.push(finx+20);
		snake.push(finy);
	}
	else if(direction == "bas")
	{
		snake.push(finx);
		snake.push(finy-20);
	}
	else if(direction == "gauche")
	{
		snake.push(finx+20);
		snake.push(finy);
	}
	else if(direction == "droite")
	{
		snake.push(finx-20);
		snake.push(finy);
	}
	length +=2 	
}

//Fonction de contrôle pour savoir si le serpent ce mange lui même.

function memanger(){
a=2;
b=3;
	for (i = 0; i <=length/2; i++){
		testx=snake[a];
		testy=snake[b];
		console.log(testy);
		console.log(testx);
		a +=2;
		b +=2;
		if(testx == x && testy == y)
		{
			reset();
		}
	}
a=0;
b=1;	
}
//Fonction de dessin pour la pomme.

function drawfood(){
	foody=40 + Math.floor(Math.random() * 900); 
	foodx=160 + Math.floor(Math.random() * 1720);
	for (i = 0; i <=length/2; i++){
		testx=snake[a];
		testy=snake[b];
		a +=2;
		b +=2;
		if(testx == foodx && testy == foody){
			foody=40 + Math.floor(Math.random() * 900); 
			foodx=160 + Math.floor(Math.random() * 1720);
			i= 0;
			a =0;
			b =1;
		}
	}
	a =0;
	b =1;
	foody = Math.ceil(foody / 20) * 20;
	foodx = Math.ceil(foodx / 20) * 20;
	ctx.fillStyle = "red";
	ctx.fillRect(foodx,foody,20,20);	
}

//Fonction d'ériture du score.

function scoretxt(){
ctx.font = "20px Arial";
ctx.fillStyle = "white";
ctx.fillText(score_text, 10, 30);
}

//Fonction principale du jeux

function game(){
	window.addEventListener( "keydown", doKeyDown, true);
	memanger();
	directionsnake();
	if(x == 1900 || x == -20 || y == 960 || y == -20)
	{
		reset();
	}
	if(x == foodx && y == foody){
		score += 10;
		score_text="Score:" + score;
		clearfood();
		clearpoint();
		drawfood();
		scoretxt();
		agrandirserpent();
	}
}

//Fonction permetant la désactivation des élément et le refresh de la fonction jeux tout les 60ms.

function newgame(){
	document.getElementById("1").style.display ="none";
	document.getElementById("2").style.display ="none";
	document.getElementById("3").style.display ="none";
	document.getElementById("myCanvas").style.border ="1px solid white";
	firstsnake();
	drawfood();
	scoretxt();
	if(typeof loop != 'undefined') {
		clearInterval(loop);
	}
	else {
		loop = setInterval(game, ms);
	}
}
</script>
</body>
</html>

