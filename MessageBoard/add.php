<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>文本式留言板</title>
    </head>
    <body>
        <?php
            include("./menu.php");
        ?>
        <center>
            <h3>我要留言</h3>
            <table width="350" border="0">
            <form action="doadd.php" method="post">
            <tr>
                <td>留言标题：</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>留言者：</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>留言内容：</td>
                <td><textarea name="contents" cols="30"rows="6"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="留言"></td>
            </tr>
            </form>
            </table>
        </center>
    </body>
</html>