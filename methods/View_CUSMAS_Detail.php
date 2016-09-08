<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<title>三三吾鄉手工皂 查看客戶</title>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
        $alert = '';
        $queryEMAIL = $_POST['EMAIL'];
        $row = select('CUSMAS', 'EMAIL', $queryEMAIL);
        $alert .= "電子信箱：".$row['EMAIL'].'\n';
        $alert .= "客戶姓名：".$row['CUSNM'].'\n';
        $alert .= "客戶地址：".$row['CUSADD'].'\n';
        $alert .= "客戶生日：".$row['CUSBIRTHY'].'/'.$row['CUSBIRTHM'].'/'.$row['CUSBIRTHD'].'\n';
        $alert .= "聯絡電話：".$row['TEL'].'\n';
        $alert .= "客戶膚質：".$row['CUSTYPE'].'\n';
        $alert .= "信用狀態：".$row['CREDITSTAT'].'\n';
        $alert .= "統一編號：".$row['TAXID'].'\n';
        $alert .= "累積折扣：".$row['DISCOUNT'].'\n';
        $alert .= "最近一月消費額：".$row['SALEAMTMTD'].'\n';
        $alert .= "最近一季消費額：".$row['SALEAMTSTD'].'\n';
        $alert .= "最近一年消費額：".$row['SALEAMTYTD'].'\n';
        $alert .= "總消費額：".$row['SALEAMT'].'\n';
        $alert .= "應收帳款：".$row['CURAR'].'\n';
        $alert .= "特殊需求：".$row['SPEINS'].'\n';
        $alert .= "建立時間：".$row['CREATEDATE'].'\n';
        $alert .= "最後修改時間：".$row['UPDATEDATE'].'\n';
        $alert .= "如何認識三三：".$row['KNOWTYPE'].'\n';

        ?>
        <script>
        redirect("View_CUSMAS.php");
        alert("<?echo $alert;?>");
        </script>
        <?
}
else{
        ?>
        <script>
        redirect("../Homepage/index.php");
        alert("您無權限觀看此頁面!");
        </script>
        <?
}