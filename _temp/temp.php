<?php

define("STOP_STATISTICS", true);
define("NO_KEEP_STATISTIC", "Y");
define("NO_AGENT_STATISTIC","Y");
define("DisableEventsCheck", true);
define("BX_SECURITY_SHOW_MESSAGE", true);
define("BX_STATISTIC_BUFFER_USED", false);

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$APPLICATION->IncludeComponent("dalee:element.detail", ".default", array(
	"IBLOCK_CODE" => "",
	"SECTION_CODE" => "",
	"CODE" => "",
));
