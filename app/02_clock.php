<?php include 'header.php'; ?>

  <div class="container-day">
    <div class="clock">
      <div class="clock-face">
        <div class="hand hour-hand">seconds</div>
        <div class="hand min-hand">seconds</div>
        <div class="hand second-hand">seconds</div>
      </div>
    </div>
  </div>

  <style>
  
    html {
      min-height: 100vh;
    }

    body {
      min-height: 100%;
    }

    .clock {
      width: 50vh;
      height: 50vh;
      border:15px solid #D27E79;
      background: #E7B9B6;
      border-radius:50%;
      margin:50px auto;
      position: relative;
      padding:2rem;
      margin-top: 50px;

      -webkit-box-shadow: 0px 0px 20px 0px rgba(176,59,59,.8);
      -moz-box-shadow: 0px 0px 20px 0px rgba(176,59,59,.8);
      box-shadow: 0px 0px 20px 0px rgba(176,59,59,.8);
    }

    .clock-face {
      position: relative;
      width: 100%;
      height: 100%;
      background: #E7B9B6;
      border-radius: 50%;
      transform: translateY(-3px); /* account for the height of the clock hands */
    }

    .hand {
      width:50%;
      height:10px;
      background:transparent;
      position: absolute;
      top:50%;
      /*transform: translateY(-50%);*/
      transform: rotate(90deg);
      transform-origin: 100%;
      transition: 1s linear;
  
      /*text*/
      text-align: left;
      font-size: 16px;
      line-height: 11px;
      color: #D27E79;
      font-weight: bold;
      /*padding-left: 15px;*/
    }



  </style>

  <script>

    const secondHand = document.querySelector('.second-hand');
    const minuteHand = document.querySelector('.min-hand');
    const hourHand = document.querySelector('.hour-hand');

    function setDate() {
      const now = new Date();
      
      const seconds = now.getSeconds();
      const secondsDegree = ((seconds / 60) * 360) + 90;
      secondHand.style.transform = `rotate(${secondsDegree}deg)`;

      if (seconds < 10) {
        var secondsReal = "0" + seconds;
      } else {
        var secondsReal = seconds;
      }

      secondHand.innerHTML = secondsReal + " seconds";

      const minutes = now.getMinutes();
      const minutesDegree = ((minutes / 60) * 360) + 90;
      minuteHand.style.transform = `rotate(${minutesDegree}deg)`;
      minuteHand.innerHTML = minutes + " minutes";

      const hours = now.getHours();
      const hoursDegree = ((hours / 12) * 360) + 90;
      hourHand.style.transform = `rotate(${hoursDegree}deg)`;
      if (hours > 12) {
        var hoursReal = hours - 12;
      }
      hourHand.innerHTML = hours + " hours";
  }
  setInterval(setDate, 1000);

  </script>

<?php include 'footer.php'; ?>
