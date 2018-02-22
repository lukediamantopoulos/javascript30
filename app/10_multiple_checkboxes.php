<?php include 'header.php'; ?>
  

  <style>

	.inbox {
	  max-width:400px;
	  margin:50px auto;
	  background:white;
	  border-radius:5px;
	  box-shadow: 5px 5px 0 rgba(25,25,25,0.1);
	}

	.item {
	  display:flex;
	  align-items:center;
	  border-bottom: 1px solid #F1F1F1;
	  overflow: hidden;
	}

	.item:last-child {
	  border-bottom:0;
	}
	
	input:checked + label:after {
		transform: translate(0%, -50%);
	}

	input[type="checkbox"] {
	  margin:20px;
	}

	label {
		position: relative;
	 	margin:0;
	 	padding:5px;
	 	transition:all 0.3s ease-in-out;
	 	overflow: hidden;
	 	display: flex;
	 	align-items: center;
	 	align-self: stretch;
	}

	label:after {
		content: '';
		position: absolute;
		top: 50%;
		left: 0;
		transform: translateY(-50%);
		width: 100%;
		height: 4px;
		background: #ebda4e;
		opacity: .6;
		transform: translate(-100%, -50%);
		transition:all 0.3s ease-in-out;
	}

	.details {
	  text-align: center;
	  font-size: 15px;
	}
  </style>

  <div class="inbox">
    <div class="item">
      <input id="checkbox-1" type="checkbox">
      <label for="checkbox-1">This is an inbox layout.</label>
    </div>
    <div class="item">
      <input id="checkbox-2" type="checkbox">
      <label for="checkbox-2">Check one item</label>
    </div>
    <div class="item">
      <input id="checkbox-3" type="checkbox">
      <label for="checkbox-3">Hold down your Shift key</label>
    </div>
    <div class="item">
      <input id="checkbox-4" type="checkbox">
      <label for="checkbox-4">Check a lower item</label>
    </div>
    <div class="item">
      <input id="checkbox-5" type="checkbox">
      <label for="checkbox-5">Everything inbetween </label>
    </div>
    <div class="item">
      <input id="checkbox-6" type="checkbox">
      <label for="checkbox-6">Try do it with out any libraries</label>
    </div>
    <div class="item">
      <input id="checkbox-7" type="checkbox">
      <label for="checkbox-7">Just regular JavaScript</label>
    </div>
    <div class="item">
      <input id="checkbox-8" type="checkbox">
      <label for="checkbox-8">Good Luck!</label>
    </div>
    <div class="item">
      <input id="checkbox-9" type="checkbox">
      <label for="checkbox-9">Don't forget to tweet your result!</label>
    </div>
  </div>
    
  
  <script>
  	let lastChecked;
  	const checkboxes = document.querySelectorAll('.inbox input[type="checkbox"]');

  	function handleCheck(e) {
  		let inBetween = false;
  		if (e.shiftKey && this.checked) {
  			checkboxes.forEach( checkbox => {
  				if (checkbox === this || checkbox === lastChecked) {
  					inBetween = !inBetween;
  				}
  				if (inBetween) {
  					checkbox.checked = true;
  				}
  			})
  		}
  		lastChecked = this;
  	}

  	checkboxes.forEach( checkbox => checkbox.addEventListener('click', handleCheck));


  </script>

<?php include 'footer.php'; ?>