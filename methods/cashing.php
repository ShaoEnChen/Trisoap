<?
session_start();
include_once("AllPay.Payment.Integration.php");
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");

$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$paytype = $_SESSION['PAYTYPE'];
$totalamount = $_SESSION['total'];
$DCT = $_SESSION['DISCOUNT'];

try {
    $obj = new AllInOne();

    //AllPay Service Parameter
    $obj->ServiceURL = "https://payment-stage.allpay.com.tw/Cashier/AioCheckOut/V2";
    $obj->HashKey    = '5294y06JbISpM5x9';                                           //Hashkey
    $obj->HashIV     = 'v77hoKGq4kWxNNIS';                                           //HashIV
    $obj->MerchantID = '2000132';                                                    //MerchantID

    //Basic Order Parameter
    $obj->Send['ReturnURL'] = "http://192.168.5.63/methods/cashing_feedback.php"; //付款完成通知回傳的網址
    $TradeNo = "Test".time();  //use time to produce TradeNo
    $obj->Send['MerchantTradeNo']   = $TradeNo;                                 //Order_id
    $obj->Send['MerchantTradeDate'] = date("Y/m/d H:i:s");                      //Order_time
    $obj->Send['TotalAmount']       = $totalamount;                             //Order_amount
    $obj->Send['TradeDesc']         = "trisoap";                                //Order_Description
    if($paytype == 'B'){
        $obj->Send['ChoosePayment'] = PaymentMethod::ATM;                    //Payment Method
    }
    elseif($paytype == 'C'){
        $obj->Send['ChoosePayment'] = PaymentMethod::WebATM;                    //Payment Method
    }
    else{
        $obj->Send['ChoosePayment'] = PaymentMethod::Credit;                    //Payment Method
    }
    $obj->Send['ClientBackURL']     = "http://192.168.5.63/Homepage/index.php";

    $sql = "UPDATE ORDMAS SET MerchantTradeNo = '$TradeNo' WHERE ORDNO = '$ORDNO'";
    mysql_query($sql);
    if($DCT != null){
        $sql = "UPDATE DCTMAS SET MerchantTradeNo = '$TradeNo' WHERE DCTID = '$DCT'";
        mysql_query($sql);
    }

    //Order Item Lists
    $ItemNo = array("ItemNo");
    $ItemName = array("ItemName");
    $Price = array(0);
    $ItemAmount = array(0);

    $sql = "SELECT ITEMNO FROM ORDITEMMAS where ORDNO = '$ORDNO'";
    $no_result = mysql_query($sql);
    while($no_row = mysql_fetch_row($no_result, MYSQL_NUM)){         //get item node
        $node = $no_row[0];
        $name = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $node);
        array_push($ItemName, $name);
        $price = search('PRICE', 'ITEMMAS', 'ITEMNO', $node);
        array_push($Price, $price);
    }

    $sql = "SELECT ORDAMT FROM ORDITEMMAS where ORDNO = '$ORDNO'";  //get item amount
    $amt_result = mysql_query($sql);
    $number = mysql_num_rows($amt_result);
    while($amt_row = mysql_fetch_row($amt_result, MYSQL_NUM)){
        $amt = $amt_row[0];
        array_push($ItemAmount, $amt);
    }

    for($i=1; $i<=$number; $i++){
        array_push($obj->Send['Items'], array('Name' => $ItemName[$i], 'Price' => $Price[$i],
               'Currency' => "元", 'Quantity' => $ItemAmount[$i], 'URL' => "xxx"));
    }

    //shipfee
    $shipfee = search('SHIPFEE', 'ORDMAS', 'ORDNO', $ORDNO);
    array_push($obj->Send['Items'], array('Name' => "運費", 'Price' => $shipfee, 'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));
    
    //discount_MSGMAS
    $discount = search('DISCOUNT', 'CUSMAS', 'EMAIL', $EMAIL);
    if($discount != 0){
        array_push($obj->Send['Items'], array('Name' => "留心語折扣", 'Price' => $discount, 'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));
    }

    //discount_DCTMAS
    if($DCT != null){
        $DISCOUNTNM = search('DCTNM', 'DCTMAS', 'DCTID', $DCT);
        $DISCOUNTPRICE = search('DCTPRICE', 'DCTMAS', 'DCTID', $DCT);
        array_push($obj->Send['Items'], array('Name' => "$DISCOUNTNM", 'Price' => $DISCOUNTPRICE, 'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));
    }

    //Create Order(auto submit to AllPay)
    $obj->CheckOut();
      
    //Exception
}
catch (Exception $e) {
    echo $e->getMessage();
}
unset($_SESSION['ORDNO']);
unset($_SESSION['PAYTYPE']);
unset($_SESSION['total']);
UNSET($_SESSION['DISCOUNT']);
?>