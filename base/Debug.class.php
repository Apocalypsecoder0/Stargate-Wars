<?php
// Base::Debug.class.php
class Debug
{
	if (!defined('DEBUG')) {
		define('DEBUG', false);
	}

	function printMsg($className, $function, $message)
	{
		if(DEBUG)
		{
			$sub['{CLASSNAME}'] = $className;
			$sub['{FUNCTIONNAME}'] = $function;
			$sub['{MESSAGE}'] = $message;
			$templatePath = TEMPLATES_PATH."debug.tpl";
			if (file_exists($templatePath)) {
				$output = template($templatePath, $sub);
				echo $output;
			} else {
				error_log("Debug template file not found: " . $templatePath);
			}
			unset($sub['{CLASSNAME}']);
			unset($sub['{FUNCTIONNAME}']);
			unset($sub['{MESSAGE}']);
		}
	}
}
?>