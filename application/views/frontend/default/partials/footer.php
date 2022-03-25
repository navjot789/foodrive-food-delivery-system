<!--============================= FOOTER =============================-->
<?php $social_links = json_decode(get_website_settings('social_links'), true); ?>
<footer class="main-block bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="copyright">
                    <p><a href="<?php echo get_system_settings('footer_link'); ?>" target="_blank">&copy<?php echo get_system_settings('footer_text'); ?></a></p>
                    <ul>
                        <?php if (!empty(sanitize($social_links['facebook']))) :?>
                        <li><a class="text-muted" href="<?php echo sanitize($social_links['facebook']); ?>" target="_blank" ><span class="ti-facebook"></span></a></li>
                        <?php endif; ?>

                         <?php if (!empty(sanitize($social_links['twitter']))) :?>
                        <li><a class="text-muted" href="<?php echo sanitize($social_links['twitter']); ?>"  target="_blank"><span class="ti-twitter-alt"></span></a></li>
                        <?php endif; ?>

                        <?php if (!empty(sanitize($social_links['instagram']))) :?>
                        <li><a class="text-muted" href="<?php echo sanitize($social_links['instagram']); ?>"  target="_blank"><span class="ti-instagram"></span></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="footer-page-links" >
                        <li><a class="text-muted" href="<?php echo site_url('auth/registration/driver'); ?>">We're hiring</a></li>
                        <li><a class="text-muted" href="<?php echo site_url('site/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a></li>
                        <li><a class="text-muted" href="<?php echo site_url('site/faq'); ?>">FAQ's</a></li>
                        <li><a class="text-muted" href="<?php echo site_url('site/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
                    </ul>

                    <div class="d-flex justify-content-center">
                    <div class="p-2">  <a href="https://play.google.com/store/apps/details?id=ca.foodrive.foodrive" target="_blank"><img src="https://ik.imagekit.io/l4f8iqzrdp1c/google-play-badge_rDGuQLaN8.png?ik-sdk-version=javascript-1.4.3&updatedAt=1643970429282" class="system-icon"> </a></div>
                    <div class="p-2">  <img src="https://ik.imagekit.io/l4f8iqzrdp1c/apple_badge_comming_soon_Ce8-YbrBdrA.png?ik-sdk-version=javascript-1.4.3&updatedAt=1643970429201" class="system-icon"> </div>
                    </div>
                </div>
            </div>
            <div class="select mt-3 ">
                <select name="slct" id="slct" onchange="switch_language(this.value)" class="language-selector">
                    <option disabled><?php echo site_phrase('choose_language'); ?></option>
                    <?php $languages = $this->language_model->get_all();
                    foreach ($languages as $key => $language) : ?>
                        <option value="<?php echo sanitize($language['code']); ?>" <?php if ($this->session->userdata('language') == sanitize($language['code'])) echo "selected"; ?>><?php echo sanitize($language['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</footer>
<!--============================= FOOTER =============================-->
<!--============================= FLOTING CART BUTTON AND BOTTOM TO TOP =============================-->
<a id="back-to-top" href="#" class="btn btn-light btn-sm back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
<?php if(current_url() !== site_url('')) :?>
    <?php if(current_url() !== site_url('cart')) :?>
    <a href="<?php echo site_url('cart'); ?>" class="float  btn-light"><span class="cart-items" id="#cart-items"><?php echo sanitize($this->cart_model->total_cart_items()); ?></span><i class="fab fa-opencart my-float"></i></a>
    <?php endif;?>
<?php endif;?>