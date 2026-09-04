<?php
// FROM HASH: 32ce7a866472d4fefa2613a233fe2b4f
return array(
'macros' => array('event_details' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'event' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['event']['description']) {
		$__finalCompiled .= '
		<div class="eventDescription-description">' . $__templater->filter($__vars['event']['description'], array(array('raw', array()),), true) . '</div>
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['event']['hint_description']) {
		$__finalCompiled .= '
		<h4 class="block-textHeader block-textHeader--scaled">' . 'Event hint' . '</h4>
		<div class="eventDescription-description">' . $__templater->escape($__vars['event']['hint_description']) . '</div>
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['event']['arguments']) {
		$__finalCompiled .= '
		<h4 class="block-textHeader block-textHeader--scaled">' . 'Callback signature' . '</h4>
		<pre class="codeBlock" dir="ltr"><code>' . $__templater->escape($__vars['event']['callback_signature']) . '</code></pre>

		<h4 class="block-textHeader block-textHeader--scaled">' . 'Arguments' . '</h4>
		<table class="dataList dataList--separated" style="margin-top: 10px;">
			<thead>
				<tr class="dataList-row dataList-row--header">
					<th class="dataList-cell">' . 'Argument name' . '</th>
					<th class="dataList-cell">' . 'Argument type' . '</th>
					<th class="dataList-cell">' . 'Argument description' . '</th>
				</tr>
			</thead>
			<tbody>
				';
		if ($__templater->isTraversable($__vars['event']['arguments'])) {
			foreach ($__vars['event']['arguments'] AS $__vars['arg']) {
				$__finalCompiled .= '
					<tr class="dataList-row">
						<td class="dataList-cell"><code>' . $__templater->escape($__vars['arg']['name']) . '</code></td>
						<td class="dataList-cell">';
				if ($__vars['arg']['type']) {
					$__finalCompiled .= '<code>' . $__templater->escape($__vars['arg']['type']) . '</code>';
				}
				$__finalCompiled .= '</td>
						<td class="dataList-cell">' . $__templater->escape($__vars['arg']['description']) . '</td>
					</tr>
				';
			}
		}
		$__finalCompiled .= '
			</tbody>
		</table>
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
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
);