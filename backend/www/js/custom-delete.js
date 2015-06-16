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
