<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>查看訂單</title>
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
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$queryCUSNM = search('CUSNM', 'CUSMAS', 'EMAIL', $EMAIL);
function show_ORDTYPE($id){
	if($id == 'G') echo '網路';
	elseif($id == 'S') echo '門市';
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
                        <a href="/">
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
                        <a href="#">
                            <?php  echo $queryCUSNM."，您好<br>"; ?>
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
            <h2>訂單紀錄</h2>
            <div class="manage">
                <div class="row table-responsive">
                    <div class="tab-content">
                        <div id="all" class="tab-pane fade in active">                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>訂單編號</td>
                                    <td>訂單種類</td>
                                    <td>顧客編號</td>
                                    <td>發票編號</td>
                                    <td>缺貨狀態</td>
                                    <td>訂單狀態</td>
                                    <td>付款狀態</td>
                                    <td>付款方式</td>
                                    <td>訂單總額</td>
                                    <td>訂單總值</td>
                                    <td>實收金額</td>
                                    <td>建立日期</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($EMAIL != null){
                                    $queryORDMAS = "SELECT * FROM ORDMAS WHERE EMAIL = '$EMAIL' AND ACTCODE = 1";
                                    $result = mysql_query($queryORDMAS);
                                    $data_nums = mysql_num_rows($result);
                                    $per = 15; 
                                    $pages = ceil($data_nums / $per);
                                    if(!isset($_GET["page"])){ 
                                        $page = 1; 
                                    }
                                    else {
                                        $page = intval($_GET["page"]); 
                                    }
                                    $start = ($page-1) * $per; 
                                    $result = mysql_query($queryORDMAS.' LIMIT '.$start.', '.$per);
                                    if($result != false) {
                                        while($row = mysql_fetch_array($result)){
                                            $ORDNO = $row['ORDNO'];
                                            ?>
                                            <tr>
                                                <!-- 訂單編號 -->
                                                <td>
                                                    <form method="post" action="View_ORDITEM.php">
                                                    <input type="hidden" name="ORDNO" value="<?php echo $ORDNO;?>" />
                                                    <input type="hidden" name="RETURN" value="view" />
                                                    <input type="submit" name="button" value="<?php echo $ORDNO;?>" />
                                                    </form>
                                                </td>
                                                <!-- 訂單種類 -->
                                                <td><?php show_ORDTYPE($row['ORDTYPE']);?></td>
                                                <!-- 顧客編號 -->
                                                <td><?php echo $row['EMAIL'];?></td>
                                                <!-- 發票編號 -->
                                                <td><?php echo $row['INVOICENO'];?></td>
                                                <!-- 缺貨狀態 -->
                                                <td><?php show_BACKSTAT($row['BACKSTAT']);?></td>
                                                <!-- 訂單狀態 -->
                                                <td><?php show_ORDSTAT($row['ORDSTAT']);?></td>
                                                <!-- 付款狀態 -->
                                                <td><?php 
                                                    if($row['PAYSTAT'] == '1') echo '已付款';
                                                    elseif($row['PAYSTAT'] == '0'){
                                                        $_SESSION['ORDNO'] = $ORDNO;
                                                        ?><a href="Order_Confirm.php">前往付款</a><?php 
                                                    }
                                                ?></td>
                                                <!-- 付款方式 -->
                                                <td><?php show_PAYTYPE($row['PAYTYPE']);?></td>
                                                <!-- 訂單總額 -->
                                                <td><?php echo $row['TOTALPRICE'];?></td>
                                                <!-- 訂單總值 -->
                                                <td><?php echo $row['TOTALAMT'];?></td>
                                                <!-- 實收金額 -->
                                                <td><?php 
                                                    if($row['PAYSTAT'] == '1') echo $row['REALPRICE'];
                                                    else echo '0';
                                                ?></td>
                                                <!-- 建立日期 -->
                                                <td><?php echo $row['CREATEDATE'];?></td>
                                            </tr>
                                            <?php 
                                        }
                                    }
                                }
                                else{
                                    ?>
                                    <script>
                                    redirect("/");
                                    alert("您無權限觀看此頁面!");
                                    </script>
                                    <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                        <?php 
                            echo '共 '.$data_nums.' 筆 - 第 '.$page.' 頁 - 共 '.$pages.' 頁';
                            echo "<br><a href=?page=1>首頁</a>  ";
                            echo "第 ";
                            for( $i=1 ; $i<=$pages ; $i++ ) {
                                if ( $page-3 < $i && $i < $page+3 ) {
                                    echo "<a href=?page=".$i.">".$i."</a> ";
                                }
                            } 
                            echo " 頁  <a href=?page=".$pages.">末頁</a><br>";
                        ?>
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