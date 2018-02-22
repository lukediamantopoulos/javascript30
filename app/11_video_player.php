<?php include 'header.php'; ?>
  

  <style>

    .player {
      max-width:750px;
      border:5px solid rgba(0,0,0,0.2);
      box-shadow:0 0 20px rgba(0,0,0,0.2);
      position: relative;
      font-size: 0;
      overflow: hidden;
    }

    /* This css is only applied when fullscreen is active. */
    .player:fullscreen {
      max-width: none;
      width: 100%;
    }

    .player:-webkit-full-screen {
      max-width: none;
      width: 100%;
    }

    .player__video {
      width: 100%;
    }

    .player__button {
      background:none;
      border:0;
      line-height:1;
      color:white;
      text-align: center;
      outline:0;
      padding: 0;
      cursor:pointer;
      max-width:50px;
    }

    .player__button:focus {
      border-color: #ffc600;
    }

    .player__slider {
      width:10px;
      height:30px;
    }

    .player__controls {
      display:flex;
      position: absolute;
      bottom:0;
      width: 100%;
      transform: translateY(100%) translateY(-5px);
      transition:all .3s;
      flex-wrap:wrap;
      background:rgba(0,0,0,0.1);
    }

    .player:hover .player__controls {
      transform: translateY(0);
    }

    .player:hover .progress {
      height:15px;
    }

    .player__controls > * {
      flex:1;
    }

    .progress {
      flex:10;
      position: relative;
      display:flex;
      flex-basis:100%;
      height:5px;
      transition:height 0.3s;
      background:rgba(0,0,0,0.5);
      cursor:ew-resize;
    }

    .progress__filled {
      width:50%;
      background:#ffc600;
      flex:0;
      flex-basis:50%;
    }

    /* unholy css to style input type="range" */

    input[type=range] {
      -webkit-appearance: none;
      background:transparent;
      width: 100%;
      margin: 0 5px;
    }
    input[type=range]:focus {
      outline: none;
    }
    input[type=range]::-webkit-slider-runnable-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0 0 1px rgba(13, 13, 13, 0);
      background: rgba(255,255,255,0.8);
      border-radius: 1.3px;
      border: 0.2px solid rgba(1, 1, 1, 0);
    }
    input[type=range]::-webkit-slider-thumb {
      height: 15px;
      width: 15px;
      border-radius: 50px;
      background: #ffc600;
      cursor: pointer;
      -webkit-appearance: none;
      margin-top: -3.5px;
      box-shadow:0 0 2px rgba(0,0,0,0.2);
    }
    input[type=range]:focus::-webkit-slider-runnable-track {
      background: #bada55;
    }
    input[type=range]::-moz-range-track {
      width: 100%;
      height: 8.4px;
      cursor: pointer;
      box-shadow: 1px 1px 1px rgba(0, 0, 0, 0), 0 0 1px rgba(13, 13, 13, 0);
      background: #ffffff;
      border-radius: 1.3px;
      border: 0.2px solid rgba(1, 1, 1, 0);
    }
    input[type=range]::-moz-range-thumb {
      box-shadow: 0 0 0 rgba(0, 0, 0, 0), 0 0 0 rgba(13, 13, 13, 0);
      height: 15px;
      width: 15px;
      border-radius: 50px;
      background: #ffc600;
      cursor: pointer;
    }

  </style>

  <div class="player">
     <video class="player__video viewer" src="https://player.vimeo.com/external/194837908.sd.mp4?s=c350076905b78c67f74d7ee39fdb4fef01d12420&profile_id=164"></video>

     <div class="player__controls">
       <div class="progress">
        <div class="progress__filled"></div>
       </div>
       <button class="player__button toggle" title="Toggle Play">PLay</button>
       <input type="range" name="volume" class="player__slider" min=0 max="1" step="0.05" value="1">
       <input type="range" name="playbackRate" class="player__slider" min="0.5" max="2" step="0.1" value="1">
       <button data-skip="-10" class="player__button"> 10s</button>
       <button data-skip="25" class="player__button">25s </button>
     </div>
   </div>
    
  
  <script>

    /* Get Our Elements */
    const player = document.querySelector('.player');
    const video = player.querySelector('.viewer');
    const progress = player.querySelector('.progress');
    const progressBar = player.querySelector('.progress__filled');
    const toggle = player.querySelector('.toggle');
    const skipButtons = player.querySelectorAll('[data-skip]');
    const ranges = player.querySelectorAll('.player__slider');

    /* Build out functions */
    function togglePlay() {
      const method = video.paused ? 'play' : 'pause';
      video[method]();
    }

    function updateButton() {
      const icon = this.paused ? '►' : '❚ ❚';
      console.log(icon);
      toggle.textContent = icon;
    }

    function skip() {
     video.currentTime += parseFloat(this.dataset.skip);
    }

    function handleRangeUpdate() {
      video[this.name] = this.value;
    }

    function handleProgress() {
      const percent = (video.currentTime / video.duration) * 100;
      progressBar.style.flexBasis = `${percent}%`;
    }

    function scrub(e) {
      const scrubTime = (e.offsetX / progress.offsetWidth) * video.duration;
      video.currentTime = scrubTime;
    }

    /* Hook up the event listeners */
    video.addEventListener('click', togglePlay);
    video.addEventListener('play', updateButton);
    video.addEventListener('pause', updateButton);
    video.addEventListener('timeupdate', handleProgress);

    toggle.addEventListener('click', togglePlay);
    skipButtons.forEach(button => button.addEventListener('click', skip));
    ranges.forEach(range => range.addEventListener('change', handleRangeUpdate));
    ranges.forEach(range => range.addEventListener('mousemove', handleRangeUpdate));

    let mousedown = false;
    progress.addEventListener('click', scrub);
    progress.addEventListener('mousemove', (e) => mousedown && scrub(e));
    progress.addEventListener('mousedown', () => mousedown = true);
    progress.addEventListener('mouseup', () => mousedown = false);




  </script>

<?php include 'footer.php'; ?>