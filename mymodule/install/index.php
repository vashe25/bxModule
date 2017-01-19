<?php

class mymodule extends CModule {

	public $MODULE_ID = 'mymodule';
	public $MODULE_NAME;
	public $MODULE_VERSION ;
	public $MODULE_VERSION_DATE;
	public $MODULE_DESCRIPTION;
	public $errors = '';

	public function mymodule() {
		$arModuleVersion = array();

		include(__DIR__."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = $arModuleVersion["MODULE_NAME"];
		$this->MODULE_DESCRIPTION = $arModuleVersion["MODULE_DESCRIPTION"];
	}

	public function InstallFiles() {
		CopyDirFiles($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/mymodule/install/components/dalee", $_SERVER['DOCUMENT_ROOT'] . "/bitrix/components/dalee", true, true);
		return true;
	}

	public function UnInstallFiles() {
		DeleteDirFiles($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/mymodule/install/components/dalee", $_SERVER['DOCUMENT_ROOT'] . "/bitrix/components/dalee");
		DeleteDirFilesEx("/bitrix/components/dalee");
		return true;
	}

	public function DoInstall() {
		$this->InstallFiles();
		RegisterModule('mymodule');
		return true;
	}

	public function DoUninstall() {
		$this->UnInstallFiles();
		UnRegisterModule('mymodule');
		return true;
	}
}