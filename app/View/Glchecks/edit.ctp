<div class="glchecks form">
<?php echo $this->Form->create('Glcheck'); ?>
	<fieldset>
		<legend><?php echo __('Edit Glcheck'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('checkNumber');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Glcheck.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Glcheck.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Glchecks'), array('action' => 'index')); ?></li>
	</ul>
</div>
