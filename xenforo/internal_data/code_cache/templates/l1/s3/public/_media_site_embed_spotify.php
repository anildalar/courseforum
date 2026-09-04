<?php
// FROM HASH: fe158d101d09516519970bf793df75bf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="bbMediaWrapper" data-media-site-id="' . $__templater->escape($__vars['siteId']) . '" data-media-key="' . $__templater->escape($__vars['id']) . '">
	<div class="bbMediaWrapper-inner bbMediaWrapper-inner--232px">
		<iframe src="https://open.spotify.com/embed?uri=spotify:' . $__templater->escape($__vars['id']) . '&theme=' . (($__templater->func('property', array('styleType', ), false) == 'light') ? 'white' : 'black') . '"
				loading="lazy"
				width="500" height="232"
				frameborder="0"></iframe>
	</div>
</div>';
	return $__finalCompiled;
}
);