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
		<td><?php echo $user['User']['created']; ?></td>
		<td>
			<?php echo $this->Html->link('Edit', ['controller' => 'users', 'action' => 'edit', $user['User']['id']]) ?> ,
			<?php echo $this->Html->link('Delete', ['controller' => 'users', 'action' => 'delete', $user['User']['id']]) ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
