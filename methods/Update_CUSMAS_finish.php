<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        $CUSNM = input('CUSNM');
        $CUSADD = input('CUSADD');
        $CUSTYPE = $_POST['CUSTYPE'];
        $TEL = input('TEL');
        $SPEINS = input('SPEINS');
        $TAXID = input('TAXID');
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");

        $message = null;
        $sql = "UPDATE CUSMAS SET CUSNM='$CUSNM' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新姓名失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET CUSADD='$CUSADD' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新地址失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET CUSTYPE='$CUSTYPE' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新膚質失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET TEL='$TEL' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新電話失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET SPEINS='$SPEINS' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新特殊要求失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET TAXID='$TAXID' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                $message = $message . '更新統一編號失敗 \n';
        }
        $sql = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE' WHERE EMAIL='$EMAIL'";
        mysql_query($sql);

        if($message == null){    
                ?>
                <script>
                alert("資料修改成功");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
                <?
        }
        else{
                ?>
                <script>
                alert("<?echo $message;?>");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=Update_CUSMAS1.php>
                <?
        }
}
else
{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}
?>