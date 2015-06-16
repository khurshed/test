<?php
/* @var $this ProductsController */

$this->breadcrumbs=array(
	'Products',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php 
$count;
    if(!$count)
	echo "There Is no Book";
    else
		?>
	<table><tr><th>Title</th><th>Author</th><th>Price</th><th>Edition</th></tr>
		   <?php 
		
			foreach($data as $val)
			{?>
				<tr><td><?php echo $val->name;?></td><td><?php echo $val->author;?></td><td><?php echo $val->price;?></td><td><?php echo $val->edition;?></td>
			<?php
			}
			?>
    </table>
