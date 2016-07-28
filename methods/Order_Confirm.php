<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/table.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>購物車內容</title>
    <style>
    .sign-block {
        width: 350px;
        padding: 20px;
        border-top: 10px solid #AA0000;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
    }
    .sign-block h1 {
        font-family: 微軟正黑體;
    }
    .promise {
        background: #AA0000;
        border: 1px solid #880000;
    }
    .promise:hover {
        background: #880000;
    }
    </style>
</head>

<body>
    <br>
    <div class="sign-block">
        <?php
        session_start();
        include("Helper/mysql_connect.php");
        include("Helper/sql_operation.php");

        $EMAIL = $_SESSION['EMAIL'];
        $ORDNO = $_SESSION['ORDNO'];
        if(is_null($ORDNO)){
            $ORDNO = '100000000';
        }
        echo "<h2>已選擇的商品</h2>";

        $ItemNo = array("ItemNo");
        $ItemName = array("ItemName");
        $Price = array(0);
        $ItemAmount = array(0);

        $sql = "SELECT ITEMNO FROM ORDITEMMAS where ORDNO = '$ORDNO' AND EMAIL = '$EMAIL'";
        $no_result = mysql_query($sql);
        while($no_row = mysql_fetch_row($no_result, MYSQL_NUM)){         //get item node
            $node = $no_row[0];
            $name = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $node);
            array_push($ItemName, $name);
            $price = search('PRICE', 'ITEMMAS', 'ITEMNO', $node);
            array_push($Price, $price);        
        }

        $sql = "SELECT ORDAMT FROM ORDITEMMAS where ORDNO = '$ORDNO' AND EMAIL = '$EMAIL'";  //get item amount
        $amt_result = mysql_query($sql);
        $number = mysql_num_rows($amt_result);
        while($amt_row = mysql_fetch_row($amt_result, MYSQL_NUM)){
            $amt = $amt_row[0];
            array_push($ItemAmount, $amt);
        }

        if($number != 0){
            $shipfee = search('SHIPFEE', 'ORDMAS', 'ORDNO', $ORDNO);
        }
        else{
            echo "<h2>目前沒有選擇任何商品</h2>";
            $shipfee = 0;
        }

        $total = $shipfee;
        ?>
        <thead>
            <tr>
                <td>商品名稱</td>
                <td>單價(台幣)</td>
                <td>數量</td>
                <td>金額(台幣)</td>
            </tr>
        </thead>
        <tbody>
        <?php
        for($i = 1; $i <= $number; $i++){
            echo '<tr>';
            echo '<td>';
            echo $ItemName[$i];
            echo '</td>';
            echo '<td>';
            echo $Price[$i];
            echo '</td>';
            echo '<td>';
            echo $ItemAmount[$i];
            echo '</td>';
            $price = $Price[$i] * $ItemAmount[$i];
            echo '<td>';
            echo $price;
            echo '</td>';
            echo '</tr>';
            $total += $price;
        }

        echo '<tr>';
        echo '<td>運費 : </td>';
        echo '<td colspan="3">';
        echo $shipfee;
        echo '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>總計 : </td>';
        echo '<td colspan="3">';
        echo $total;
        echo '</td>';
        echo '</tr>';
        ?>
        </tbody>
    </table>
    <br>
    <?php
    if($number != 0){
        if($ORDNO == '100000000'){
        ?>
            <button type="button" class="promise"></buttom><a href="Create_ORDMAS2.php">確定結帳</a>
        <?php
        }
        else{
        ?>
            <button type="button" class="promise"></buttom><a href="cashing_test1.php">確定結帳</a>
        <?php
        }
    }
    ?>
    <button type="button" class="cancel"></buttom><a href="../Homepage/index.php">返回首頁</a><br>
    <button type="button" class="cancel"></buttom><a href="../Homepage/product.php">返回商品頁</a>
            
    </div>
</body>
</html>