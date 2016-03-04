<?php

    $format = "php";

    $bleckList = array("php", "html", "js", "css");

    for ($i = 0; $i < count($bleckList); $i++) {
        if ($format == $bleckList[$i]) echo "Error<br />";
        else echo "good<br />";
    }

 $format .= "kjfl,.";
    echo "<br />".$format;

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>File manager</title>
</head>
<body>

</body>
</html>
