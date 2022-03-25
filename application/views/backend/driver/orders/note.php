<?php
$order_details = $this->order_model->get_by_code(sanitize($param2));
?>
<form action="<?php echo site_url('orders/add_note'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="code" value="<?php echo sanitize($param2); ?>">
        <label for="note"><?php echo get_phrase("note"); ?></label>
        <textarea class="form-control" name="note" id="note" rows="5" placeholder="<?php echo get_phrase("write_what_is_going_on"); ?>"><?php echo sanitize($order_details['note']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase("add_this_note"); ?></button>
</form>