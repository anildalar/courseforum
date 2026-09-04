<?php
// FROM HASH: 2b8928ebebfb2ffdbd3b722be543f4d5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__vars['attachment']) {
		$__finalCompiled .= $__templater->func('trim', array('
	<a href="' . $__templater->func('link', array('canonical:attachments', array('attachment_id' => $__vars['id'], ), ), true) . '" target="_blank">' . 'View attachment ' . $__templater->escape($__vars['id']) . '' . '</a>
'), false);
	} else if (((($__vars['attachment']['is_video'] OR $__vars['attachment']['is_audio'])) AND $__vars['full']) AND $__vars['canView']) {
		$__finalCompiled .= $__templater->func('trim', array('
	<div class="mediaPlaceholder">' . 'Embedded media' . '</div>
'), false);
	} else if (!$__vars['attachment']['has_thumbnail']) {
		$__finalCompiled .= $__templater->func('trim', array('
	<a href="' . $__templater->func('link', array('canonical:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '" target="_blank">' . 'View attachment ' . $__templater->escape($__vars['attachment']['filename']) . '' . '</a>
'), false);
	} else {
		$__finalCompiled .= $__templater->func('trim', array('
	<a href="' . $__templater->func('link', array('canonical:attachments', $__vars['attachment'], array('hash' => $__vars['attachment']['temp_hash'], ), ), true) . '"
		target="_blank"><img src="' . $__templater->escape($__vars['attachment']['thumbnail_url_full']) . '"
		srcset="' . ($__vars['attachment']['has_retina_thumbnail'] ? ($__templater->escape($__vars['attachment']['retina_thumbnail_url_full']) . ' 2x') : '') . '"
		class="bbImage"
		style="' . $__templater->escape($__vars['styleAttr']) . '"
		alt="' . $__templater->escape($__vars['alt']) . '"
		title="' . $__templater->escape($__vars['alt']) . '"
		width="' . $__templater->escape($__vars['attachment']['thumbnail_width']) . '" height="' . $__templater->escape($__vars['attachment']['thumbnail_height']) . '" /></a>
'), false);
	}
	return $__finalCompiled;
}
);