<?php
/* @var $this PostController */

$this->breadcrumbs=array(
	'Post',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<table><tr><th>user Name</th><th>Message</th><th>Date</th></tr>
		   <?php 
		
			foreach($model as $val)
			{
                            ?>
				<tr>
				<td><?php echo $val->user->name;?></td>
				<td><?php echo $val->message;?></td>
				<td><?php echo $val->date;?></td>                                              
                                </tr>
			<?php
			}
			?>
    </table>
