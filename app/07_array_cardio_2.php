<?php include 'header.php'; ?>
  
  <div class="container-day">
    <div class="container-disclaimer">
      <h3 class="disclaimer-text">Check the console</h3>
    </div>
  </div>

  <style>

  </style>
  
  
  <script>

    // ## Array Cardio Day 2

    console.log('%c This is that good good.', 'background-color: #ebda4e; margin: 20px; font-size: 25px;');

    const people = [
      { name: 'Wes', year: 1988 },
      { name: 'Kait', year: 1986 },
      { name: 'Irv', year: 1970 },
      { name: 'Lux', year: 2015 }
    ];

    const comments = [
      { text: 'Love this!', id: 523423 },
      { text: 'You are the best', id: 2039842 },
      { text: 'Ramen is my fav food ever', id: 123523 },
      { text: 'Super good', id: 823423 },
      { text: 'Nice Nice Nice!', id: 542328 }
    ];

    // Some and Every Checks
    // Array.prototype.some() // is at least one person 19?
    const isAdult = people.some( person => (new Date()).getFullYear() - person.year >= 19 );

    // Array.prototype.every() // is everyone 19?
    const allAdult = people.every( person => (new Date()).getFullYear() - person.year >= 19 );


    // Array.prototype.find()
    // Find is like filter, but instead returns just the one you are looking for
    // find the comment with the ID of 823423

    const comment = comments.find( comment => comment.id === 823423);
    console.log(comment)

    // Array.prototype.findIndex()
    // Find the comment with this ID
    // delete the comment with the ID of 823423

    const index = comments.findIndex( comment => comment.id === 823423);
    console.log(index);

    const newComments = [
      ...comments.slice(0, index), // Slicing everything before the index (the number we want to exclude)
      ...comments.slice(index + 1) // Slicing everything after the index

      // ... operator spreads into the array. 
    ];

    console.table(newComments);

  </script>

<?php include 'footer.php'; ?>
