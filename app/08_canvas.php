<?php include 'header.php'; ?>
  
  <canvas id="draw"></canvas>

  <style>
	canvas {
		position: fixed;
		top: 0;
		left: 0;
		z-index: 0;
		width: 100vw;
		height: 100vh;
	}
  </style>
  	
  
  <script>

  	const canvas = document.querySelector('#draw');
  	const ctx = canvas.getContext('2d');
  	canvas.width = window.innerWidth;
  	canvas.height = window.innerHeight;
  	ctx.strokeStyle = '#ebda4e';
  	ctx.lineJoin = 'round';
  	ctx.lineCap = 'round';
  	ctx.lineWidth = 25;
  	// ctx.globalCompositeOperation = 'multiply';

  	let isDrawing = false;
  	let lastX = 0;
  	let lastY = 0;
  	let hue = 0;

  	function draw(e) {
  		if(!isDrawing) return;

  		// Turn Y value into HSL value
  		hue = (e.offsetY / 360) * 100;

  		ctx.strokeStyle = `hsl( ${hue}, 100%, 50%)`;
  		ctx.beginPath();
  		ctx.moveTo(lastX, lastY);
  		ctx.lineTo(e.offsetX, e.offsetY);
  		ctx.stroke();

  		[lastX, lastY] = [e.offsetX, e.offsetY]; 
  	}

  	canvas.addEventListener('mousedown',(e) => {
  		isDrawing = true;
  		[lastX, lastY] = [e.offsetX, e.offsetY];
  	});

  	canvas.addEventListener('mousemove', draw);
  	canvas.addEventListener('mouseup',() => isDrawing = false);
  	canvas.addEventListener('mouseout',() => isDrawing = false);




  </script>

<?php include 'footer.php'; ?>