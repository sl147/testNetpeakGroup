<?php
/**
 * Общий класс со вспомагательными функциями
 */
class Common
{
	
    /**
     * 
     * @var получаем количество запросов для вывода в истории
     * @return integer
     * 
     */
/*	public function getQuery()
	{
		$classSettings = new Settings();
		$arr = $classSettings->getSettings();
		foreach ($arr as $value) {
			if($value['item'] == "quantity")
				{
					return $value['value'];
				}
		}
		return 0;
	}*/

    /**
     * 
     * @var вивод елемента меню
     * @return ничего
     * 
     */
	public static function showMainElMenu($href,$title,$titleText) {
		include (ROOT.'views/layouts/showMainElMenu.php');
	}
}
?>