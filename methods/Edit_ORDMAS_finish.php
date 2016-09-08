<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>更新訂單</title>
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
include_once("Helper/handle_string.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = input('ORDNO');
$message = null;
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
    <section>
        <div class="container">
            <h2>更改訂單</h2>
            <div class="manage">
                <div class="row table-responsive">
                    <div class="tab-content">
                        <h3>訂單編號：<?echo $ORDNO;?></h3>
                        <div id="all" class="tab-pane fade in active">                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>商品編號</td>
                                    <td>商品名稱</td>
                                    <td>商品單價</td>
                                    <td>商品數量</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                if($EMAIL != null){
                                    function ViewORDITEM($number){
                                        $ORDNO = input('ORDNO');
                                        $ITEMNOnumber = 'ITEMNO' . "$number";
                                        $ITEMAMTnumber = 'ITEMAMT' . "$number";
                                        $sql = "SELECT * FROM ORDITEMMAS WHERE ORDNO=$ORDNO AND ITEMNO=$number";
                                        $result = mysql_query($sql);
                                        $row = mysql_fetch_array($result);
                                        $name = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $number);
                                        $price = search('PRICE', 'ITEMMAS', 'ITEMNO', $number);
                                        ?><tr><td><?echo $number;?></td><?
                                        echo "<input type=\"hidden\" name=\"$ITEMNOnumber\" value=\"$number\" />";
                                        ?><td><?echo $name;?></td><?
                                        ?><td><?echo $price;?></td><?
                                        if($row == false){
                                            ?><td><input type="text" name="<?echo $ITEMAMTnumber;?>" value="0" /></td><?
                                        }
                                        else{
                                            $ORDAMT = $row['ORDAMT'];
                                            ?><td><input type="text" name="<?echo $ITEMAMTnumber;?>" value="<?echo $ORDAMT;?>" /></td></tr><?
                                        }
                                    }
                                    ?>
                                    <form name="form" method="post" action="Edit_ORDMAS_end.php">
                                    <?
                                    ViewORDITEM('1');
                                    ViewORDITEM('2');
                                    ViewORDITEM('3');
                                    ViewORDITEM('4');
                                    ?>
                                    <input type="submit" name="button" value="確定" />
                                    </form>
                                    <?
                                    $_SESSION['ORDNO'] = $ORDNO;
                                    $_SESSION['number'] = 4;
                                }
                                else{
                                    ?>
                                    <script>
                                    redirect("../Homepage/index.php");
                                    alert("您無權限觀看此頁面!");
                                    </script>
                                    <?
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<!-- jquery -->
<script src="js/jquery-1.12.3.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="js/trisoap.js"></script>
</html>