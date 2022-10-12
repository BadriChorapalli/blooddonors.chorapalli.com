<?php 
	
	class dbConnect{
		var $link;
		var $result= "true";
		/*This function is used for connecting mysql database*/	
		function connectMysql()
		{
			$db_host= "localhost";
			$db_username="root";
			$db_password="";
			
			
			
			$db_name="blooddonors";
			$this->link= mysql_connect($db_host, $db_username, $db_password,false);
			mysql_set_charset('utf8',$this->link); 
		    
			mysql_select_db($db_name,$this->link);
		}
		
		/*This function is used for closing mysql database*/
		function closeMysql()
		{
			mysql_close($this->link);
		}
		
		/* This function is used for inserting details*/
		function insertMysql($insertQuery)
		{ 
			$this->connectMysql();
			$insertResult=mysql_query($insertQuery) or die(mysql_error());	
			if($insertResult==1){
				$this->result="true";
			}else{
				$this->result="false";
			}			
			return $this->result;
			$this->closeMysql();		
			
		}	
		
		/* This function is used for updating records*/
		function updateMysql($updateQuery)
		{
			$this->connectMysql();
			$updateResult=mysql_query($updateQuery) or die(mysql_error());
			if($updateResult==1){
				$this->result="true";
			}else{
				$this->result="false";
			}	
			return $this->result;	
			$this->closeMysql();
		}
		/*This function is used for delteing Records*/
		function deleteMysql($deleteQuery)
		{
			$this->connectMysql();
			$deleteResult=mysql_query($deleteQuery) or die(mysql_error());
			if($deleteResult==1){
				$this->result="true";
			}else{
				$this->result="false";
			}		
			return $this->result;
			$this->closeMysql();
		}
		function xmlGeneration($xmlQuery)
		{
		//echo $xmlQuery;
			$this->connectMysql();
			$totalString="<Main>";
			$selectResult=mysql_query($xmlQuery) or (mysql_error());
			$noFields=mysql_num_fields($selectResult);
			$noRows=mysql_num_rows($selectResult);
			$tableName=mysql_field_table($selectResult,0);
			$j=0;
			if($noRows>$j){
				while($j<$noRows){
					$totalString=$totalString."<$tableName>";	
					for($i=0;$i<$noFields;$i++)	{
						$fieldName= mysql_field_name($selectResult,$i);
						$fieldValue=mysql_result($selectResult,$j,$i);
						//if(str_replace("&nbsp;",$fieldValue)){
						$fieldValue=str_replace("&nbsp;","_",$fieldValue);
						//}
						$totalString=$totalString."<".$fieldName.">".$fieldValue."</".$fieldName.">";	
					}		
					$j++;
					$totalString=$totalString."</$tableName>";				 
				}
			
			}
			$totalString=$totalString."</Main>";	
			echo  $totalString;	
			$this->closeMysql();
			
		}   
		function getValues($query)
		{
			$data=array();
			$this->connectMysql();
			$selectResult=mysql_query($query) or (mysql_error());
			$noFields=mysql_num_fields($selectResult);
			$noRows=mysql_num_rows($selectResult);
			$j=0;
			if($noRows>$j){
				while($j<$noRows){
				
					for($i=0;$i<$noFields;$i++)	{
						$fieldValue=mysql_result($selectResult,$j,$i);
						$data[$i]=$fieldValue;
					}		
					$j++;
				}
			}
			return $data;
			$this->closeMysql();
			
		}
		function getSqlNumber($query){
			$this->connectMysql();
			$selResult=mysql_query($query) or die(mysql_error());
			$selno=mysql_num_rows($selResult);
			return $selno;
			$this->closeMysql();
		}
		function getLanguage()
		{
		$this->connectMysql();
		$query="select language from settings";
		$selResult=mysql_query($query) or die(mysql_error());
		$selno=mysql_num_rows($selResult);
		return mysql_result($selResult,0,0);
		$this->closeMysql();
		}
		function getMaxId($maxQuery){
		$this->connectMysql();
		$selResult=mysql_query($maxQuery) ;
		$selno=mysql_num_rows($selResult);
		if($selno!=0){
		return mysql_result($selResult,0,0)+1;
		}else
		{
		return 1;
		}
		$this->closeMssql();
		}
		
		function checkValue($checkQuery){
		$this->connectMysql();
		$selResult=mysql_query($checkQuery) ;
		$selno=mysql_num_rows($selResult);
		return $selno;
		$this->closeMysql();
		}
	}
	
/*	$clasa = "Something";
	$object = new $clasa;
	$object->load();
	$object->call();*/
?>
