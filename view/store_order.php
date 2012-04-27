<html>
<head></head>

<body>
    <?php
        $str = '';
        foreach($order as $item => $qty)
            if($qty > 0)
                $str .= $item . ' ('.$qty.'), ';
        rtrim($str, ',');
    ?>

    <p>You have bought: <?=$str;?></p>
    <p><a href="/store">Back to store.</a></p>

</body>

</html>



