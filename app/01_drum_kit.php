<?php include 'header.php'; ?>

  <style>
  
    .keys {
      position: relative;
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-flex: 1;
      -webkit-flex: 1;
          -ms-flex: 1;
              flex: 1;
      width: calc(100vw - 100px);
      max-width: 1000px;
      margin: 0 auto;
      -webkit-box-align: center;
      -webkit-align-items: center;
          -ms-flex-align: center;
              align-items: center;
      -webkit-box-pack: center;
      -webkit-justify-content: center;
          -ms-flex-pack: center;
              justify-content: center;
      padding: 0 20px 0 20px;
    }

    .key {
      font-size: 1.5rem;
      -webkit-transition: all .07s;
      transition: all .1s;
      width: 9.09%;
      text-align: center;
      position: relative;
      padding: 300px 0 20px;
      background: #222;
      overflow: visible;
      margin: 2.5px;
      border-radius: 0 0 5px 5px; 
      font-size: 14px; 
    }

      .key.playing {
        box-shadow: 0 8px 6px -6px black;
        background: white; 
      }

      .key .alt-key {
        position: absolute;
        width: 50%;
        height: 100%;
        right: 0;
        top: 0;
        -webkit-transform: translate(calc(50% + 3px), -50%);
                transform: translate(calc(50% + 3px), -50%);
        background: #DFD4B4;
        z-index: 2;
        border-radius: 0 0 3px 3px; 
      }

      .key:first-child {
        border-left: none; 
      }

      .key:last-child {
        border-right: none; 
      }

    kbd {
      position: relative;
      top: 90%;
      font-size: 25px;
      font-family: helvetica, sans-serif;
      display: none; 
    }

  </style>

  <div class="container-day">

    <div class="keys">
      <div data-key="65" class="key">
        <kbd>A</kbd>
        <span class="sound">clap</span>
      </div>
      <div data-key="83" class="key">
        <kbd>S</kbd>
        <span class="sound">hihat</span>
      </div>
      <div data-key="68" class="key">
        <kbd>D</kbd>
        <span class="sound">kick</span>
      </div>
      <div data-key="70" class="key">
        <kbd>F</kbd>
        <span class="sound">openhat</span>
      </div>
      <div data-key="71" class="key">
        <kbd>G</kbd>
        <span class="sound">boom</span>
      </div>
      <div data-key="72" class="key">
        <kbd>H</kbd>
        <span class="sound">ride</span>
      </div>
      <div data-key="74" class="key">
        <kbd>J</kbd>
        <span class="sound">snare</span>
      </div>
      <div data-key="75" class="key">
        <kbd>K</kbd>
        <span class="sound">tom</span>
      </div>
      <div data-key="76" class="key">
        <kbd>L</kbd>
        <span class="sound">tink</span>
      </div>
    </div>
  </div>

  <audio data-key="65" src="assets/piano-1.mp3"></audio>
  <audio data-key="83" src="assets/piano-2.mp3"></audio>
  <audio data-key="68" src="assets/piano-3.mp3"></audio>
  <audio data-key="70" src="assets/piano-4.mp3"></audio>
  <audio data-key="71" src="assets/piano-5.mp3"></audio>
  <audio data-key="72" src="assets/piano-6.mp3"></audio>
  <audio data-key="74" src="assets/piano-7.mp3"></audio>
  <audio data-key="75" src="assets/piano-8.mp3"></audio>
  <audio data-key="76" src="assets/piano-9.mp3"></audio>

<script>

window.addEventListener('keydown', function(e) {
  const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
  const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
  if( !audio ) {return};
  audio.currentTime = 0;
  audio.play();
  key.classList.add('playing');
});

function removeTransition(e) {
  if (e.propertyName !== 'box-shadow') return;
  console.log(e.propertyName);
  this.classList.remove('playing');
};

const keys = document.querySelectorAll('.key');
keys.forEach( key => key.addEventListener('transitionend', removeTransition));

</script>

<?php include 'footer.php'; ?>
