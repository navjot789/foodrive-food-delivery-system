<!-- SHOW TOASTR NOTIFIVATION -->
<!-- SUCCESS -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

	<script type="text/javascript">
		"use strict";
		toastr.options.closeButton = true;
		toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 0;
		toastr.success('<?php echo htmlspecialchars($this->session->flashdata("flash_message")); ?>');
	</script>

<?php endif; ?>
<!-- DANGER -->
<?php if ($this->session->flashdata('error_message') != "") : ?>

	<script type="text/javascript">
		"use strict";
		toastr.options.closeButton = true;
		toastr.options.timeOut = 0;
        toastr.options.extendedTimeOut = 0;
		toastr.error('<?php echo htmlspecialchars($this->session->flashdata("error_message")); ?>');
	</script>

<?php endif; ?>

<!-- WARNING -->
<?php if ($this->session->flashdata('notice_message') != "") : ?>

<script type="text/javascript">
	"use strict";
	toastr.options.closeButton = true;
	toastr.options.timeOut = 0;
    toastr.options.extendedTimeOut = 0;
	toastr.warning('<?php echo htmlspecialchars($this->session->flashdata("notice_message")); ?>');
	
</script>

<?php endif; ?>

<?php if ($this->session->userdata('user_role') == "customer" || $this->session->userdata('user_role') == "owner" && is_restaurant_owner($this->session->userdata('user_id'))) : ?>
	<script type="text/javascript">
		"use strict";
		$('.role-switcher').tooltip()
	</script>
<?php endif; ?>

<script type="text/javascript">
	"use strict";

	function switch_language(language) {
		$.ajax({
			url: '<?php echo site_url('site/site_language'); ?>',
			type: 'post',
			data: {
				language: language
			},
			success: function(response) {
				setTimeout(function() {
					location.reload();
				}, 500);
			}
		});
	}
</script>


