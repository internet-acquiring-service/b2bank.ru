<?

/**
 * Функция : Получение содержимого реестра возмещений
 */
include "b2bankapi.php";

/**
 * Секретный ключ клиента HashId.
 * Берется на панели управления в разделе Сайты
 */
$my_hash_id = "__HASH_ID__";

/**
 * Идентификатор сайта клиента SiteID.
 * Берется на панели управления в разделе Сайты.
 * Если установить значение SiteID = 0, то список платежей формируется по всем сайтам владельца
 */
$my_site_id = "0";

/**
 */
$myB2BankAPI = new B2BankAPIClass($my_hash_id, $my_site_id);

/**
 * Входные параметры
 *
 * Пример оформления массива запроса
 *
 * $myB2BankAPI->ar_params = array(
 * "m_ireestr" => "8" // Номер реестра возмещений. Обязательный параметр.
 * );
 */

/**
 * Для примера
 */
$my_ireestr = "70";

$myB2BankAPI->ar_params = array(
	"m_ireestr" => $my_ireestr
);

/**
 * Запрос функции
 */
$myB2BankAPI->b2bankbackreestrinfo();

/**
 * Результат работы функции
 */
if ($myB2BankAPI->ar_response->m_code == 0)
{
	/**
	 * При успешном завершении выполняется обработка данных ответа функции
	 */
	foreach ($myB2BankAPI->ar_response->ar_reestr as $key => $row)
	{
		print 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_record . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ireestr_date . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_iowner_url . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_idate_payment . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_isum . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_description . "<br>" . 	
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment . "<br>" . 
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment_date . "<br>" . 			
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_fiscal . "<br>".
			$myB2BankAPI->ar_response->ar_reestr[$key]->m_ipayment_mode . "<br>".
			
		"<br>==================<br>";
	}
} else
{

	/**
	 * При ошибочном завершении функции возвращается код ошибки и текстовое описание кода ошибки
	 */
	print $myB2BankAPI->ar_response->m_code . "<br>" . $myB2BankAPI->ar_response->m_code_text . "<br>";
}

?>
