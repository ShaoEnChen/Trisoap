<section>
    <div class="container">
        <h2>所有可更新的訂單</h2>
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
                                    <td>建立日期</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                    $queryORDMAS = "SELECT * FROM ORDMAS where EMAIL='$EMAIL' AND ORDSTAT='E' AND PAYSTAT='0' AND ACTCODE='1'";
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
                                    $result = mysql_query($queryCustomer.' LIMIT '.$start.', '.$per);
                                    while($row = mysql_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <!-- 訂單編號 -->
                                            <td><?echo $row['ORDNO'];?></td>
                                            <!-- 訂單種類 -->
                                            <td><?show_ORDTYPE($row['ORDTYPE']);?></td>
                                            <!-- 顧客編號 -->
                                            <td><?echo $row['EMAIL'];?></td>
                                            <!-- 發票編號 -->
                                            <td><?echo $row['INVOICENO'];?></td>
                                            <!-- 缺貨狀態 -->
                                            <td><?show_BACKSTAT($row['BACKSTAT']);?></td>
                                            <!-- 訂單狀態 -->
                                            <td><?show_ORDSTAT($row['ORDSTAT']);?></td>
                                            <!-- 付款狀態 -->
                                            <td><?show_PAYSTAT($row['PAYSTAT']);?></td>
                                            <!-- 付款方式 -->
                                            <td><?show_PAYTYPE($row['PAYTYPE']);?></td>
                                            <!-- 訂單總額 -->
                                            <td><?echo $row['TOTALPRICE'];?></td>
                                            <!-- 訂單總值 -->
                                            <td><?echo $row['TOTALAMT'];?></td>
                                            <!-- 建立日期 -->
                                            <td><?echo $row['CREATEDATE'];?></td>
                                        </tr>
                                    <?php
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