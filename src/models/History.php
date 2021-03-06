<?php
/**
 * 
 */
class History// extends Common
{
	
    /**
     * 
     * @var получаем количество запросов для вывода в истории
     * @return integer
     * 
     */
	private function getQuantity()
	{
		$classSettings = new Settings();
		$arrTemp       = $classSettings->getSettings();
		foreach ($arrTemp as $value) {
			if($value['item'] == "quantity")
				{
					return $value['value'];
				}
		}
		return 0;
	}

    /**
     * 
     * @var получаем данные истории
     * @return array
     * 
     */
	public function getHistory()
	{
		$countQuery = $this->getQuantity();
		
		return (file_exists(FILEHISTORY)) ? array_slice(unserialize(file_get_contents(FILEHISTORY)), -$countQuery) : [];
	}
}
?>