<section>
    <div class="container">
        <h2>所有可取消的訂單</h2>
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
                                <?
                                    $queryORDMAS = "SELECT * FROM ORDMAS where EMAIL='$EMAIL' AND ORDSTAT='E' AND PAYSTAT='0' AND ACTCODE='1'";
                                    $result = mysql_query($queryORDMAS);
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
                                            <!-- 實收金額 -->
                                            <td><?echo $row['REALPRICE'];?></td>
                                            <!-- 建立日期 -->
                                            <td><?echo $row['CREATEDATE'];?></td>
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