<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三吾鄉手工皂 更新訂單</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$queryCUSNM = search('CUSNM', 'CUSMAS', 'EMAIL', $EMAIL);
function show_ORDTYPE($id){
        if($id == 'G') echo '一般';
        elseif($id == 'S') echo '特殊';
}
function show_BACKSTAT($id){
        if($id == '1') echo '缺貨中';
        elseif($id == '0') echo '有存貨';
}
function show_ORDSTAT($id){
        if($id == 'E') echo '待處理';
        elseif($id == 'R') echo '處理中';
        elseif($id == 'C') echo '已出貨';
        elseif($id == 'F') echo '強制結束';
}
function show_PAYSTAT($id){
        if($id == '1') echo '已付款';
        elseif($id == '0') echo '未付款';
}
function show_PAYTYPE($id){
        if($id == 'A') echo '信用卡';
        elseif($id == 'B') echo '網路ATM';
        elseif($id == 'C') echo 'ATM';
}
?>
    <nav class="navbar navbar-fixed-top nav-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#page-top" class="navbar-brand"><img src="image/logo.png" alt="" class="logo"></a>
            </div>
            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Homepage/index.php">
                            回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="View_ORDMAS.php">
                            查看訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="Edit_ORDMAS.php">
                            更新訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="Delete_ORDMAS.php">
                            取消訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <!-- 要改成dropdown -->
                        <!-- 更新使用者資料、密碼 -->
                        <a href="#">
                            <?php
                                echo $queryCUSNM."，您好<br>";
                            ?>
                        </a>
                    </li>
                    <li>
                        <a href="User_logout.php">
                            登出<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?
        if($EMAIL == null){
                ?>
                <script>
                redirect("../Homepage/index.php");
                alert("請先註冊或登入!");
                </script>
                <?
        }
        else{
                $queryORDNO = "SELECT * FROM ORDMAS where EMAIL='$EMAIL' AND ORDSTAT='E' AND PAYSTAT='0' AND ACTCODE='1'";
                $result = mysql_query($queryORDNO);
                $item = mysql_fetch_array($result);
                if($item == false){
                        ?>
                        <script>
                        redirect("View_ORDMAS.php");
                        alert("您沒有可更新的訂單!");
                        </script>
                        <?
                }
                else{
                        ?><?
                        echo "<section><div class=\"orders\">";
                        echo "<form name=\"form\" method=\"post\" action=\"Edit_ORDMAS_finish.php\">";
                        echo "訂單編號：<select name=\"ORDNO\" />";
                        $ORDNO = $item['ORDNO'];
                        echo "<option value=\"$ORDNO\">$ORDNO</option>";
                        while($item = mysql_fetch_array($result)){
                                $ORDNO = $item['ORDNO'];
                                echo "<option value=\"$ORDNO\">$ORDNO</option>";       
                        }
                        echo "</select> <br>";
                        echo "<input type=\"submit\" name=\"button\" class=\"btn btn-dark\" value=\"確定\" />";
                        echo "</form>";
                        echo "</div></section>";
                        include("Helper/Chart_Edit_ORDMAS.php");
                }
        }
        ?>
</body>
<!-- jquery -->
<script src="js/jquery-1.12.3.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="js/trisoap.js"></script>
</html>