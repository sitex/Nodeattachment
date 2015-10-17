<div class="attachments index">

	<table cellpadding="0" cellspacing="0">
		<tbody id="sortable">
		<?php
		foreach ($attachments AS $i => $attachment) {
			$this->Nodeattachment->setNodeattachment($attachment);
			$file_name = explode('.', $this->Nodeattachment->field('slug'));

			$actions = $this->Js->link(__d('croogo', 'Edit'),
				array(
					'plugin'     => 'nodeattachment',
					'controller' => 'nodeattachment',
					'action'     => 'edit',
					$attachment['Nodeattachment']['id']
				),
				$this->Nodeattachment->requestOptions()
			);
			$actions .= $this->Js->link(__d('croogo', 'Delete'),
				array(
					'plugin'     => 'nodeattachment',
					'controller' => 'nodeattachment',
					'action'     => 'delete',
					$attachment['Nodeattachment']['id'],
					'token'      => $this->params['_Token']['key']
				),
				$this->Nodeattachment->requestOptions(
					array(
						'confirm' => __('Are you sure?', true),
						'method'  => 'POST'
					)
				)
			);


			/* $actions = $this->Ajax->link(__('Edit', true), array(
			  'plugin' => 'nodeattachment',
			  'controller' => 'nodeattachment',
			  'action' => 'edit',
			  $attachment['Nodeattachment']['id']),
			  array('update' => 'attachments-listing', 'indicator' => 'loading')
			  );
			  $actions .= ' ' . $this->Layout->adminRowActions($attachment['Nodeattachment']['id']);
			  $actions .= ' ' . $this->Ajax->link(__('Delete', true), array(
			  'plugin' => 'nodeattachment',
			  'controller' => 'nodeattachment',
			  'action' => 'delete',
			  $attachment['Nodeattachment']['id'],
			  'token' => $this->params['_Token']['key']),
			  array('update' => 'attachments-listing', 'indicator' => 'loading')
			  ); */

			$thumbnail = $this->Image2->resize(
				$this->Nodeattachment->field('thumb_path'), 75, 75, 'resizeRatio', array('alt' => $this->Nodeattachment->field('slug')), false, $this->Nodeattachment->field('server_thumb_path'));

			/* if ($mimeType == 'image') {
			  $thumbnail = $this->Html->link($image->resize('/uploads/' . $attachment['Nodeattachment']['slug'], 100, 200), array('controller' => 'nodeattachment', 'action' => 'edit', $attachment['Nodeattachment']['id']), array('escape' => false));
			  } else {
			  $thumbnail = $this->Html->image('/img/icons/page_white.png') . ' ' . $attachment['Nodeattachment']['mime_type'] . ' (' . $filemanager->filename2ext($attachment['Nodeattachment']['slug']) . ')';
			  } */

			$row = '';
			$row .= $this->Html->tag('td', $i);
			$row .= $this->Html->tag('td', $this->Html->tag('span', '', array('class' => 'ui-icon ui-icon-arrowthick-2-n-s')));
			$row .= $this->Html->tag('td', $attachment['Nodeattachment']['id']);
			$row .= $this->Html->tag('td', $thumbnail);
			$row .= $this->Html->tag('td', '(' . $file_name[1] . ')');
			$row .= $this->Html->tag('td', substr($attachment['Nodeattachment']['title'], 0, 50) . '...');
			$row .= $this->Html->tag('td', $actions);
			echo $this->Html->tag(
				'tr', $row, array('class' => 'ui-state-default', 'id' => 'nodeattachments_' . $attachment['Nodeattachment']['id'])
			);
		}
		?>
		</tbody>
	</table>
	<?php
	// sort attachments
	$sortUrl = $this->Html->url(array(
		'plugin'     => 'nodeattachment',
		'controller' => 'nodeattachment',
		'action'     => 'sort'
	));
	$options = array(
		"complete" => "$.post('" . $sortUrl . "', $('#sortable').sortable('serialize'))"
	);
	$this->Js->get('#sortable');
	$this->Js->sortable($options);

	echo $this->Js->writeBuffer();
	?>
</div>

