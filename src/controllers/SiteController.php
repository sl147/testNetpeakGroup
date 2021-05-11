<?php

class SiteController
{	

    /**
     * 
     * @var получаем массивы с курспми валют
     * @return array listСurrency массив всех курсов
     * @return array settingsCurrency массив курсов с учетом настроек
     * 
     */
	function __construct()
	{
		$classGetRate           = new GetExchangeRate();
		$this->listСurrency     = $classGetRate->getRate();
		$classSettings          = new Settings();
		$this->settingsCurrency = $classSettings->getSettingsCurrency($this->listСurrency); 
	}

    /**
     * 
     * @var получаем курс заданной валюты
     * @param array $list массив курсов валют
     * @param text $curr валюта для которой получаем курс
     * @return integer
     * 
     */
	private function getKurs($list, $curr)
	{
		foreach ($list as $item)
		{
			if ($item['ccy'] == $curr)
			{
				return $item['buy'];
			}
		}
		return 1;
	}

    /**
     * 
     * @var получаем отфильтрованное значение с формы для типа number
     * @param text $field имя поля с формы
     * @return integer
     * 
     */
	private function filterINT($field)
	{
		return filter_input(INPUT_POST, $field, FILTER_VALIDATE_INT); 
	}

    /**
     * 
     * @var получаем отфильтрованное значение с формы для типа text
     * @param text $field имя поля с формы
     * @return text
     * 
     */
	private function filterTXT($field)
	{
		return filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
	}


    /**
     * 
     * @var контроллер для страницы калькулятора
     * 
     */
	public function actionIndex() // контроллер для калькулятора
	{
		$result   = 0;
		$quantity = CONSTQUANTITY;
		if(isset($_POST['submit']))
		{
			$currFrom = $this->filterTXT('from');
			$currTo   = $this->filterTXT('to');
			$quantity = $this->filterINT('quantity');
			$kursFrom = $this->getKurs($this->listСurrency, $currFrom);
			$kursTo   = $this->getKurs($this->listСurrency, $currTo);
			$result   = $kursFrom / $kursTo * $quantity;


			// записываем в историю	
			if (file_exists(FILEHISTORY))
			{
				$data    = file_get_contents(FILEHISTORY);
				$arrTemp = unserialize($data);
			}
			else
			{
				$arrTemp = [];
			}

				
			$date_mas = getdate();
			$new_item = array(
					'date'      => time(),
					'currFrom'  => $currFrom,
					'currTo'    => $currTo,
					'quantity'  => $quantity,
					'res'       => $result
				);
			array_push($arrTemp, $new_item);
			file_put_contents(FILEHISTORY, serialize($arrTemp));
		}

		$siteFile = 'views/site/main.php';
		require_once (SITEINDEX);
		return true;
	}

    /**
     * 
     * @var контроллер для страницы настроек
     * 
     */
	public function actionSettings()
	{
		$classSettings = new Settings();
		$arrTemp       = $classSettings->getSettings();

		if(isset($_POST['submit']))
		{
			$arrTemp = [];
			array_push($arrTemp, $classSettings->addLine('quantity', $this->filterINT('quantity')));

			foreach ($this->listСurrency as $value) {
				$val = $this->filterINT($value['ccy']);
				array_push($arrTemp, $classSettings->addLine($value['ccy'], (isset($val)) ? 1 : 0));
			}
			file_put_contents(FILESETTINGS,serialize($arrTemp));
		}

		$siteFile = 'views/site/settings.php';
		require_once (SITEINDEX);
		return true;
	}

    /**
     * 
     * @var контроллер для страницы истории
     * 
     */
	public function actionHistory()
	{
		$classHistory = new History();
		$history      = $classHistory->getHistory();
		$siteFile     = 'views/site/history.php';	
		require_once (SITEINDEX);
		return true;
	}
}
?>