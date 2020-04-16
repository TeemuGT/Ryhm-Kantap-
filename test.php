<html>

<head>

<script>

    function myFunction() {

        var x;

        var r = confirm("Press a button!");

        if (r == true) {

            x = "You pressed OK!";

        }

        else {

            x = "You pressed Cancel!";

        }

        document.getElementById("demo").innerHTML = x;

    }

</script>

</head>

<body>

<?php

?>

<button onclick="myFunction()">Click Me</button>

<p id="demo"></p>

</body>

</html>