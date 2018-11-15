<?php include 'header.php'; ?>

	<style>
	.perspective {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: inline-block;
      margin: 0 auto;
      -webkit-perspective: 800px;
              perspective: 800px;
      -webkit-perspective-origin: center center;
              perspective-origin: center center;
    }
    .perspective .cube {
      position: relative;
      width: var(--size);
      height: var(--size);
      transition: .3s easeInOut;
      -webkit-transform-style: preserve-3d;
              transform-style: preserve-3d;
      -webkit-transform-origin: center center;
              transform-origin: center center;
      -webkit-transform: rotateY(90deg) rotateZ(90deg);
              transform: rotateY(90deg) rotateZ(90deg);
    }
    .perspective .cube:nth-child(2) {
      margin-left: 200px;
    }
    .perspective .cube .cube-face {
      position: absolute;
      width: var(--size);
      height: var(--size);
      opacity: var(--opacity);
    }
    .perspective .cube .cube-face.cube-face--top {
      -webkit-transform: rotateX(-90deg) translateY(var(--sizeHalfNeg));
              transform: rotateX(-90deg) translateY(var(--sizeHalfNeg));
      -webkit-transform-origin: top center;
              transform-origin: top center;
      background-color: var(--colorUD);
    }
    .perspective .cube .cube-face.cube-face--front {
      -webkit-transform: translateZ(var(--sizeHalf));
              transform: translateZ(var(--sizeHalf));
      background-color: var(--colorFB);
    }
    .perspective .cube .cube-face.cube-face--back {
      -webkit-transform: translateZ(var(--sizeHalfNeg)) rotateY(180deg);
              transform: translateZ(var(--sizeHalfNeg)) rotateY(180deg);
      background-color: var(--colorFB);
    }
    .perspective .cube .cube-face.cube-face--left {
      -webkit-transform: rotateY(270deg) translateX(var(--sizeHalfNeg));
              transform: rotateY(270deg) translateX(var(--sizeHalfNeg));
      -webkit-transform-origin: center left;
              transform-origin: center left;
      background-color: var(--colorLR);
    }
    .perspective .cube .cube-face.cube-face--right {
      -webkit-transform: rotateY(-270deg) translateX(var(--sizeHalf));
              transform: rotateY(-270deg) translateX(var(--sizeHalf));
      -webkit-transform-origin: top right;
              transform-origin: top right;
      background-color: var(--colorLR);
    }
    .perspective .cube .cube-face.cube-face--bottom {
      -webkit-transform: rotateX(-90deg) translateY(var(--sizeHalf));
              transform: rotateX(-90deg) translateY(var(--sizeHalf));
      -webkit-transform-origin: bottom left;
              transform-origin: bottom left;
      background-color: var(--colorUD);
    }

    @-webkit-keyframes twist {
      from {
        -webkit-transform: rotateY(0) rotateX(0);
                transform: rotateY(0) rotateX(0);
      }
      to {
        -webkit-transform: rotateX(360deg) rotateY(360deg);
                transform: rotateX(360deg) rotateY(360deg);
      }
    }

    @keyframes twist {
      from {
        -webkit-transform: rotateY(0) rotateX(0);
                transform: rotateY(0) rotateX(0);
      }
      to {
        -webkit-transform: rotateX(360deg) rotateY(360deg);
                transform: rotateX(360deg) rotateY(360deg);
      }
    }
    .cube {
      -webkit-animation: twist 5s infinite linear;
              animation: twist 5s infinite linear;
    }

    .window {
      width: 66.66%;
      position: relative;

    }

    .control {
      width: 33.33%;
      text-align: left;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      border: 1px solid #e0e0dd;
    }

    input, label {
      display: block;
    }

    label {
      margin-bottom: 5px;
    }

    input {
      margin-bottom: 15px;
    }

    :root {
      --colorUD: #ebda4e;
      --colorLR: #e4d344;
      --colorFB: #f0e05b;
      --size: 50px;
      --sizeHalf: 25px;
      --sizeHalfNeg: -25px;
      --opacity: 1;
    }

    .container-flex.container-align-center {
       align-items: stretch; 
    }
	</style>
  

	<div class="container-day container-flex container-align-center">
    <div class="window">
      <section class="perspective">
        <div class="cube">
          <div class="cube-face cube-face--top"></div>
          <div class="cube-face cube-face--front"></div>
          <div class="cube-face cube-face--back"></div>
          <div class="cube-face cube-face--left"></div>
          <div class="cube-face cube-face--right"></div>
          <div class="cube-face cube-face--bottom"></div>
        </div>
      </section>
    </div>

    <div class="control">
      <label for="size">Size</label>
      <input type="range" name="size" min="10" max="200" value="50" data-sizing="px">

      <label for="opacity">Opacity</label>
      <input type="range" name="opacity" min="0" max="10" value="10">

      <label for="colorUD">Top Bottom</label>
      <input type="color" name="colorUD" value="#ebda4e">

      <label for="colorLR">Left Right</label>
      <input type="color" name="colorLR" value="#e4d344">

      <label for="colorFB">Front Back</label>
      <input type="color" name="colorFB" value="#f0e05b">
    </div>
  </div>


	<script>

		const hero = document.querySelector('body');
		const cube = document.querySelector('.cube');
		const walk = 10;

		function shadow(e) {
			var width = hero.offsetWidth;
			var height = hero.offsetHeight;

			var x = e.offsetX;
			var y = e.offsetY;

			if ( this !== e.target ) {
				x = x + e.target.offsetLeft;
				y = y + e.target.offsetTop;
			}
			
			const walkX = Math.round(( x / width * walk ) - ( walk / 2 ));
			const walkY = Math.round(( y / height * walk ) - ( walk / 2 ));

			console.log(walkX, walkY)

			// console.log(walkX);
			cube.style.left = `${walkX}px`;
			cube.style.top = `${walkY}px`;
		}

		hero.addEventListener('mousemove', shadow);

		// ***************************************************************************************
		// Cube functionality
		// ***************************************************************************************

		const inputs = [].slice.call(document.querySelectorAll('input'));
		console.log(inputs)

		function handleUpdate(e) {
		  const suffix = this.dataset.sizing || '';
		  console.log(this.value);

		  if ( this.name == 'size' ) {
		    document.documentElement.style.setProperty(`--${this.name}`, this.value + suffix);
		    document.documentElement.style.setProperty(`--${this.name}Half`, (this.value / 2) + suffix);
		    document.documentElement.style.setProperty(`--${this.name}HalfNeg`, ((this.value / 2) * -1) + suffix);
		  } else if ( this.name == 'opacity' ) {
		    document.documentElement.style.setProperty(`--${this.name}`, (this.value / 10));
		  } else {
		    document.documentElement.style.setProperty(`--${this.name}`, this.value);
		  }

		}

		inputs.forEach( input => input.addEventListener('change', handleUpdate));
		inputs.forEach( input => input.addEventListener('mousemove', handleUpdate));
		
	</script>

<?php include 'footer.php'; ?>