<?php

use \Bitrix\Main\Loader;

class ElementDetailComponent extends CBitrixComponent {
	public $arParams;
	public $arResult;

	public function onPrepareComponentParams($arParams) {
		Loader::includeModule("iblock");
		return $arParams;
	}

	public function executeComponent() {
		$arFilter = array(
			"ACTIVE" => "Y",
			"IBLOCK_CODE" => $this->arParams['IBLOCK_CODE'],
			"SECTION_CODE" => $this->arParams['SECTION_CODE'],
			"CODE" => $this->arParams['CODE'],
		);
		$arSelectedFields = array();
		$dbRes = CIBlockElement::GetList(array("SORT"=>"ASC"), $arFilter, false, false, $arSelectedFields);
		$arResult = $dbRes->Fetch();
		$this->arResult = $arResult;
		$this->includeComponentTemplate();
	}

}