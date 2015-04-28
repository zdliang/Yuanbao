<?php
include 'stock.php';
$stockNum = $_GET["stockNum"];
$stock = new StockTest();
$stockList = $stock->GetSimiliarStocks($stockNum);
if (!is_array($stockList) or count($stockList)==0) {
 	echo "empty stock array";	
}
else{	
	//echo $stockList[0]["meanPredictExcessRet"];
	$index = 1;
	foreach ($stockList as $stock) {		
		echo $index;
		echo $stock["matchedSymbol"].":".date("Y-m-d",strtotime($stock["matchedWinStartDate"])).":".date("Y-m-d",strtotime($stock["matchedWinEndDate"]))."<BR />";
		echo sprintf("%.2f", $stock["meanPredictExcessRet"]*100)."%<BR />";
		$index++;
		// foreach ($stock as $key => $value) {
		// 			echo $key.":".$value."<BR />";
		// 		}				
	}	
}
?>