<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
        <title>商品管理</title>
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
                            <a href="Create_ITEMMAS.php">
                                新增商品<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Edit_ITEMMAS.php">
                                更新商品<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Delete_ITEMMAS.php">
                                下架商品<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Upload_ITEMMAS.php">
                                上市商品<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Replenish_ITEMMAS.php">
                                商品進貨<i class="fa fa-angle-down" aria-hidden="true"></i>
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
                <h2>商品管理</h2>
                <div class="manage">
                    <div class="row table-responsive">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade in active">                        
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>商品編號</td>
                                            <td>商品名稱</td>
                                            <td>商品數量</td>
                                            <td>商品價格</td>
                                            <td>商品描述</td>
                                            <td>商品狀態</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $queryITEMMAS = "SELECT * FROM ITEMMAS";
                                        $result = mysql_query($queryITEMMAS);
                                        if($result != false){
                                            while($row = mysql_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <!-- 商品編號 -->
                                                    <td><?php echo $row['ITEMNO'];?></td>
                                                    <!-- 商品名稱 -->
                                                    <td><?php echo $row['ITEMNM'];?></td>
                                                    <!-- 商品數量 -->
                                                    <td><?php echo $row['ITEMAMT'];?></td>
                                                    <!-- 商品價格 -->
                                                    <td><?php echo $row['PRICE'];?></td>
                                                    <!-- 商品描述 -->
                                                    <td><?php echo $row['DESCRIPTION'];?></td>
                                                    <!-- 商品狀態 -->
                                                    <td><?php echo $row['ACTCODE'];?></td>
                                                </tr>
                                                <?
                                            }
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