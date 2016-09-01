<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>折扣管理 永久有效折扣</title>
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
            include_once("Helper/handle_string.php");
            include_once("Helper/redirect.js");
            $EMAIL = $_SESSION['EMAIL'];
            $CUSIDT = $_SESSION['CUSIDT'];
            $number = 0;
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
                            <a href="Create_DCTMAS.php">
                                新增折扣<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Delete_DCTMAS.php">
                                刪除折扣<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_DCTMAS_0.php">
                                已失效折扣<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_DCTMAS_1.php">
                                一次有效折扣<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Update_DCTMAS_2.php">
                                永久有效折扣<i class="fa fa-angle-down" aria-hidden="true"></i>
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
            <div class="orders">
                <form name="form" method="post" action="Update_DCTMAS_0.php">
                    搜尋依據：<select name="keytype" />
                    <option value=""></option>
                    <option value="DCTID">折扣兌換碼</option>
                    <option value="DCTNM">折扣名稱</option>
                    <option value="DCTPRICE">折扣金額</option>
                    <option value="CREATEPERSON">設定人員</option>
                    </select>
                    搜尋關鍵：<input type="text" name="keyvalue" /> <br>
                    <input type="submit" name="button" class="btn btn-dark" value="確定" />
                </form>
            </div>
        </section>

        <section>
            <div class="container">
                <h2>永久有效折扣</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">                        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>折扣兌換碼</td>
                                            <td>折扣名稱</td>
                                            <td>折扣金額</td>
                                            <td>折扣狀態</td>
                                            <td>設定人員</td>
                                            <td>建立日期</td>
                                            <td>使用日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $keytype = input('keytype');
                                        $keyvalue = input('keyvalue');
                                        if($keytype == null){
                                            $queryDCTMAS = "SELECT * FROM DCTMAS WHERE ACTCODE = '1' AND DCTSTAT = '2' ORDER BY CREATEDATE DESC";
                                        }
                                        else{
                                            $queryDCTMAS = "SELECT * FROM DCTMAS WHERE ACTCODE = '1' AND DCTSTAT = '2' AND $keytype = '$keyvalue' ORDER BY CREATEDATE DESC";
                                        }
                                        $result = mysql_query($queryDCTMAS);
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
                                        $result = mysql_query($queryDCTMAS.' LIMIT '.$start.', '.$per);
                                        if($result != false){
                                            while($row = mysql_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <!-- 折扣兌換碼 -->
                                                    <td><?php echo $row['DCTID'];?></td>
                                                    <!-- 折扣名稱 -->
                                                    <td><?php echo $row['DCTNM'];?></td>
                                                    <!-- 折扣金額 -->
                                                    <td><?php echo $row['DCTPRICE'];?></td>
                                                    <!-- 折扣狀態 -->
                                                    <td><?php echo $row['DCTSTAT'];?></td>
                                                    <!-- 設定人員 -->
                                                    <td><?php echo $row['CREATEPERSON'];?></td>
                                                    <!-- 建立日期 -->
                                                    <td><?php echo $row['CREATEDATE'];?></td>
                                                    <!-- 使用日期 -->
                                                    <td><?php echo $row['USEDATE'];?></td>
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