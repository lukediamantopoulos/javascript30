<?php include 'header.php'; ?>
  

  <style>

  </style>

  <div class="container-day">
    <div class="container-disclaimer">
      <h3 class="disclaimer-text">Some serious console loggin' going on</h3>
    </div>
  </div>
    

  <script>

    const pressed = [];
    const code = 'color';
    const colors = [ '#FF7767', '#ebda4e', '#e1f7d5', '#8DC5D3', '#F6DDA2', '#A992C9', '#949391', '#BEDECD'];

    function randomColor(oldColor) {
      let newColor = colors[ Math.floor( Math.random() * colors.length ) ];

      if (newColor === oldColor) {
        randomColor( oldColor ); // Run function again
        console.log('colors ');
      } else {
        console.log(newColor);
        return newColor;
      }
    }


    window.addEventListener('keyup', (e) => {

      // Check if color is the same
      let currentColor = getComputedStyle(document.body).getPropertyValue('--c_accent');
      let color = randomColor(currentColor);

      pressed.push(e.key);
      pressed.splice(-code.length -1, pressed.length - code.length); // Removes a number each time
      if( pressed.join('').includes(code)) {
        document.documentElement.style.setProperty(`--c_accent`, color );
      }
    })
  </script>

<?php include 'footer.php'; ?>