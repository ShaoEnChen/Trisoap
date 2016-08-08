<title>三三吾鄉手工皂 查看訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
function show_ORDTYPE($id){
        if($id == 'G') return '一般';
        elseif($id == 'S') return '特殊';
}
function show_ORDSTAT($id){
        if($id == 'E') return '待處理';
        elseif($id == 'R') return '處理中';
        elseif($id == 'C') return '已出貨';
        elseif($id == 'F') return '強制結束';
}
function show_PAYSTAT($id){
        if($id == '1') return '已付款';
        elseif($id == '0') return '未付款';
}
if($EMAIL != null){
        $alert = '';
        $ORDNO = $_POST['ORDNO'];
        $RETURN = $_POST['RETURN'];
        $row = select('ORDMAS', 'ORDNO', $ORDNO);
        $alert .= "訂單編號：".$row['ORDNO'].'\n';
        $alert .= "訂單種類：".show_ORDTYPE($row['ORDTYPE']).'\n';
        $alert .= "訂單狀態：".show_ORDSTAT($row['ORDSTAT']).'\n';
        $alert .= "購買商品：".'\n';
        $queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
        $queryDetail = mysql_query($queryORDITEM);
        while($item = mysql_fetch_array($queryDetail)){
                $ITEMNO = $item['ITEMNO'];
                $ITEMAMT = $item['ORDAMT'];
                $name = select('ITEMMAS', 'ITEMNO', $ITEMNO);
                $alert .= '商品名稱 : '.$name['ITEMNM'].' , 商品價格 : '.$name['PRICE'].' , 訂購數量 : '.$ITEMAMT.' , 總價 : '.$name['PRICE']*$ITEMAMT.'\n';
        }
        $alert .= '\n';
        $alert .= "額外指令：".$row['ORDINST'].'\n';
        $alert .= "訂單總額：".$row['TOTALPRICE'].'\n';
        $alert .= "運輸費用：".$row['SHIPFEE'].'\n';
        $alert .= "訂單總值：".$row['TOTALAMT'].'\n';
        $alert .= "付款狀態：".show_PAYSTAT($row['PAYSTAT']).'\n';
        ?>
        <script>
        alert("<?echo $alert;?>");
        </script>
        <?
        if($RETURN == 'update'){
                ?><meta http-equiv=REFRESH CONTENT=0;url=Update_ORDMAS.php><?
        }
        elseif($RETURN == 'view'){
                ?><meta http-equiv=REFRESH CONTENT=0;url=View_ORDMAS.php><?
        }
}
else{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}