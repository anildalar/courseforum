<?php
// FROM HASH: 9bb25a5d7d6b9b8f1d8fa0e7e7941226
return array(
'macros' => array('theme_color_meta' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'color' => '!',
		'media' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
			';
	if ($__vars['color']) {
		$__finalCompiled .= '
				<meta name="theme-color"' . ($__vars['media'] ? ((' media="' . $__templater->escape($__vars['media'])) . '"') : '') . ' content="' . $__templater->escape($__vars['color']) . '" />
			';
	}
	$__finalCompiled .= '
		';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<!DOCTYPE html>
<html id="XF" lang="' . $__templater->escape($__vars['xf']['language']['language_code']) . '" dir="' . $__templater->escape($__vars['xf']['language']['text_direction']) . '"
	data-app="public"
	' . ((($__templater->method($__vars['xf']['style'], 'isVariationsEnabled', array()) AND $__vars['xf']['visitor']['style_variation'])) ? (('data-variation="' . $__templater->escape($__vars['xf']['visitor']['style_variation'])) . '"') : '') . '
	' . ((($__templater->method($__vars['xf']['style'], 'isVariationsEnabled', array()) AND $__vars['xf']['visitor']['style_variation'])) ? (('data-color-scheme="' . $__templater->func('property_variation', array('styleType', $__vars['xf']['visitor']['style_variation'], ), true)) . '"') : '') . '
	data-template="' . $__templater->escape($__vars['template']) . '"
	data-container-key="' . $__templater->escape($__vars['containerKey']) . '"
	data-content-key="' . $__templater->escape($__vars['contentKey']) . '"
	data-logged-in="' . ($__vars['xf']['visitor']['user_id'] ? 'true' : 'false') . '"
	data-cookie-prefix="' . $__templater->escape($__vars['xf']['cookie']['prefix']) . '"
	class="' . ($__vars['template'] ? ('template-' . $__templater->escape($__vars['template'])) : '') . '">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

		<title>' . $__templater->func('page_title', array('%s | %s', $__vars['xf']['options']['boardTitle'], $__vars['pageNumber'])) . '</title>
		';
	$__vars['description'] = $__templater->preEscaped($__templater->func('page_description'));
	$__finalCompiled .= '

		' . '

		';
	if ($__templater->method($__vars['xf']['style'], 'isVariationsEnabled', array())) {
		$__finalCompiled .= '
			';
		if ($__vars['xf']['visitor']['style_variation']) {
			$__finalCompiled .= '
				' . $__templater->callMacro(null, 'theme_color_meta', array(
				'color' => $__templater->func('parse_less_color', array($__templater->func('property_variation', array('metaThemeColor', $__vars['xf']['visitor']['style_variation'], ), false), ), false),
			), $__vars) . '
			';
		} else {
			$__finalCompiled .= '
				';
			if ($__templater->method($__vars['xf']['style'], 'hasAlternateStyleTypeVariation', array())) {
				$__finalCompiled .= '
					' . $__templater->callMacro(null, 'theme_color_meta', array(
					'color' => $__templater->func('parse_less_color', array($__templater->func('property_variation', array('metaThemeColor', 'default', ), false), ), false),
					'media' => '(prefers-color-scheme: ' . $__templater->method($__vars['xf']['style'], 'getDefaultStyleType', array()) . ')',
				), $__vars) . '
					' . $__templater->callMacro(null, 'theme_color_meta', array(
					'color' => $__templater->func('parse_less_color', array($__templater->func('property_variation', array('metaThemeColor', $__templater->method($__vars['xf']['style'], 'getAlternateStyleTypeVariation', array()), ), false), ), false),
					'media' => '(prefers-color-scheme: ' . $__templater->method($__vars['xf']['style'], 'getAlternateStyleType', array()) . ')',
				), $__vars) . '
				';
			} else {
				$__finalCompiled .= '
					' . $__templater->callMacro(null, 'theme_color_meta', array(
					'color' => $__templater->func('parse_less_color', array($__templater->func('property_variation', array('metaThemeColor', 'default', ), false), ), false),
				), $__vars) . '
				';
			}
			$__finalCompiled .= '
			';
		}
		$__finalCompiled .= '
		';
	} else {
		$__finalCompiled .= '
			' . $__templater->callMacro(null, 'theme_color_meta', array(
			'color' => $__templater->func('parse_less_color', array($__templater->func('property_variation', array('metaThemeColor', 'default', ), false), ), false),
		), $__vars) . '
		';
	}
	$__finalCompiled .= '

		';
	if ($__templater->isTraversable($__vars['head'])) {
		foreach ($__vars['head'] AS $__vars['headTag']) {
			$__finalCompiled .= '
			' . $__templater->escape($__vars['headTag']) . '
		';
		}
	}
	$__finalCompiled .= '

		';
	if ($__vars['css']) {
		$__finalCompiled .= '
			<style>
				' . $__templater->filter($__vars['css'], array(array('raw', array()),), true) . '
			</style>
		';
	}
	$__finalCompiled .= '
	</head>

	<body data-template="' . $__templater->escape($__vars['template']) . '">
		<h1 class="p-offline-header">' . $__templater->func('page_h1', array($__vars['xf']['options']['boardTitle'])) . '</h1>

		' . $__templater->filter($__vars['content'], array(array('raw', array()),), true) . '
	</body>
</html>';
	return $__finalCompiled;
}
);