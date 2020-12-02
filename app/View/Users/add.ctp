<h1>Registeration Form</h1>
<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('first_name');
			echo $this->Form->input('family_name');
			echo $this->Form->input('role_id', array('options' => array(
				1 => 'Admin',
				2 => 'User',
			)));
			echo $this->Form->input('group_id', array('options' => array(
				1 => 'Sport',
				2 => 'Technology',
			)));
		?>
	</fieldset>
	<?php echo $this->Form->end('Register'); ?>
</div>
