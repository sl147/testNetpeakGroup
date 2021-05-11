<?php
/**
 * Общий класс со вспомагательными функциями
 */
class Common
{

    /**
     * @var вивод елемента меню
     * @return ничего
     * 
     */
	public static function showMainElMenu($href,$title,$titleText) {
		include (ROOT.'views/layouts/showMainElMenu.php');
	}

    /**
     * 
     * @var для добавления строки массива 
     * @return array
     * 
     */
	public function addLine($item, $value)
	{
		return array(
			'item'  => $item,
			'value' => $value
		);
	}	
}
?>