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
		$arr  = json_decode($json, true);

		// добавляем UAH
		$new_item = array(
			'ccy'    => 'UAH',
			'buy'    => 1
		);
		array_push($arr, $new_item);
		return $arr;
	}
}
?>