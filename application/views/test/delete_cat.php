<?php if(empty(validation_errors())): ?>

Are you sheore? All your resistered field will get uncategorized .....

<?php echo form_open('Test/delete_category',array('id' => 'myform','onsubmit' => 'submit()')); ?>

<input type="hidden" name="uid" value="<?php echo $uid; ?>" />

<div><input type="submit" data-dismiss="modal" value="Yes" /></div>

<div><input type="button" data-dismiss="modal" value="No" /></div>

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
