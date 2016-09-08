function changeCanvasSize(){
	var canvas = document.getElementById("game-canvas");
	canvas.style.cursor = "none";
	var love_image = new Image();
	
	love_image.src = "images/love.png";
	love_image.style.width = "10px";
	love_image.style.height = "10px";

	canvas.addEventListener("mousemove",animateLove);
}

function animateLove(mouseEvent){
	var canvas = document.getElementById('game-canvas');
	var love_image =  new Image();

	love_image.src = "images/love.png";

	canvas.getContext("2d").drawImage(love_image,mouseEvent.offsetX,mouseEvent.offsetY);
}