<?php

/**
 * Ace Freely by Brandon Haslip
 *
 * @package   Ace Freely (Named by Chad J. Clark)
 * @author    Brandon Haslip
 * @copyright Copyright (c) 2014, Brandon Haslip
 * @link      http://brandonhaslip.com
 * @license   GNU Public License (http://opensource.org/licenses/gpl-license.php)
 */

namespace Craft;

class AceFreely_AceFreelyFieldType extends BaseFieldType
{

	public function getName()
	{
		return Craft::t('Ace Freely');
	}


	public function defineContentAttribute()
	{
		return array(AttributeType::String, 'column' => ColumnType::Text);
	}


	protected function defineSettings()
	{
		return array(
			'height'     => array(AttributeType::Number, 'default' => 200),
			'useTabs'    => array(AttributeType::Bool,   'default' => 1),
			'tabSize'    => array(AttributeType::Number, 'default' => 4),
			'theme'      => array(AttributeType::Enum,   'values'  => array(
				'ambiance',
				'chaos',
				'chrome',
				'clouds_midnight',
				'clouds',
				'cobalt',
				'crimson_editor',
				'dawn',
				'dreamweaver',
				'eclipse',
				'github',
				'idle_fingers',
				'katzenmilch',
				'kr_theme',
				'kuroir',
				'merbivore_soft',
				'merbivore',
				'mono_industrial',
				'monokai',
				'pastel_on_dark',
				'solarized_dark',
				'solarized_light',
				'terminal',
				'textmate',
				'tomorrow_night_blue',
				'tomorrow_night_bright',
				'tomorrow_night_eighties',
				'tomorrow_night',
				'tomorrow',
				'twilight',
				'vibrant_ink',
				'xcode'
				), 'default' => 'chrome')
		);
	}


	public function getInputHtml($name, $value)
	{

		// Reformat the input name into something that looks more like an ID
		$id = craft()->templates->formatInputId($name);

		// Figure out what that ID is going to look like once it has been namespaced
		$namespacedId = craft()->templates->namespaceInputId($id);

		// Get settings
		$settings = $this->getSettings();

		// Include our Javascript
		craft()->templates->includeJsResource('acefreely/ace/ace.js');
		craft()->templates->includeJsResource('acefreely/ace.freely.js');
		craft()->templates->includeJs('AceFreely.init("' . $namespacedId . '", "' . $settings->theme . '", "' . $settings->useTabs . '", "' . $settings->tabSize . '");');

		return craft()->templates->render('acefreely/input', array(
			'name'     => $name,
			'value'    => $value,
			'settings' => $settings
		));
	}


	public function getSettingsHtml()
	{
		return craft()->templates->render('acefreely/settings', array(
			'settings' => $this->getSettings()
		));
	}

}
