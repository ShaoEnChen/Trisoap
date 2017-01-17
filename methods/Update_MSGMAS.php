<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>留心語管理</title>
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
        include_once("Helper/handle_string.php");
        include_once("Helper/redirect.js");
        include_once("Helper/analyticstracking.php");
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
                            <a href="/">
                                回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_MSGMAS_A.php">
                                待審核留言<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_MSGMAS_B.php">
                                已通過留言<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_MSGMAS_C.php">
                                未通過留言<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_MSGMAS_D.php">
                                公開中留言<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_MSGMAS_E.php">
                                典藏留言<i class="fa fa-angle-down" aria-hidden="true"></i>
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
            <div class="orders">
                <form method="post" action="Update_MSGMAS.php">
                    搜尋依據：<select name="keytype" />
                    <option value=""></option>
                    <option value="ORDNO">留心語編號</option>
                    <option value="EMAIL">顧客信箱</option>
                    </select>
                    搜尋關鍵：<input type="text" name="keyvalue" /> <br>
                    <input type="submit" class="btn btn-dark" value="確定" />
                </form>
            </div>
        </section>

        <section>
            <div class="container">
                <h2>留心語管理</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">                        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>留言編號</td>
                                            <td>顧客信箱</td>
                                            <td>留言文字</td>
                                            <td>留言照片</td>
                                            <td>留言影片</td>
                                            <td>留言狀態</td>
                                            <td>建立日期</td>
                                            <td>發佈日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $keytype = input('keytype');
                                        $keyvalue = input('keyvalue');
                                        if($keytype == null){
                                            $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1";
                                        }
                                        else{
                                            $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue'";
                                        }
                                        $result = mysql_query($queryMSGMAS);
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
                                        $result = mysql_query($queryMSGMAS.' LIMIT '.$start.', '.$per);
                                        if($result != false){
                                            while($row = mysql_fetch_array($result)){
                                                $MSGNO = $row['MSGNO'];
                                                ?>
                                                <tr>
                                                    <!-- 留言編號 -->
                                                    <td><?php echo $MSGNO;?></td>
                                                    <!-- 顧客信箱 -->
                                                    <td><?php echo $row['EMAIL'];?></td>
                                                    <!-- 留言文字 -->
                                                    <td>
                                                        <?php $text = $row['MSGTXT']; ?>
                                                        <a href="#" onclick="alert('<?php echo $text;?>');">顯示</a>
                                                    </td>
                                                    <!-- 留言照片 -->
                                                    <td>
                                                        <?php 
                                                        if($row['MSGPHOTO'] == '1'){
                                                            echo "<a target=\"_blank\" href=\"../message/picture/$MSGNO.png\">";
                                                            echo "<img src=\"../message/picture/$MSGNO.png\" width=\"120\" height=\"90\" />";
                                                            echo "</a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <!-- 留言影片 -->
                                                    <td>
                                                        <?php 
                                                        if($row['MSGVIDEO'] == '1'){
                                                            echo "<a target=\"_blank\" href=\"../message/video/$MSGNO.mp4\">";
                                                            echo "<video width=\"120\" height=\"90\" controls>";
                                                            echo "<source src=\"../message/video/$MSGNO.mp4\" type=\"video/mp4\">";
                                                            echo "</video>";
                                                            echo "</a>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <!-- 留言狀態 -->
                                                    <td><?php echo $row['MSGSTAT'];?></td>
                                                    <!-- 建立日期 -->
                                                    <td><?php echo $row['CREATEDATE'];?></td>
                                                    <!-- 發佈日期 -->
                                                    <td><?php echo $row['PUBLICDATE'];?></td>
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
                redirect("/");
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
