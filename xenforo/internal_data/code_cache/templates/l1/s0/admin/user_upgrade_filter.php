<?php
// FROM HASH: 2dc28ee72aadbd0248c7bd996d22d9b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'All' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['upgrades'])) {
		foreach ($__vars['upgrades'] AS $__vars['upgrade']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['upgrade']['user_upgrade_id'],
				'label' => $__templater->escape($__vars['upgrade']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = array(array(
		'value' => '',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'All' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['paymentProfiles'])) {
		foreach ($__vars['paymentProfiles'] AS $__vars['profile']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['profile']['payment_profile_id'],
				'label' => $__templater->escape($__vars['profile']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array(array(
		'label' => '',
		'value' => '-1',
		'_type' => 'option',
	));
	$__compilerTemp3 = $__templater->mergeChoiceOptions($__compilerTemp3, $__vars['datePresets']);
	$__compilerTemp3[] = array(
		'value' => '1995-01-01',
		'label' => 'All time',
		'_type' => 'option',
	);
	$__compilerTemp4 = '';
	if ($__vars['type'] === 'expired') {
		$__compilerTemp4 .= '
		<div class="menu-row menu-row--separated">
			' . 'Date presets' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				';
		$__compilerTemp5 = array(array(
			'label' => '',
			'value' => '-1',
			'_type' => 'option',
		));
		$__compilerTemp5 = $__templater->mergeChoiceOptions($__compilerTemp5, $__vars['datePresets']);
		$__compilerTemp5[] = array(
			'value' => '1995-01-01',
			'label' => 'All time',
			'_type' => 'option',
		);
		$__compilerTemp4 .= $__templater->formSelect(array(
			'name' => 'date_preset_end',
			'class' => 'js-presetChange filterBlock-input',
			'data-start' => 'input[name=end_from]',
			'data-end' => 'input[name=end_to]',
		), $__compilerTemp5) . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="menu-row">
		' . 'Username' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'username',
		'ac' => 'single',
		'value' => $__vars['conditions']['username'],
		'dir' => 'ltr',
	)) . '
		</div>
	</div>

	<div class="menu-row">
		' . 'Upgrade' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'user_upgrade_id',
		'value' => $__vars['conditions']['user_upgrade_id'],
	), $__compilerTemp1) . '
		</div>
	</div>

	<div class="menu-row menu-row--separated">
		' . 'Payment profile' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'payment_profile_id',
		'value' => $__vars['conditions']['payment_profile_id'],
	), $__compilerTemp2) . '
		</div>
	</div>

	<div class="menu-row">
		' . 'Started between' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer inputGroup inputGroup--auto">
			' . $__templater->formDateInput(array(
		'name' => 'start_from',
		'value' => ($__vars['conditions']['start_from'] ? $__templater->func('date', array($__vars['conditions']['start_from'], 'Y-m-d', ), false) : ''),
	)) . '
			<span class="inputGroup-text">-</span>
			' . $__templater->formDateInput(array(
		'name' => 'start_to',
		'value' => ($__vars['conditions']['start_to'] ? $__templater->func('date', array($__vars['conditions']['start_to'], 'Y-m-d', ), false) : ''),
	)) . '
		</div>
	</div>
	<div class="menu-row menu-row--separated">
		' . 'Date presets' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'date_preset_start',
		'class' => 'js-presetChange filterBlock-input',
		'data-start' => 'input[name=start_from]',
		'data-end' => 'input[name=start_to]',
	), $__compilerTemp3) . '
		</div>
	</div>

	<div class="menu-row">
		' . 'Expires between' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer inputGroup inputGroup--auto">
			' . $__templater->formDateInput(array(
		'name' => 'end_from',
		'value' => ($__vars['conditions']['end_from'] ? $__templater->func('date', array($__vars['conditions']['end_from'], 'Y-m-d', ), false) : ''),
	)) . '
			<span class="inputGroup-text">-</span>
			' . $__templater->formDateInput(array(
		'name' => 'end_to',
		'value' => ($__vars['conditions']['end_to'] ? $__templater->func('date', array($__vars['conditions']['end_to'], 'Y-m-d', ), false) : ''),
	)) . '
		</div>
	</div>
	' . $__compilerTemp4 . '

	<div class="menu-row">
		' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer inputGroup">
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['conditions']['order'] ?: (($__vars['type'] == 'active') ? 'start_date' : 'end_date')),
	), array(array(
		'value' => 'username',
		'label' => 'Username',
		'_type' => 'option',
	),
	array(
		'value' => 'start_date',
		'label' => 'Start date',
		'_type' => 'option',
	),
	array(
		'value' => 'end_date',
		'label' => 'End date',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
			' . $__templater->formSelect(array(
		'name' => 'direction',
		'value' => ($__vars['conditions']['direction'] ?: 'desc'),
	), array(array(
		'value' => 'desc',
		'label' => 'Descending',
		'_type' => 'option',
	),
	array(
		'value' => 'asc',
		'label' => 'Ascending',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Filter', array(
		'type' => 'submit',
		'icon' => 'search',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>
', array(
		'action' => $__templater->func('link', array('user-upgrades/' . $__vars['type'], ), false),
		'class' => 'menu-content',
	)) . '

';
	$__templater->inlineJs('
	document.querySelectorAll(\'.js-presetChange\').forEach(ctrl =>
	{
		XF.on(ctrl, \'change\', e =>
		{
			const value = ctrl.value
			const form = ctrl.closest(\'form\')

			if (value == -1)
			{
				return
			}

			const startSelector = ctrl.dataset.start || \'input[name=start]\'
			const endSelector = ctrl.dataset.end || \'input[name=end]\'

			const startInput = form.querySelector(startSelector)
			const endInput = form.querySelector(endSelector)

			if (startInput)
			{
				startInput.value = value
			}
			if (endInput)
			{
				endInput.value = \'\'
			}
		})
	})
', true);
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
);