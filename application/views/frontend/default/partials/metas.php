<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="<?php echo sanitize(get_system_settings('author')); ?>">
<meta name="robots" content="index, follow" />
<meta name="keywords" content="<?php echo sanitize(get_system_settings('website_keywords')); ?>" />
<meta name="description" content="<?php echo sanitize(get_system_settings('website_description')); ?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- PAGE TITLE ARE SAFE. SINCE THEY ARE BEING GENERATED INSIDE THE SYSTEM -->
<title><?php echo htmlspecialchars($page_title); ?> | <?php echo sanitize(get_system_settings('system_title')); ?></title>
<link rel="shortcut icon" href="<?php echo base_url('uploads/system/' . get_website_settings('favicon')); ?>">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X2RELYL4HF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X2RELYL4HF');
</script>