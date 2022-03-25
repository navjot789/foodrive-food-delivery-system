<?php  $support_details = $this->support_model->get_by_support_id($param2); ?>

<?php if($support_details['refund_fault'] =="partial") :?>
    <?php if($this->session->userdata('user_role') == "admin") :?>
            <blockquote class="blockquote text-center mt-0">
            <p class="text-muted">Refund Reason</p>
            <small class="mt-0"> <?php echo sanitize($support_details['refund_reason']);?></small>
            </blockquote>

            <blockquote class="blockquote text-center  mt-0">
            <p class="text-muted">General comment</p>
            <small class="mb-0"> <?php echo sanitize($support_details['gen_cmt']);?><small>
            </blockquote>
     <?php else: ?>
            <blockquote class="blockquote text-center mt-0">
            <small class="mt-0"> <?php echo sanitize($support_details['refund_reason']);?></small>
            </blockquote>
     <?php endif; ?> 

<?php elseif($support_details['refund_fault'] == "restaurant") : ?>
    <blockquote class="blockquote  mt-0">
     <small class="mt-0"> <?php echo sanitize($support_details['refund_reason']);?></small>
    </blockquote>
<?php elseif($support_details['refund_fault'] == "system") : ?>
    <blockquote class="blockquote  mt-0">
     <small class="mb-0 text-muted"> <?php echo sanitize($support_details['gen_cmt']);?><small>
    </blockquote> 
<?php endif; ?>


