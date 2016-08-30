<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>購物車內容</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <link href='css/table.css' rel='stylesheet' type='text/css'>
    <style>
    .sign-block {
        width: 500px;
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
        include_once("Helper/mysql_connect.php");
        include_once("Helper/sql_operation.php");

        $EMAIL = $_SESSION['EMAIL'];
        $ORDNO = $_SESSION['ORDNO'];
        $DISCOUNT = $_SESSION['DISCOUNT'];
        if($DISCOUNT != null){
            $checkDISCOUNT = 'A';
        }
        else{
            $checkDISCOUNT = 'B';
        }
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
            // $shipfee = search('SHIPFEE', 'ORDMAS', 'ORDNO', $ORDNO);
            $shipfee = 20;  //need revise
            $total = $shipfee;
            $discount = search('DISCOUNT', 'CUSMAS', 'EMAIL', $EMAIL);
            $total -= $discount;
            ?>
            <table>
                <thead>
                    <tr>
                        <td>商品名稱</td>
                        <td>單價(台幣)</td>
                        <td>數量</td>
                        <td>金額(台幣)</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                <?php
                for($i = 1; $i <= $number; $i++){
                    $queryITEMNO = search('ITEMNO', 'ITEMMAS', 'ITEMNM', $ItemName[$i]);
                    ?>
                    <tr>
                        <td><?echo $ItemName[$i];?></td>
                        <td><?echo $Price[$i];?></td>
                        <td><?echo $ItemAmount[$i];?></td>
                        <?
                        $price = $Price[$i] * $ItemAmount[$i];
                        $total += $price;
                        ?>
                        <td><?echo $price;?></td>
                        <td>
                            <form name="remove" method="post" action="Delete_ORDITEMMAS.php">
                            <input type="hidden" name="ORDNO" value="<?echo $ORDNO;?>" />
                            <input type="hidden" name="EMAIL" value="<?echo $EMAIL;?>" />
                            <input type="hidden" name="ITEMNO" value="<?echo $queryITEMNO;?>" />
                            <button type="submit" class="cancel">移除</button>
                            </form>
                        </td>
                    </tr>
                    <?
                }
                ?>
                <tr>
                    <td>運費 : </td>
                    <td colspan="3"><?echo $shipfee;?></td>
                </tr>
                <tr>
                    <td>留心語折扣 : </td>
                    <td colspan="3"><?echo $discount;?></td>
                </tr>
                <?
                if($checkDISCOUNT == 'A'){
                    $DISCOUNTNM = search('DCTNM', 'DCTMAS', 'DCTID', $DISCOUNT);
                    $DISCOUNTPRICE = search('DCTPRICE', 'DCTMAS', 'DCTID', $DISCOUNT);
                    $total -= $DISCOUNTPRICE;
                    ?>
                    <tr>
                    <td><?echo $DISCOUNTNM;?> : </td>
                    <td colspan="3"><?echo $DISCOUNTPRICE;?></td>
                    </tr>
                    <?
                }
                ?>
                <tr>
                    <td>總計 : </td>
                    <td colspan="3"><?echo $total;?></td>
                </tr>
                <?
                if($checkDISCOUNT == 'B'){
                    ?>
                    <tr>
                    <td><a href="discount.php"><button type="button" class="discount">使用折價卷</button></a></td>
                    </tr>
                    <?
                }
                $_SESSION['total'] = $total;
                ?>
                </tbody>
            </table><br>
            
            <?     
            if($ORDNO == '100000000'){
                ?>
                <a href="Create_ORDMAS2.php"><button type="submit" class="promise">確定結帳</button></a>
                <?
            }
            else{
                ?>
                <form method="post" action="cashing_test.php">
                    <input type="hidden" name="FROM" value="oc" />
                    <label for="PAYTYPE">
                        <div class="q-select">
                            <select name="PAYTYPE" id="PAYTYPE" required>
                                <option value="">選擇付款方式*</option>
                                <option value="A">信用卡</option>
                                <option value="B">ATM</option>
                                <option value="C">網路ATM</option>
                            </select>
                        </div>
                    </label>
                <br>
                <button type="submit" class="promise">確定結帳</button>
                </form>
                <br>
                <?php
            }
            ?>
            <a href="../Homepage/index.php"><button type="button" class="cancel">返回首頁</button></a>
            <?
        }
        else{
            echo "<h2>目前沒有選擇任何商品</h2>";
            ?>
            <a href="../Homepage/index.php"><button type="button" class="promise">返回首頁</button></a>
            <a href="../Homepage/product.php"><button type="button" class="promise">返回商品頁</button></a>
            <?
        }
    ?>   
    </div>
</body>
</html>