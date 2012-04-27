<html>
<head></head>

<body>
    <form action="/store/buy" method="POST">
    <table>

            <?php foreach($items as $id => $item){ ?>

            <tr>
                <td><?= $item; ?></td>
                <td><input type="text" name="qty[<?= $id; ?>]" value="0"></td>
            </tr>

            <?php } ?>
            <tr>
                <?php if(false == $isLogged)
                        echo '<td><a href="/login">Sign IN</a></td>';
                      else {
                ?>
                    <td><input type="submit" value="Buy it"></td>
                    <td><a href="/login/signout">Sign Out</a></td>
                <?php } ?>
            </tr>
    </table>
    </form>


</body>

</html>