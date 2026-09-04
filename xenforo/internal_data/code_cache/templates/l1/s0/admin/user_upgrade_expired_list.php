<?php
// FROM HASH: 05e5ce76652d197df138a02a39c01206
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Expired user upgrades');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		' . $__templater->callMacro(null, 'filter_macros::filter_bar', array(
		'route' => 'user-upgrades/expired',
		'content' => null,
		'params' => $__vars['linkParams'],
		'displayValues' => $__vars['filterDisplay'],
		'phrases' => array('key:username' => 'Username' . $__vars['xf']['language']['label_separator'], 'key:user_upgrade_id' => 'Upgrade' . $__vars['xf']['language']['label_separator'], 'key:payment_profile_id' => 'Payment profile' . $__vars['xf']['language']['label_separator'], 'key:start_from' => 'Started from' . $__vars['xf']['language']['label_separator'], 'key:start_to' => 'Started to' . $__vars['xf']['language']['label_separator'], 'key:end_from' => 'expired_from:', 'key:end_to' => 'expired_to:', 'key:order' => 'Sort by' . $__vars['xf']['language']['label_separator'], 'val:username_desc' => ('Username' . ' - ') . 'Descending', 'val:username_asc' => ('Username' . ' - ') . 'Ascending', 'val:start_date_desc' => ('Start date' . ' - ') . 'Descending', 'val:start_date_asc' => ('Start date' . ' - ') . 'Ascending', 'val:end_date_desc' => ('End date' . ' - ') . 'Descending', 'val:end_date_asc' => ('End date' . ' - ') . 'Ascending', ),
		'menu' => 'user-upgrades/expired-filter',
		'menuTitle' => 'Filter',
	), $__vars) . '

		';
	if (!$__templater->test($__vars['expiredUpgrades'], 'empty', array())) {
		$__finalCompiled .= '
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['expiredUpgrades'])) {
			foreach ($__vars['expiredUpgrades'] AS $__vars['expiredUpgrade']) {
				$__compilerTemp1 .= '
						';
				$__vars['paymentProfile'] = $__vars['expiredUpgrade']['PurchaseRequest']['PaymentProfile'];
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
								' . $__templater->func('username_link', array($__vars['expiredUpgrade']['User'], false, array(
					'defaultname' => 'Unknown user',
					'href' => $__templater->func('link', array('users/edit', $__vars['expiredUpgrade']['User'], ), false),
				))) . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['expiredUpgrade']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['expiredUpgrade']['Upgrade']['title']) . '</a>
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
					'html' => $__templater->func('date_dynamic', array($__vars['expiredUpgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['expiredUpgrade']['end_date'] ? $__templater->func('date', array($__vars['expiredUpgrade']['end_date'], ), true) : 'Permanent'),
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'username', 'direction' => (((($__vars['linkParams']['order'] == 'username') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'User' . '</a>',
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
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'start_date', 'direction' => (((($__vars['linkParams']['order'] == 'start_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Start date' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'end_date', 'direction' => (((($__vars['linkParams']['order'] == 'end_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'End date' . '</a>',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['expiredUpgrades'], $__vars['totalExpired'], ), true) . '</span>
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
		'total' => $__vars['totalExpired'],
		'link' => 'user-upgrades/expired',
		'params' => $__vars['linkParams'],
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>';
	return $__finalCompiled;
}
);