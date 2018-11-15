<?php include 'header.php'; ?>

  <div class="container-day">
    <ul id="bands"></ul>
  </div>

  <style>
  
    #bands {
      list-style: inside square;
      font-size: 20px;
      background: white;
      width: 500px;
      margin: auto;
      padding: 0;
      box-shadow: 0 0 0 20px rgba(0, 0, 0, 0.05);
    }
    #bands li {
      border-bottom: 1px solid #efefef;
      padding: 20px;
    }
    #bands li:last-child {
      border-bottom: 0;
    }

    a {
      color: #ffc600;
      text-decoration: none;
    }



  </style>

  <script>
    const bands = ['The Plot in You', 'The Devil Wears Prada', 'Pierce the Veil', 'Norma Jean', 'The Bled', 'Say Anything', 'The Midway State', 'We Came as Romans', 'Counterparts', 'Oh, Sleeper', 'A Skylit Drive', 'Anywhere But Here', 'An Old Dog'];

    function strip(band) {
      return band.replace(/^(a |the |an )/i, '').trim();
    }

    const sortedBands = bands.sort(( a, b ) => strip(a) > strip(b) ? 1 : -1 );

    console.log(sortedBands)
    

  </script>

<?php include 'footer.php'; ?>
