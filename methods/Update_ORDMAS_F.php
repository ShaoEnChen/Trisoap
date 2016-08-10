<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>訂單管理</title>
        <meta name="author" content="2016 NTUIM SA GROUP7">
        <meta name="description" content="">
        <!-- bootstrap css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- custim css -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <?php
            session_start();
            include("Helper/mysql_connect.php");
            include("Helper/sql_operation.php");
            $EMAIL = $_SESSION['EMAIL'];
            $CUSIDT = $_SESSION['CUSIDT'];
            if($EMAIL != null && $CUSIDT == 'A'){
                    $queryCUSNM = search('CUSNM', 'CUSMAS', 'EMAIL', $EMAIL);
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
                            <a href="Update_ORDMAS_E.php">
                                待執行訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_ORDMAS_R.php">
                                執行中訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_ORDMAS_1.php">
                                缺貨中訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_ORDMAS_C.php">
                                已完成訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_ORDMAS_F.php">
                                強制結束訂單<i class="fa fa-angle-down" aria-hidden="true"></i>
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
                <h2>強制結束訂單</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">                        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>訂單編號</td>
                                            <td>訂單種類</td>
                                            <td>發票編號</td>
                                            <td>缺貨狀態</td>
                                            <td>訂單狀態</td>
                                            <td>付款狀態</td>
                                            <td>訂單總額</td>
                                            <td>訂單總值</td>
                                            <td>建立日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $queryORDMAS = "SELECT * FROM ORDMAS WHERE ACTCODE=1 AND ORDSTAT='F'";
                                        $result = mysql_query($queryORDMAS);
                                        while($row = mysql_fetch_array($result)){
                                            $ORDNO = $row['ORDNO'];
                                    ?>
                                        <tr>
                                            <!-- 訂單編號 -->
                                            <td>
                                                <form name="form" method="post" action="View_ORDITEM_F.php">
                                                <input type="hidden" name="ORDNO" value="<?echo $ORDNO;?>" />
                                                <input type="submit" name="button" value="<?echo $ORDNO;?>" />
                                                </form>
                                            </td>
                                            <!-- 訂單種類 -->
                                            <td><?php echo $row['ORDTYPE'];?></td>
                                            <!-- 發票編號 -->
                                            <td><?php echo $row['INVOICENO'];?></td>
                                            <!-- 缺貨狀態 -->
                                            <td><?php echo $row['BACKSTAT'];?></td>
                                            <!-- 訂單狀態 -->
                                            <td><?php echo $row['ORDSTAT'];?></td>
                                            <!-- 付款狀態 -->
                                            <td><?php echo $row['PAYSTAT'];?></td>
                                            <!-- 訂單總額 -->
                                            <td><?php echo $row['TOTALPRICE'];?></td>
                                            <!-- 訂單總值 -->
                                            <td><?php echo $row['TOTALAMT'];?></td>
                                            <!-- 建立日期 -->
                                            <td><?php echo $row['CREATEDATE'];?></td>
                                        </tr>
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
        <?php
            }
            else{
                ?>
                <script>
                alert("您無權限觀看此頁面!");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
                <?
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