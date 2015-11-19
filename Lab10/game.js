"use strict";

var numberOfBlocks = 9;
var targetBlocks = [];
var trapBlock;
var targetTimer = null;
var trapTimer = null;
var instantTimer =3000;


document.observe('dom:loaded', function(){
   	$("start").observe("click", function(){
    	$("state").innerHTML = "Ready!";
    	$("score").innerHTML = "0";
   		clearInterval(targetTimer);
   		clearInterval(trapTimer);
    	clearInterval(instantTimer);
    	setTimeout(startGame, 3000);
    });
  $("stop").observe("click", stopGame);
});

function startGame(){
	clearInterval(targetTimer);
   	clearInterval(trapTimer);
    clearInterval(instantTimer);
    startToCatch();
}
function stopGame(){
   $("state").innerHTML = "Stop";
   $("answer").innerHTML = "0/0";
}
function startToCatch(){
   $("state").innerHTML = "Catch!";
   setTimeout(startGame, 3000);
   
}

function showTargetBlocks(){
   $("state").innerHTML = "Memorize!";
   var block = $$(".blocks");
   for(var i = 0; i < numberOfBlocks; i++) block[targetBlocks[i]].addClassName("target");
   timer = setTimeout(loose, 3000);
}
function looose(){
	alert("you loose");
}



