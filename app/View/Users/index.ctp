<?php echo $this->Html->link(
    'SHOW DELETED USERS AND GROUPS',
    array('controller' => 'users', 'action' => 'deleted')
); ?>
<h1>Blog Groups</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Group Name</th>
	</tr>
	<?php foreach ($groups as $id => $name): ?>
	<tr>
		<td><?php echo $id ?></td>
		<td><?php echo $name ?></td>
	</tr>
	<?php endforeach; ?>
    <?php unset($group); ?>
</table>

<hr>
<hr>
<hr>

<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>
<h1>Blog Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
		<th>Full Name</th>
		<th>Main Role</th>
		<th>Main Group</th>
		<th># of Posts</th>
		<th>Created</th>
		<th>Acions</th>
	</tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php
            echo $this->Html->link($user['User']['username'],[
                'controller' => 'users',
                'action' => 'view',
                $user['User']['id']
                 ]);
             ?>
		</td>
		<td><?php echo $user['User']['full_name'] ?></td>
		<td><?php echo $user['Role']['name']; ?></td>
		<td><?php echo $user['Group']['name']; ?></td>
		<td><?php echo $user['User']['posts_count']; ?></td>
		<td><?php echo $user['User']['created']; ?></td>
		<td>
			<?php echo $this->Html->link('Edit', ['controller' => 'users', 'action' => 'edit', $user['User']['id']]) ?> ,
			<?php echo $this->Form->postLink('Delete', ['controller' => 'users', 'action' => 'delete', $user['User']['id']],  array('confirm' => 'Are you sure?')) ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
