<?php
/**
 * класс для работы с настройками
 */
class Settings extends Common
{

    /**
     * @var получаем данные настроек
     * @return array
     * 
     */
	public function getSettings()
	{
		$arrTemp =[];
		// если настройки существуют берем их
		if (file_exists(FILESETTINGS))
		{
			$settings = unserialize(file_get_contents(FILESETTINGS));
			foreach ($settings as $value) {	
				array_push($arrTemp, $this->addLine($value['item'], $value['value']));
			}
		}
		// иначе берем по умолчанию все валюты и количество 10
		else
		{
			$classGetRate = new GetExchangeRate();
			array_push($arrTemp, $this->addLine('quantity', 10));
			foreach ($classGetRate->getRate() as $value) {
				array_push($arrTemp, $this->addLine($value['ccy'], true));
			}
		}
		return $arrTemp;
	}

    /**
     * @var получаем массив курсов валют с учетом настроек
     * @param array $listСurrency массив курсов всех валют
     * @return array
     * 
     */
	public function getSettingsCurrency($listСurrency)
	{
		$settings = $this->getSettings();
		$arrTemp  = $listСurrency;
		foreach ($settings as $value) {
			if ($value["value"] == 0) {
				foreach ($arrTemp as $key => $val) {					
					if ($value['item'] == $val['ccy'])
					{
						unset($arrTemp[$key]);
					}
				}
			}
		}
		return $arrTemp;
	}
}
?>