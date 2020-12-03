<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>

<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
		<th>Created</th>
		<th>Acions</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
            echo $this->Html->link($post['Post']['title'],[
                'controller' => 'posts',
                'action' => 'view',
                $post['Post']['id']
                 ]);
             ?>
        </td>
		<td><?php echo $post['Post']['created']; ?></td>
		<td>
			<?php echo $this->Html->link('Edit', ['controller' => 'posts', 'action' => 'edit', $post['Post']['id']]) ?> ,
			<?php echo $this->Form->postLink('Delete', ['controller' => 'posts', 'action' => 'delete', $post['Post']['id']],  array('confirm' => 'Are you sure?')) ?>
		</td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
