<?php include 'header.php'; ?>
  
  <div class="container-day">
    <div class="container-disclaimer">
      <h3 class="disclaimer-text">Check the console</h3>
    </div>
  </div>

  <style>

  </style>
  
  
  <script>

    // Some data we can work with

    const inventors = [
      { first: 'Albert', last: 'Einstein', year: 1879, passed: 1955 },
      { first: 'Isaac', last: 'Newton', year: 1643, passed: 1727 },
      { first: 'Galileo', last: 'Galilei', year: 1564, passed: 1642 },
      { first: 'Marie', last: 'Curie', year: 1867, passed: 1934 },
      { first: 'Johannes', last: 'Kepler', year: 1571, passed: 1630 },
      { first: 'Nicolaus', last: 'Copernicus', year: 1473, passed: 1543 },
      { first: 'Max', last: 'Planck', year: 1858, passed: 1947 },
      { first: 'Katherine', last: 'Blodgett', year: 1898, passed: 1979 },
      { first: 'Ada', last: 'Lovelace', year: 1815, passed: 1852 },
      { first: 'Sarah E.', last: 'Goode', year: 1855, passed: 1905 },
      { first: 'Lise', last: 'Meitner', year: 1878, passed: 1968 },
      { first: 'Hanna', last: 'Hammarström', year: 1829, passed: 1909 }
    ];

    const flavours = ['Chocolate Chip', 'Kulfi', 'Caramel Praline', 'Chocolate', 'Burnt Caramel', 'Pistachio', 'Rose', 'Sweet Coconut', 'Lemon Cookie', 'Toffeeness', 'Toasted Almond', 'Black Raspberry Crunch', 'Chocolate Brownies', 'Pistachio Almond', 'Strawberry', 'Lavender Honey', 'Lychee', 'Peach', 'Black Walnut', 'Birthday Cake', 'Mexican Chocolate', 'Mocha Almond Fudge', 'Raspberry'];

    const people = ['Beck, Glenn', 'Becker, Carl', 'Beckett, Samuel', 'Beddoes, Mick', 'Beecher, Henry', 'Beethoven, Ludwig', 'Begin, Menachem', 'Belloc, Hilaire', 'Bellow, Saul', 'Benchley, Robert', 'Benenson, Peter', 'Ben-Gurion, David', 'Benjamin, Walter', 'Benn, Tony', 'Bennington, Chester', 'Benson, Leana', 'Bent, Silas', 'Bentsen, Lloyd', 'Berger, Ric', 'Bergman, Ingmar', 'Berio, Luciano', 'Berle, Milton', 'Berlin, Irving', 'Berne, Eric', 'Bernhard, Sandra', 'Berra, Yogi', 'Berry, Halle', 'Berry, Wendell', 'Bethea, Erin', 'Bevan, Aneurin', 'Bevel, Ken', 'Biden, Joseph', 'Bierce, Ambrose', 'Biko, Steve', 'Billings, Josh', 'Biondo, Frank', 'Birrell, Augustine', 'Black Elk', 'Blair, Robert', 'Blair, Tony', 'Blake, William'];

    // Array.prototype.filter()
    // 1. Filter the list of inventors for those who were born in the 1500's
    console.log('*****************************************');
    console.log('1 .filter()');

    const fifteen = inventors.filter(inventor => ( inventor.year >= 1500 && inventor.year < 1600))
    console.table(fifteen);

    // Array.prototype.map()
    // 2. Give us an array of the inventors' first and last names

    console.log('*****************************************');
    console.log('2 .map()');

    const firstLast = inventors.map( inventor => `${inventor.first} ${inventor.last}`);
    console.log(firstLast);

    // Array.prototype.sort()
    // 3. Sort the inventors by birthdate, oldest to youngest

    console.log('*****************************************');
    console.log('3 .sort()');

    // Long way
    // const ordered = inventors.sort(function(a, b) {
    //   if ( a.year > b.year) {
    //     return 1;
    //   } else {
    //     return -1;
    //   }
    // });

    const ordered = inventors.sort( (a, b) => a.year > b.year ? 1 : -1);

    console.table( ordered);

    // Array.prototype.reduce()
    // 4. How many years did all the inventors live?

    console.log('*****************************************');
    console.log('4 .reduce()');

    const totalYears = inventors.reduce( (total, inventor) => {
      return total + (inventor.passed - inventor.year);
    }, 0);
    console.log(totalYears)

    // 5. Sort the inventors by years lived

    console.log('*****************************************');
    console.log('5 .sort()');

    const oldest = inventors.sort(function( a, b ) {
      const guy1 = a.year - a.passed;
      const guy2 = b.year - b.passed;
      return guy1 > guy2 ? 1 : -1;
    })
    console.table(oldest)

    // 6. create a list of Boulevards in Paris that contain 'de' anywhere in the name
    // https://en.wikipedia.org/wiki/Category:Boulevards_in_Paris

    // const category = document.querySelector('.mw-category');
    // const categoryLinks = Array.from( category.querySelectorAll('a') );

    // const de = categoryLinks
    //               .map( link => link.textContent)
    //               .filter( streetName => streetName.includes('de'));

    // 7. sort Exercise
    // Sort the people alphabetically by last name

    console.log('*****************************************');
    console.log('7 .sort()');

    const alpha = people.sort( function(last, next) {
      const [aLast, aFirst] = last.split(', ');
      const [bLast, bFirst] = next.split(', ');
      return aLast > bLast ? 1 : -1;
    });
    console.log(alpha);


    // 8. Reduce Exercise
    // Sum up the instances of each of these
    const data = ['car', 'car', 'truck', 'truck', 'bike', 'walk', 'car', 'van', 'bike', 'walk', 'car', 'van', 'car', 'truck' ];

    console.log('*****************************************');
    console.log('8 .reduce()');

    const transportation = data.reduce( function( obj, method) {

      if ( !obj[method] ) {
        obj[method] = 0;
      }

      obj[method]++;
      return obj;
    }, {});
    console.log(transportation);

  </script>

<?php include 'footer.php'; ?>
