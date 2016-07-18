<html>
    <body>
    <?php
    $first=htmlspecialchars($_GET["first_name"]);
    $last=htmlspecialchars($_GET["last_name"]);
    echo "first_name:",$first,"<p>";
    echo "last_name:",$last;
    echo"<p>hello";
   
    ?>
    </body>
</html>
<!--http://localhost/test/second.php?first_name=1&last_name=1-->