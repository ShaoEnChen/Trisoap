<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
$message = '';
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        $CUSPW = input('CUSPW');
        $newCUSPW1 = input('newCUSPW1');
        $newCUSPW2 = input('newCUSPW2');
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");

        if($CUSPW == null){
                $message = $message . '原始密碼欄位不可空白 \n';
        }
        if(encrypt($CUSPW) != $queryPW){
                $message = $message . '原始密碼錯誤 \n';
        }
        if(($newCUSPW1 == null) || ($newCUSPW2 == null)){
                $message = $message . '新密碼欄位不可空白 \n';
        }
        if((strlen($newCUSPW1) > 15) || (strlen($newCUSPW2) > 15)){
                $message = $message . '密碼不可超過15字元 \n';
        }
        if($newCUSPW1 != $newCUSPW2){
                $message = $message . '請重新確認您的新密碼 \n';
        }
        if((ctype_alnum($newCUSPW1) == FALSE) || (ctype_alnum($newCUSPW2) == FALSE)){
                $message = $message . '密碼必須為英數字 \n';
        }

        if($message == null){
                $CUSPW = encrypt($newCUSPW1);
                $sql = "UPDATE CUSMAS SET CUSPW = '$CUSPW', UPDATEDATE ='$UPDATEDATE' WHERE EMAIL='$EMAIL'";
                if(mysql_query($sql)){               
                        ?>
                        <script>
                        alert("密碼修改成功");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
                        <?                       
                }
                else{
                        ?>
                        <script>
                        alert("密碼修改失敗");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=User_ChangePW1.php>
                        <?
                }
        }
        else{
                ?>
                <script>
                alert("<?echo $message;?>");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=User_ChangePW1.php>
                <?
        }
}
else{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../HomePage/index.php>
        <?
}
?>