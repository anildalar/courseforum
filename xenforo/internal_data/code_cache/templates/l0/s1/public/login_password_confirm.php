<?php
// FROM HASH: 3ced3ea4bf46250be8022fc632713264
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeJs(array(
		'src' => 'xf/webauthn.js',
		'min' => '1',
	));
	$__finalCompiled .= '

';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Password confirmation');
	$__finalCompiled .= '

<div class="blocks">
	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'To access this page, you must first confirm your password.' . '
				', array(
		'rowtype' => 'confirm',
	)) . '

				' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
		'label' => 'Username',
	)) . '

				' . $__templater->formPasswordBoxRow(array(
		'name' => 'password',
	), array(
		'label' => 'Password',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Confirm',
	), array(
	)) . '
		</div>
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
		'action' => $__templater->func('link', array('login/password-confirm', ), false),
		'class' => 'block',
		'ajax' => 'true',
	)) . '

	';
	if ($__vars['passkey'] AND ($__templater->func('count', array($__vars['existingCredentials'], ), false) > 0)) {
		$__finalCompiled .= '
		<div class="blocks-textJoiner"><span></span><em>' . 'or' . '</em><span></span></div>

		<div class="block">
			<div class="block-container">
				<div class="block-body">
					' . $__templater->formRow('
						' . $__templater->form('

							' . $__templater->button('
								' . 'Passkey' . '
							', array(
			'class' => 'button--icon button--provider button--provider--passkey js-webauthnStart',
		), '', array(
		)) . '

							' . $__templater->formHiddenVal('webauthn_payload', '', array(
		)) . '
							' . $__templater->formHiddenVal('webauthn_challenge', ($__vars['passkey'] ? $__templater->method($__vars['passkey'], 'getChallenge', array()) : ''), array(
		)) . '
							' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
						', array(
			'action' => $__templater->func('link', array('login/password-confirm', ), false),
			'data-xf-init' => 'webauthn',
			'data-type' => 'get',
			'data-autotrigger' => 'false',
			'data-autosubmit' => 'true',
			'data-verifying' => 'Verifying' . $__vars['xf']['language']['ellipsis'],
		)) . '
					', array(
			'rowtype' => 'button',
		)) . '
				</div>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);