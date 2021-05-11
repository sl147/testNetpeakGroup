<?php

/**
 * 
 * @var получаем информацию  о курсах валют с API Приватбанка
 * @return array
 * 
 */
class GetExchangeRate
{
	
	public function getRate() {
		$ch   = curl_init('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($ch);
		curl_close($ch);
		$arrTemp  = json_decode($json, true);

		// добавляем UAH
		$new_item = array(
			'ccy'    => 'UAH',
			'buy'    => 1
		);
		array_push($arrTemp, $new_item);
		return $arrTemp;
	}
}
?>