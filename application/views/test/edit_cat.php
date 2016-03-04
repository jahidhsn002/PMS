<?php if(empty(validation_errors())): ?>
<?php echo form_open('Test/edit_category',array('id' => 'myform','onsubmit' => 'submit()')); ?>

<input type="hidden" name="uid" value="<?php echo $uid; ?>" />

<h5>Name</h5>
<input type="text" name="name" value="<?php echo $name; ?>" />

<h5>Description</h5>
<textarea name="detail"><?php echo $detail; ?></textarea>

<div><input type="submit" data-dismiss="modal" value="Submit" /></div>

<?php echo form_close(); ?>

<script>
	var frm = $('form#myform');
	var button = $('form#myform input[type=submit]');
    button.click(function (event) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                $(".dox").html(data);
				$("#category").load("<?php echo site_url('Test/view_category'); ?>");
            }
        }); 
    });
</script>
<?php else:
	echo validation_errors();
endif; ?>
