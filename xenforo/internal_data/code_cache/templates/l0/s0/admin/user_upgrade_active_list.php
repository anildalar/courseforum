<?php
// FROM HASH: 2f47751d014fa18b16e8843c3f775f12
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Active user upgrades');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		' . $__templater->callMacro(null, 'filter_macros::filter_bar', array(
		'route' => 'user-upgrades/active',
		'content' => null,
		'params' => $__vars['linkParams'],
		'displayValues' => $__vars['filterDisplay'],
		'phrases' => array('key:username' => 'Username' . $__vars['xf']['language']['label_separator'], 'key:user_upgrade_id' => 'Upgrade' . $__vars['xf']['language']['label_separator'], 'key:payment_profile_id' => 'Payment profile' . $__vars['xf']['language']['label_separator'], 'key:start_from' => 'Started from' . $__vars['xf']['language']['label_separator'], 'key:start_to' => 'Started to' . $__vars['xf']['language']['label_separator'], 'key:end_from' => 'Expires from' . $__vars['xf']['language']['label_separator'], 'key:end_to' => 'Expires to' . $__vars['xf']['language']['label_separator'], 'key:order' => 'Sort by' . $__vars['xf']['language']['label_separator'], 'val:username_desc' => ('Username' . ' - ') . 'Descending', 'val:username_asc' => ('Username' . ' - ') . 'Ascending', 'val:start_date_desc' => ('Start date' . ' - ') . 'Descending', 'val:start_date_asc' => ('Start date' . ' - ') . 'Ascending', 'val:end_date_desc' => ('End date' . ' - ') . 'Descending', 'val:end_date_asc' => ('End date' . ' - ') . 'Ascending', ),
		'menu' => 'user-upgrades/active-filter',
		'menuTitle' => 'Filter',
	), $__vars) . '

		';
	if (!$__templater->test($__vars['activeUpgrades'], 'empty', array())) {
		$__finalCompiled .= '
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['activeUpgrades'])) {
			foreach ($__vars['activeUpgrades'] AS $__vars['activeUpgrade']) {
				$__compilerTemp1 .= '
						';
				$__vars['paymentProfile'] = $__vars['activeUpgrade']['PurchaseRequest']['PaymentProfile'];
				$__compilerTemp2 = '';
				if ($__vars['paymentProfile']) {
					$__compilerTemp2 .= '
									<a href="' . $__templater->func('link', array('payment-profiles/edit', $__vars['paymentProfile'], ), true) . '">' . $__templater->escape($__vars['paymentProfile']['title']) . '</a>
								';
				} else {
					$__compilerTemp2 .= '
									' . 'N/A' . '
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('username_link', array($__vars['activeUpgrade']['User'], false, array(
					'defaultname' => 'Unknown user',
					'href' => $__templater->func('link', array('users/edit', $__vars['activeUpgrade']['User'], ), false),
				))) . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['activeUpgrade']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['activeUpgrade']['Upgrade']['title']) . '</a>
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . '' . '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['activeUpgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['activeUpgrade']['end_date'] ? $__templater->func('date', array($__vars['activeUpgrade']['end_date'], ), true) : 'Permanent'),
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/edit-active', null, array('user_upgrade_record_id' => $__vars['activeUpgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Edit',
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/downgrade', null, array('user_upgrade_record_id' => $__vars['activeUpgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Downgrade',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'username', 'direction' => (((($__vars['linkParams']['order'] == 'username') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'User' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => 'Upgrade title',
		),
		array(
			'_type' => 'cell',
			'html' => 'Payment profile',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'start_date', 'direction' => (((($__vars['linkParams']['order'] == 'start_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Start date' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'end_date', 'direction' => (((($__vars['linkParams']['order'] == 'end_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'End date' . '</a>',
		),
		array(
			'colspan' => '2',
			'_type' => 'cell',
			'html' => '',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['activeUpgrades'], $__vars['totalActive'], ), true) . '</span>
			</div>
		';
	} else {
		$__finalCompiled .= '
			<div class="blockMessage">' . 'No results found.' . '</div>
		';
	}
	$__finalCompiled .= '
	</div>

	' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['totalActive'],
		'link' => 'user-upgrades/active',
		'params' => $__vars['linkParams'],
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>';
	return $__finalCompiled;
}
);