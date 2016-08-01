<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="image/icon/favicon.png">
    <title>三三吾鄉手工皂 查看訂單</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custim css -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body id="page-top">
<?php
    include("Helper/mysql_connect.php");
    include("Helper/sql_operation.php");
    $EMAIL = $_SESSION['EMAIL'];
    $CUSIDT = $_SESSION['CUSIDT'];
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
                <a href="#page-top" class="navbar-brand"><img src="http://placehold.it/125x30" alt="" class="logo"></a>
            </div>
            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Homepage/index.php">
                            回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="Create_manager.php">
                            新增管理員<i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="Delete_manager.php">
                            刪除管理員<i class="fa fa-angle-down" aria-hidden="true"></i>
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
                        <a href="../methods/User_logout.php">
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
                <div class="row">
                    <div class="visible-xs col-xs-2 col-xs-offset-1" id="pills-xs">
                        <a class="btn dropdown-toggle" id="pills-xs-dropdown" data-toggle="dropdown" href="#">
                            全部<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu"></ul>
                    </div>
                    <div class="hidden-xs col-sm-8 col-md-6" id="pills">
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#all">全部</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row table-responsive">
                    <div class="tab-content">
                    <!-- use php for loop to generate each pill -->
                        
                    <!-- 全部 -->
                    <?php switch(0):
                    case 0:
                        $queryManager = "SELECT * FROM CUSMAS WHERE CUSIDT = 'A' AND ACTCODE = '1'"; ?>
                        <div id="all" class="tab-pane fade in active">
                    <?php break; ?>
                        
                    <?php endswitch; ?>
                        <!-- pill content -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>訂單編號</td>
                                    <td>訂單種類</td>
                                    <td>訂單狀態</td>
                                    <td>購買商品</td>
                                    <td>訂單總額</td>
                                    <td>運輸費用</td>
                                    <td>訂單總值</td>
                                    <td>付款狀態</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($EMAIL != null){
                                        $ORDNO = $_POST['ORDNO'];
                                        $RETURN = $_POST['RETURN'];
                                        $row = select('ORDMAS', 'ORDNO', $ORDNO);
                                ?>
                                <tr>
                                    <!-- 訂單編號 -->
                                    <td>
                                        <?php
                                            echo $row['ORDNO'];
                                        ?>
                                    </td>
                                    <!-- 訂單種類 -->
                                    <td>
                                        <?php
                                            echo $row['ORDTYPE'];
                                        ?>
                                    </td>
                                    <!-- 訂單狀態 -->
                                    <td>
                                        <?php
                                            echo $row['ORDSTAT'];
                                        ?>
                                    </td>
                                    <!-- 購買商品 -->
                                    <td>
                                        <?php
                                            $queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
                                            $queryDetail = mysql_query($queryORDITEM);
                                            while($item = mysql_fetch_array($queryDetail)){
                                                $ITEMNO = $item['ITEMNO'];
                                                $ITEMAMT = $item['ORDAMT'];
                                                $name = select('ITEMMAS', 'ITEMNO', $ITEMNO);
                                        ?>
                                            <tr>
                                                <td>編號:</td>
                                                <td><?php echo $ITEMNO; ?></td>
                                            </tr>
                                            <tr>
                                                <td>名稱:</td>
                                                <td><?php echo $name['ITEMNM']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>價格:</td>
                                                <td><?php echo $name['PRICE']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>訂購數量:</td>
                                                <td><?php echo $ITEMAMT; ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <!-- 訂單總額 -->
                                    <td>
                                        <?php
                                            echo $row['TOTALPRICE'];
                                        ?>
                                    </td>
                                    <!-- 運輸費用 -->
                                    <td>
                                        <?php
                                            echo $row['SHIPFEE'];
                                        ?>
                                    </td>
                                    <!-- 訂單總值 -->
                                    <td>
                                        <?php
                                            echo $row['TOTALAMOUNT'];
                                        ?>
                                    </td>
                                    <!-- 付款狀態 -->
                                    <td>
                                        <?php
                                            echo $row['PAYSTAT'];
                                        ?>
                                    </td>
                                </tr>
                            <?php
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
                            <?php
                                else{
                                    echo '您無權限觀看此頁面!';
                                    echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
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