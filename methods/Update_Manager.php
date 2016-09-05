<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>權限管理</title>
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
                            <a href="#">
                                <? echo $queryCUSNM."，您好<br>"; ?>
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
                <h2>權限管理</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>電子信箱</td>
                                            <td>姓名</td>
                                            <td>電話</td>
                                            <td>地址</td>
                                            <td>帳號建立日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $queryManager = "SELECT * FROM CUSMAS WHERE CUSIDT = 'A' AND ACTCODE = '1' ORDER BY CREATEDATE DESC";
                                        $result = mysql_query($queryManager);
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
                                        $result = mysql_query($queryManager.' LIMIT '.$start.', '.$per);
                                        if($result != false){
                                            while($row = mysql_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <!-- 電子信箱 -->
                                                    <td><? echo $row['EMAIL'];?></td>
                                                    <!-- 姓名 -->
                                                    <td><? echo $row['CUSNM'];?></td>
                                                    <!-- 電話 -->
                                                    <td><? echo $row['TEL'];?></td>
                                                    <!-- 地址 -->
                                                    <td><? echo $row['CUSADD'];?></td>
                                                    <!-- 帳號建立日期 -->
                                                    <td><? echo $row['CREATEDATE'];?></td>
                                                </tr>
                                                <?
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <br>
                                <?
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