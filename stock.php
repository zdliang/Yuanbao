<?php
/**
*  class to get stock information
*/
class StockTest
{    
    function GetSimiliarStocks($stockNum)
    {
        $similarStocks = array();
        if (is_numeric($stockNum) && strlen($stockNum)==6){        
            if ($_SERVER['REMOTE_ADDR']=="127.0.0.1"){
                $link = mysql_connect('127.0.0.1', 'admin', '1a2b3c') or die('Could not connect: ' . mysql_error());    
                //echo 'Local';
            } else{
                $link = mysql_connect('yuanbao.cloudapp.net', 'yuanbao', '1a2b3c') or die('Could not connect: ' . mysql_error()); 
                //echo 'Remote';
            }
            
            
            mysql_select_db('yuanbao') or die('Could not select database');

            // Performing SQL query

            $query = "SELECT * FROM yuanbao.close_predict_new where sameIndex=1 and samePosition=1 and sameIndexPosition=1 and volumeDistRank in (0,1,2) and indexDistRank in (0,1,2) and symbol='".$stockNum."'";    

            $result = mysql_query($query) or die('Query failed: ' . mysql_error());

            // Printing results in HTML            
            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {                                
                $similarStocks[] = array('matchedSymbol' => $line["matchedSymbol"], 'matchedWinStartDate'=>$line["matchedWinStartDate"],'matchedWinEndDate'=>$line["matchedWinEndDate"]);
            }            

            // Free resultset
            mysql_free_result($result);

            // Closing connection
            mysql_close($link);
            return $similarStocks;
        }
    }
}
?>