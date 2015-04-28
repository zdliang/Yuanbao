<?php
include 'stock.php';
$stockNum = $_GET["stockNum"];
$stock = new StockTest();
$stockList = $stock->GetSimiliarStocks($stockNum);
if (!is_array($stockList) or count($stockList)==0) {
 	echo "empty stock array";	
}
else{		
	//echo sprintf("%.2f", $stockList[0]["meanPredictExcessRet"]*100)."%<BR />";
	//echo sprintf("%.2f", $stockList[0]["meanPredictExcessRet"]*100)."%<BR />";
	echo "未来20日预期绝对回报 ".sprintf("%.2f", $stockList[0]["meanPredictRet"]*100)."%  预期相对回报".sprintf("%.2f", $stockList[0]["meanPredictExcessRet"]*100)."%\n本数据由历史数据模拟而成，不作为投资依据，\n投资者据此操作，我公司不负任何责任";
	echo "<BR />";
	$content[] = array("Title"=>"股票代码：".$keyword, 
                                   "Description"=>"未来20日预期绝对回报 ".sprintf("%.2f", $stockList[0]["meanPredictRet"]*100)."%  预期相对回报".sprintf("%.2f", $stockList[0]["meanPredictExcessRet"]*100)."%\n本数据由历史数据模拟而成，不作为投资依据，\n投资者据此操作，我公司不负任何责任", 
                                   "PicUrl"=>"", 
                                   "Url" =>"");
	$index = 1;
	foreach ($stockList as $stock) {		
		//echo $index."<BR />";
		//echo "历史最像走势第".$index."名 ".$stock["matchedSymbol"]." ".date("Y/m/d",strtotime($stock["matchedWinStartDate"]))."-".date("Y/m/d",strtotime($stock["matchedWinEndDate"]))."<BR />";
		echo "历史最像走势第".$index."名 ".$stock["matchedSymbol"]." ".date("Y/m/d",strtotime($stock["matchedWinStartDate"]))."-".date("Y/m/d",strtotime($stock["matchedWinEndDate"]));
		echo "<BR />";
		$content[] = array(//"Title"=>"历史最像走势第".$index."名 ".$stock["matchedSymbol"]." ".date("Y/m/d",strtotime($stock["matchedWinStartDate"]))."-".date("Y/m/d",strtotime($stock["matchedWinEndDate"])), 
                        "Title"=>$index." ".$stock["matchedSymbol"]." ".date("Y/m/d",strtotime($stock["matchedWinStartDate"]))."-".date("Y/m/d",strtotime($stock["matchedWinEndDate"])), 
                        "Description"=>"", 
                        "PicUrl"=>"", 
                        "Url" =>"");
		//echo sprintf("%.2f", $stock["meanPredictExcessRet"]*100)."%<BR />";
		$index++;
		// foreach ($stock as $key => $value) {
		// 			echo $key.":".$value."<BR />";
		// 		}				
	}	
}
?>
<html>
	<header>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	</header>
</html>