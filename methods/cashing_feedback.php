<?php
include_once("AllPay.Payment.Integration.php");
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/analyticstracking.php");

function transfer_PaymentType($paytype) {
	$split = explode('_', $paytype);
	if ($split[0] == 'Credit') {
		return 'A';
	}
	else if ($split[0] == 'ATM') {
		return 'B';
	}
	else if ($split[0] == 'WebATM') {
		return 'C';
	}
	else {
		return 'F';
	}
}

// get feedback from AllPay
try
{
	$obj = new AllInOne();
 	//AllPay Service Parameter
 	$obj->HashKey     = 'bwqFcafJNX4GzAWO'; 
    	$obj->HashIV      = 'mJf0B3ONPbCfwkmF';
    	$obj->MerchantID  = '1385617'; 
	//FeedBack Parameter
 	$arFeedback = $obj->CheckOutFeedback();
 	/* 檢核與變更訂單狀態 */
 	if(sizeof($arFeedback) > 0){
 		foreach ($arFeedback as $key => $value){
 			switch ($key)
 			{
	 			/* 支付後的回傳的基本參數 */
	 			case "MerchantID": $szMerchantID = $value; break;
				case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
				case "PaymentDate": $szPaymentDate = $value; break;
				case "PaymentType": $szPaymentType = $value; break;
				case "PaymentTypeChargeFee": $szPaymentTypeChargeFee = $value; break;
				case "RtnCode": $szRtnCode = $value; break;
				case "RtnMsg": $szRtnMsg = $value; break;
				case "SimulatePaid": $szSimulatePaid = $value; break;
				case "TradeAmt": $szTradeAmt = $value; break;
				case "TradeDate": $szTradeDate = $value; break;
				case "TradeNo": $szTradeNo = $value; break;
				case "PayAmt": $szPayAmt = $value; break;
				case "RedeemAmt": $szRedeemAmt = $value; break;
				default: break;
			}
 		}

 		if($szRtnCode == 1){
 			$paytype = transfer_PaymentType($szPaymentType);
 			$sql = "UPDATE ORDMAS SET PAYTYPE = '$paytype' WHERE MerchantTradeNo = '$szMerchantTradeNo'";
		    mysql_query($sql);
		    $sql = "UPDATE ORDMAS SET PAYSTAT = 1 WHERE MerchantTradeNo = '$szMerchantTradeNo'";
		    mysql_query($sql);
		    $sql = "UPDATE ORDMAS SET REALPRICE = '$szPayAmt' WHERE MerchantTradeNo = '$szMerchantTradeNo'";
		    mysql_query($sql);
		    $queryEMAIL = search('EMAIL', 'ORDMAS', 'MerchantTradeNo', $szMerchantTradeNo);
		    $sql = "UPDATE CUSMAS SET DISCOUNT = 0 WHERE EMAIL = '$queryEMAIL'";
		    mysql_query($sql);
		    print '1|OK';	//tell AllPay that we get the feedback
 		}
 	} 
 	else{
 		print '0|Fail';
 	}
}

catch (Exception $e){
	print '0|' . $e->getMessage();
}

?>
