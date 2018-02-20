<?php include 'header.php'; ?>


  <style>
  html {
    font-size: 20px;
    font-weight: 200;
  }

    .panels {
      overflow: hidden;
      height: 600px;
      display: flex;
    }

    .panel {
      background: #6B0F9C;
      box-shadow: inset 0 0 0 5px rgba(255,255,255,0.1);
      color: white;
      text-align: center;
      align-items: center;
      /* Safari transitionend event.propertyName === flex */
      /* Chrome + FF transitionend event.propertyName === flex-grow */
      transition:
        font-size 0.7s cubic-bezier(0.61,-0.19, 0.7,-0.11),
        flex 0.7s cubic-bezier(0.61,-0.19, 0.7,-0.11),
        background 0.2s;
      font-size: 20px;
      background-size: cover;
      background-position: center;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }


    .panel1 { background-color: #ecdb4e;}
    .panel2 { background-color: #ecdb4e;} 
    .panel3 { background-color: #ecdb4e;} 
    .panel4 { background-color: #ecdb4e;} 
    .panel5 { background-color: #ecdb4e;} 

    .panel > * {
      margin:0;
      width: 100%;
      transition:transform 0.5s;
      flex: 1 0 auto;
      display: flex;
      justify-content: center; 
      align-items: center;
    }

    .panel > *:first-child {
      transform: translateY(-100%);
    }

    .panel.open-active > *:first-child {
      transform: translateY(0%);
    }

    .panel > *:last-child {
      transform: translateY(100%);
    }

    .panel.open-active > *:last-child {
      transform: translateY(0%);
    }

    .panel p {
      text-transform: uppercase;
      font-size: 2em;
      font-family: 'Amatic SC', cursive;
    }
    .panel p:nth-child(2) {
      font-size: 4em;
      transition: .7s ease-in-out;
    }

    .panel.open {
      flex: 5;
    }

    .panel.open p:nth-child(2) {
      font-size: 6em;
    }

    .cta {
      color:white;
      text-decoration: none;
    }

  </style>

    <div class="panels">
    <div class="panel panel1">
      <p>Hey</p>
      <p>Let's</p>
      <p>Dance</p>
    </div>
    <div class="panel panel2">
      <p>Give</p>
      <p>Take</p>
      <p>Receive</p>
    </div>
    <div class="panel panel3">
      <p>Experience</p>
      <p>It</p>
      <p>Today</p>
    </div>
    <div class="panel panel4">
      <p>Give</p>
      <p>All</p>
      <p>You can</p>
    </div>
    <div class="panel panel5">
      <p>Life</p>
      <p>In</p>
      <p>Motion</p>
    </div>
  </div>

  <script> 

    const panels = document.querySelectorAll('.panel');

    
    function togglePanel(el) {
      if ( !el.classList.contains('open')) {
        panels.forEach( panel => panel.classList.remove('open'))
      }
      el.classList.toggle('open');
    }

    function toggleActive(e) {
      if ( e.propertyName.includes('flex')) {
        this.classList.toggle('open-active');
      }
    }

    panels.forEach( panel => panel.addEventListener( 'click', function() {
      togglePanel(this);
    }));

    panels.forEach( panel => panel.addEventListener( 'transitionend', toggleActive ));

    

  </script>

<?php include 'footer.php'; ?>
