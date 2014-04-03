<div class="attachments form">

<div class="clearfix">
<div class="actions" style="text-align: right;">

<?php
	// aciton options
	$options_save = $options_cancel = $this->Nodeattachment->requestOptions();

	// cancel
	$options_cancel['class'] = 'btn btn-danger';
	echo $this->Js->link(__d('croogo','prev'),
	        array(
	            'plugin' => 'nodeattachment',
	            'controller' => 'nodeattachment',
	            'action' => 'nodeIndex',
	            $this->data['Nodeattachment']['node_id'],
	        ),
	        $options_cancel
	);


?>

</div>
</div>

       <?php echo $this->Form->create('Nodeattachment'); ?>
       <fieldset>

              <div id="node-basic">
                     <div class="thumbnail">
                            <?php
                            $this->Nodeattachment->setNodeattachment($this->data);

                            echo $this->Image2->resize(
                                    $this->Nodeattachment->field('thumb_path'),
                                    140, 140, 'resizeRatio',
                                    array('alt' => $this->Nodeattachment->field('slug')),
                                    false,
                                    $this->Nodeattachment->field('server_thumb_path')
                            );
                            ?>
                     </div>

                     <?php
                     echo $this->Form->input('id');
                     echo $this->Form->input('title', array('label' => __('Title', true)));
                     // echo $this->Form->input('type', array('label' => __('Category', true)));
                     // echo $this->Form->input('author', array('label' => __('Author', true)));
                     // echo $this->Form->input('author_url', array('label' => __('Author Url', true)));
                     echo $this->Form->input('type', array('type' => 'checkbox'));
                     echo $this->Form->input('description', array('label' => __('Description', true)));
                     echo $this->Form->input('status', array('label' => __('Published', true)));
                     echo $this->Form->hidden('node_id');
                     echo $this->Form->hidden('mime_type');
                     echo $this->Form->hidden('slug');
                     ?>
              </div>

              <div id="node-info">
                     <?php
                     echo $this->Form->input('file_url', array('label' => __('File URL', true), 'value' => Router::url($this->data['Nodeattachment']['path'], true), 'readonly' => 'readonly'));
                     echo $this->Form->input('file_type', array('label' => __('Mime Type', true), 'value' => $this->data['Nodeattachment']['mime_type'], 'readonly' => 'readonly'));
                     ?>
              </div>
       </fieldset>
       <?php


	// save
	$options_save['class'] = 'btn btn-primary';
	echo $this->Js->submit(__d('croogo','Save file'), $options_save );

       echo $this->Js->writeBuffer();


       /* echo $this->Ajax->submit(__('Save attachment', true), array(
         'url' => array(
         'plugin' => 'nodeattachment',
         'controller' => 'nodeattachment',
         'action' => 'edit',
         $this->data['Nodeattachment']['id']),
         'update' => 'attachments-listing',
         'indicator' => 'loading')); */
       ?>
</div>
