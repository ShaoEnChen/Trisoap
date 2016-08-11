<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>查看客戶</title>
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
                <h2>客戶一覽</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">                        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>電子信箱</td>
                                            <td>客戶姓名</td>
                                            <td>客戶地址</td>
                                            <td>客戶膚質</td>
                                            <td>客戶生日</td>
                                            <td>聯絡電話</td>
                                            <td>如何認識三三</td>
                                            <td>建立日期</td>
                                            <td>最後修改日期</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $queryCustomer = "SELECT * FROM CUSMAS";
                                        $result = mysql_query($queryCustomer);
                                        while($row = mysql_fetch_array($result)){
                                            $queryEMAIL = $row['EMAIL'];
                                    ?>
                                        <tr>
                                            <!-- 電子信箱 -->
                                            <td>
                                                <form name="form" method="post" action="View_CUSMAS_Detail.php">
                                                <input type="hidden" name="EMAIL" value="<?echo $queryEMAIL;?>" />
                                                <input type="submit" name="button" value="<?echo $queryEMAIL;?>" />
                                                </form>
                                            </td>
                                            <!-- 客戶姓名 -->
                                            <td><?echo $row['CUSNM'];?></td>
                                            <!-- 客戶地址 -->
                                            <td><?echo $row['CUSADD'];?></td>
                                            <!-- 客戶膚質 -->
                                            <td><?echo $row['CUSTYPE'];?></td>
                                            <!-- 客戶生日 -->
                                            <td><?echo $row['CUSBIRTHY'].'/'.$row['CUSBIRTHM'].'/'.$row['CUSBIRTHD'];?></td>
                                            <!-- 聯絡電話 -->
                                            <td><?echo $row['TEL'];?></td>
                                            <!-- 如何認識三三 -->
                                            <td><?echo $row['KNOWTYPE'];?></td>
                                            <!-- 建立日期 -->
                                            <td><?echo $row['CREATEDATE'];?></td>
                                            <!-- 最後修改日期 -->
                                            <td><?echo $row['UPDATETEDATE'];?></td>
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