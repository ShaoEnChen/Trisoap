<?
session_start();
include("AllPay.Payment.Integration.php");
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");

$ORDNO = $_SESSION['ORDNO'];
$paytype = $_SESSION['PAYTYPE'];
$totalamount = $_SESSION['total'];

try {
    $obj = new AllInOne();

    //AllPay Service Parameter
    $obj->ServiceURL = "https://payment-stage.allpay.com.tw/Cashier/AioCheckOut/V2";
    $obj->HashKey    = '5294y06JbISpM5x9';                                           //Hashkey
    $obj->HashIV     = 'v77hoKGq4kWxNNIS';                                           //HashIV
    $obj->MerchantID = '2000132';                                                    //MerchantID

    //Basic Order Parameter
    $obj->Send['ReturnURL'] = "http://localhost/methods/cashing_feedback.php"; //付款完成通知回傳的網址
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
    $obj->Send['ClientBackURL']     = "http://localhost/Homepage/index.php";

    // $sql = "UPDATE ORDMAS SET MerchantTradeNo = '$TradeNo' WHERE ORDNO = '$ORDNO'";
    // mysql_query($sql);

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
    array_push($obj->Send['Items'], array('Name' => "運費", 'Price' => $shipfee,
        'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));
    
    //discount
    $discount = search('DISCOUNT', 'CUSMAS', 'EMAIL', $EMAIL);
    array_push($obj->Send['Items'], array('Name' => "留心語折扣", 'Price' => $discount,
        'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));

    /*//update info
    $sql = "UPDATE ORDMAS SET PAYTYPE = '$paytype' WHERE ORDNO = '$ORDNO'";
    mysql_query($sql);
    $sql = "UPDATE ORDMAS SET PAYSTAT = 1 WHERE ORDNO = '$ORDNO'";
    mysql_query($sql);
    $sql = "UPDATE ORDMAS SET TOTALAMT = $totalamount-$discount WHERE ORDNO = '$ORDNO'";
    mysql_query($sql);
    $sql = "UPDATE CUSMAS SET DISCOUNT = 0 WHERE EMAIL = '$EMAIL'";
    mysql_query($sql);
    unset($_SESSION['ORDNO']);
    unset($_SESSION['PAYTYPE']);
    unset($_SESSION['total']);*/

    //Create Order(auto submit to AllPay)
    $obj->CheckOut();
      
    //Exception
    } catch (Exception $e) {
        echo $e->getMessage();
    }?>