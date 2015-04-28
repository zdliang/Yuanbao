<?php
include 'stock.php';
$stockNum = $_GET["stockNum"];
$stock = new StockTest();
$stockList = $stock->GetSimiliarStocks($stockNum);
if (!is_array($stockList)) {
 	echo "empty stock array";	
}
else{	
	foreach ($stockList as $stock) {
		echo $stock["matchedSymbol"].":".date("Y-m-d",strtotime($stock["matchedWinStartDate"])).":".date("Y-m-d",strtotime($stock["matchedWinEndDate"]))."<BR />";
		// foreach ($stock as $key => $value) {
		// 			echo $key.":".$value."<BR />";
		// 		}				
	}	
}
?>