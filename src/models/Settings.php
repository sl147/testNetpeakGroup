<?php
/**
 * 
 */
class Settings
{
		
	public function addLine($item, $value)
	{
		return array(
			'item'  => $item,
			'value' => $value
		);
	}	

	public function getSettings()
	{
		$arrTemp =[];
		if (file_exists(FILESETTINGS))
		{
			$data = file_get_contents(FILESETTINGS);
			$settings = unserialize($data);
			foreach ($settings as $value) {	
				array_push($arrTemp, $this->addLine($value['item'], $value['value']));
			}
		}
		else
		{
			$classGetRate = new GetExchangeRate();
			$listСurrency = $classGetRate->getRate();
			array_push($arr, $this->addLine('quantity', 10));
			foreach ($listСurrency as $value) {
				array_push($arrTemp, $this->addLine($value['ccy'], true));
			}
		}
		return $arrTemp;
	}

	public function getSettingsCurrency($listСurrency)
	{
		$settings = $this->getSettings();
		$arrTemp = $listСurrency;
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