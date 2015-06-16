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
<table><tr><th>Title</th><th>Author</th><th>Price</th><th>Edition</th><th>Book Name</th><th>Image</th><th colspan="2">Action</th></tr>
		   <?php 
		
			foreach($model as $val)
			{
                            ?>
				<tr>
				<td><?php echo $val->name ?></td>
				<td><?php echo $val->author;?></td>
				<td><?php echo $val->price;?></td>
				<td><?php echo $val->edition;?></td>
                                <?php 
                                if(!empty($val->pid)){
                                    $book_name=$val->pid->name;
                                }else{
                                    $book_name='';
                                }
                                ?>
                                <td><?php echo $book_name; ?></td>
				<td><img class="img-admin" src="<?php echo Yii::app()->params['frontendUrl'].'/images/'.$val->image;?>"/></td>
                                <td class="td-icon"><a href="<?php echo Yii::app()->createAbsoluteUrl('products/edit',array('id'=>$val->id)); ?>"><span class="icon-large icon-edit"></span></a></td> 
                                <td class="td-icon">
                                    <a class="delete"  id="<?php echo $val->id ;?>" href="#">
                                           <span class="icon-large icon-trash">
                                    
                                           </span>
                                       </a>
                                </td>                                                               
                                </tr>
			<?php
			}
			?>
    </table>
<script>
    $(document).ready(function() {
	$('a.delete').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('id');
                var parent = $(this).parent().parent();
		if(confirm('Are you sure?'))
		{
		$.ajax({
			type: 'post',
			url: '<?php echo Yii::app()->createUrl('products/delete')?>',
			data: 'ajax=1&id=' + id,
			beforeSend: function() {
				parent.animate({'backgroundColor':'#fb6c6c'},600);
			},
			success: function() {
				       parent.slideUp(300,function() {
				       parent.remove();
				});
			}
		});
		}
	});
});

    </script>