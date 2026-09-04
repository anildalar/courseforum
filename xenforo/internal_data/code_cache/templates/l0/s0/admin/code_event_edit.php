<?php
// FROM HASH: 953bfb2e60e3ccdef4590e5da7c8cef8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['event'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add code event');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit code event' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['event']['event_id']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['event'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('code-events/delete', $__vars['event'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['event']['arguments'])) {
		foreach ($__vars['event']['arguments'] AS $__vars['counter'] => $__vars['arg']) {
			$__compilerTemp1 .= '
						<li class="inputGroup inputGroup--joined">
							' . $__templater->formTextBox(array(
				'name' => 'arguments[' . $__vars['counter'] . '][name]',
				'value' => $__vars['arg']['name'],
				'placeholder' => 'Argument name',
				'size' => '15',
				'dir' => 'ltr',
			)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formTextBox(array(
				'name' => 'arguments[' . $__vars['counter'] . '][type]',
				'value' => $__vars['arg']['type'],
				'placeholder' => 'Argument type',
				'size' => '25',
				'dir' => 'ltr',
			)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formTextBox(array(
				'name' => 'arguments[' . $__vars['counter'] . '][description]',
				'value' => $__vars['arg']['description'],
				'placeholder' => 'Argument description',
				'size' => '40',
			)) . '
						</li>
					';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'event_id',
		'value' => $__vars['event'],
		'dir' => 'ltr',
	), array(
		'label' => 'Event ID',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'description',
		'value' => $__vars['event']['description'],
		'mode' => 'html',
		'class' => 'codeEditor--short',
	), array(
		'label' => 'Description',
		'hint' => 'You may use HTML',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('

				<ul class="listPlain inputGroup-container">
					' . $__compilerTemp1 . '

					<li class="inputGroup inputGroup--joined" data-xf-init="field-adder" data-increment-format="arguments[{counter}]">
						' . $__templater->formTextBox(array(
		'name' => 'arguments[' . $__vars['nextCounter'] . '][name]',
		'placeholder' => 'Argument name',
		'size' => '15',
		'dir' => 'ltr',
	)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formTextBox(array(
		'name' => 'arguments[' . $__vars['nextCounter'] . '][type]',
		'placeholder' => 'Argument type',
		'size' => '25',
		'dir' => 'ltr',
	)) . '
						<span class="inputGroup-splitter"></span>
						' . $__templater->formTextBox(array(
		'name' => 'arguments[' . $__vars['nextCounter'] . '][description]',
		'placeholder' => 'Argument description',
		'size' => '40',
	)) . '
					</li>
				</ul>
			', array(
		'rowtype' => 'input',
		'label' => 'Arguments',
		'explain' => 'The arguments passed to the listener callback. Arguments passed by reference should be prefixed with <code>&amp;</code>.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'hint_description',
		'value' => $__vars['event']['hint_description'],
	), array(
		'label' => 'Hint description',
		'explain' => 'Describes the purpose of the event hint, if one is available.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->callMacro(null, 'addon_macros::addon_edit', array(
		'addOnId' => $__vars['event']['addon_id'],
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('code-events/save', $__vars['event'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);