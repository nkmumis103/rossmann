<?php
	require_once("host.php");
	class Demo{
		private $dbgo;
		function demo(){
			$this->dbgo = new PDO("mysql:host=localhost;dbname=id3298469_mis_rossmann;charset=utf8", DB_USER, DB_PW);
			$this->dbgo ->exec('SET NAMES utf8');
			$this->dbgo ->exec('SET CHARSET utf8');
		}
		function getData($account){
			$sql = "SELECT * FROM member WHERE account = '$account'";
			$result = $this->dbgo->query($sql);
			$sqlData = array();
			while($row=$result->fetch(PDO::FETCH_OBJ)) {
				array_push($sqlData,$row);
			}
			return $sqlData;
		}
		function insertData($Store,$DayOfWeek,$Date,$Promo,$Open,$SchoolHoliday,$StoreType,$Assortment,$CompetitionDistance,$CompetitionOpenSinceYear,$CompetitionOpenSinceMonth,$Promo2,$Promo2SinceYear,$Promo2SinceWeek,$PromoInterval,$Sales){
			try{
				$sql = "INSERT INTO rossmann (Store,DayOfWeek,Date,Promo,Open,SchoolHoliday,StoreType,Assortment,CompetitionDistance,CompetitionOpenSinceYear,CompetitionOpenSinceMonth,Promo2,Promo2SinceYear,Promo2SinceWeek,PromoInterval,Sales) VALUES ('$Store','$DayOfWeek','$Date','$Promo','$Open','$SchoolHoliday','$StoreType','$Assortment','$CompetitionDistance','$CompetitionOpenSinceYear','$CompetitionOpenSinceMonth','$Promo2','$Promo2SinceYear','$Promo2SinceWeek','$PromoInterval','$Sales')";
				$result = $this->dbgo->prepare($sql);
				return $result->execute();
			}
			catch(PDOException $e){
				return false;
				die();
			}
		}
	}	
?>