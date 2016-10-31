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
            if($EMAIL != null && $CUSIDT == 'A'){
                    $queryCUSNM = search('CUSNM', 'CUSMAS', 'EMAIL', $EMAIL);
        ?>
        <nav class="navbar navbar-fixed-top nav-custom">
            <div class="container-fluid">
                <div class="navbar-header">
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
                            <a href="#">
                                <?php echo $queryCUSNM."，您好<br>"; ?>
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
                <h2>缺貨中訂單</h2>
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
                                            <td>實收金額</td>
                                            <td>建立日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $queryORDMAS = "SELECT * FROM ORDMAS WHERE ACTCODE=1 AND BACKSTAT='1'";
                                        $result = mysql_query($queryORDMAS);
                                        $data_nums = mysql_num_rows($result);
                                        $per = 15; 
                                        $pages = ceil($data_nums/$per); 
                                        if(!isset($_GET["page"])){ 
                                            $page=1; 
                                        }
                                        else {
                                            $page = intval($_GET["page"]); 
                                        }
                                        $start = ($page-1)*$per; 
                                        $result = mysql_query($queryORDMAS.' LIMIT '.$start.', '.$per);
                                        if($result != false){
                                            while($row = mysql_fetch_array($result)){
                                                $ORDNO = $row['ORDNO'];
                                                ?>
                                                <tr>
                                                    <!-- 訂單編號 -->
                                                    <td>
                                                        <form method="post" action="View_ORDITEM_1.php">
                                                        <input type="hidden" name="ORDNO" value="<?php echo $ORDNO;?>" />
                                                        <input type="submit" name="button" value="<?php echo $ORDNO;?>" />
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
                                                    <!-- 實收金額 -->
                                                    <td><?php echo $row['REALPRICE'];?></td>
                                                    <!-- 建立日期 -->
                                                    <td><?php echo $row['CREATEDATE'];?></td>
                                                </tr>
                                                <?php 
                                            }
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
        <?php
            }
            else{
                ?>
                <script>
                redirect("../Homepage/index.php");
                alert("您無權限觀看此頁面!");
                </script>
                <?php 
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