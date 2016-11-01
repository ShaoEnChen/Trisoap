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
</head>

<body>
    <br>
    <div class="sign-block" style="width: 500px;">
        <?php
        session_start();
        include_once("Helper/mysql_connect.php");
        include_once("Helper/sql_operation.php");
        unset($_SESSION['from']);
        unset($_SESSION['type']);

        $EMAIL = $_SESSION['EMAIL'];
        $ORDNO = '100000000';
        $DISCOUNT = $_SESSION['DISCOUNT'];
        if($DISCOUNT != null){
            $checkDISCOUNT = 'A';
        }
        else{
            $checkDISCOUNT = 'B';
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
            $shipfee = 70;
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
                        <td><?php echo $ItemName[$i];?></td>
                        <td><?php echo $Price[$i];?></td>
                        <td><?php echo $ItemAmount[$i];?></td>
                        <?php 
                        $price = $Price[$i] * $ItemAmount[$i];
                        $total += $price;
                        ?>
                        <td><?php echo $price;?></td>
                        <td>
                            <form method="post" action="Delete_ORDITEMMAS.php">
                            <input type="hidden" name="ITEMNO" value="<?php echo $queryITEMNO;?>" />
                            <button type="submit" class="cancel">移除</button>
                            </form>
                        </td>
                    </tr>
                    <?php 
                }
                ?>
                <tr>
                    <td>運費 : </td>
                    <td colspan="3"><?php echo $shipfee;?></td>
                </tr>
                <tr>
                    <td>留心語折扣 : </td>
                    <td colspan="3"><?php echo $discount;?></td>
                </tr>
                <?php 
                if($checkDISCOUNT == 'A'){
                    $DISCOUNTNM = search('DCTNM', 'DCTMAS', 'DCTID', $DISCOUNT);
                    $DISCOUNTPRICE = search('DCTPRICE', 'DCTMAS', 'DCTID', $DISCOUNT);
                    $total -= $DISCOUNTPRICE;
                    ?>
                    <tr>
                    <td><?php echo $DISCOUNTNM;?> : </td>
                    <td><?php echo $DISCOUNTPRICE;?></td>
                    <td colspan="2">
                        <form method="post" action="discount_change.php">
                        <input type="hidden" name="type" value="dc" />
                        <input type="hidden" name="from" value="vp" />
                        <input type="hidden" name="id" value="<?php echo $DISCOUNT;?>" />
                        <button type="submit" class="discount">更換折價卷</button>
                        </form>
                    </td>
                    </tr>
                    <?php 
                }
                ?>
                <tr>
                    <td>總計 : </td>
                    <td colspan="3"><?php echo $total;?></td>
                </tr>
                <?php 
                if($checkDISCOUNT == 'B'){
                    ?>
                    <tr>
                    <td>
                        <form method="post" action="discount.php">
                        <input type="hidden" name="type" value="d" />
                        <input type="hidden" name="from" value="vp" />
                        <button type="submit" class="discount">使用折價卷</button>
                        </form>
                    </td>
                    </tr>
                    <?php 
                }
                $_SESSION['total'] = $total;
                ?>
                </tbody>
            </table><br>
            
            <a href="Create_ORDMAS2.php"><button type="submit" class="promise">確定結帳</button></a>
            <br>
            <a href="/"><button type="button" class="cancel">返回首頁</button></a>
            <?php 
        }
        else{
            echo "<h2>目前沒有選擇任何商品</h2>";
            ?>
            <a href="/"><button type="button" class="promise">返回首頁</button></a>
            <a href="../Homepage/product.php"><button type="button" class="promise">返回商品頁</button></a>
            <?php 
        }
    ?>   
    </div>
</body>
</html>