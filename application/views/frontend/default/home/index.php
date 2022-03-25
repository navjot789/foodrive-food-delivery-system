<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/transparent.php'; ?>
 <?php $customer_details = $this->customer_model->get_by_id($this->session->userdata('user_id')); ?>
<!-- SLIDER -->

<section class="slider d-flex align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="slider-title_box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider-content_wrap">
                                <h1><?php echo sanitize(get_website_settings('title')); ?></h1>
                                <h5><?php echo sanitize(get_website_settings('sub_title')); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <form  class="form-wrap mt-4" method="POST">
                                <div id="resposnse"></div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <input type="text" placeholder="Enter your current location" class="btn-group1" name="search" id="search-location" autocomplete="off" 
                                      value="<?php if($this->session->userdata('customer_login') == 1) echo sanitize($customer_details['address_1']) ? sanitize($customer_details['address_1']) : sanitize($this->session->userdata('fullAddress')); ?>">
                                    <button type="submit" class="btn-form" id="find"><img style="height:30px;width:30px;" src="https://ik.imagekit.io/l4f8iqzrdp1c/search__1__rOWFh3Zeo.png?updatedAt=1640861814864" class="img-fluid"> Search  <i class="fa fa-circle-o-notch"></i></button>
                                </div>
                                <input type="hidden" name="latitude_1" id="latitude_1" value="" readonly>
                                <input type="hidden" id="longitude_1" name="longitude_1" value="" readonly>
                            </form>
                           <!-- <div class="slider-link">
                                <a href="<?php echo site_url('site/restaurants/popular'); ?>"><?php echo site_phrase('browse_popular_restaurant'); ?></a><span><?php echo site_phrase('or'); ?></span> <a href="<?php echo site_url('site/restaurants/recent'); ?>"><?php echo site_phrase('recently_added'); ?></a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--// SLIDER -->
<!--//END HEADER -->

<!--============================= FEATURED CUISINES =============================-->
<!--
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3><?php echo site_phrase('featured_cuisines', true); ?></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($featured_cuisines as $key => $featured_cuisine) : ?>
                <div class="col-md-3 featured-cuisine-area">
                    <a href="<?php echo site_url('site/restaurants/filter?cuisine=' . sanitize($featured_cuisine['id'])); ?>">
                        <div class="find-place-img_wrap">
                            <div class="grid">
                                <figure class="effect-ruby rounded">
                                    <img src="<?php echo base_url('uploads/cuisine/' . sanitize($featured_cuisine['thumbnail'])); ?>" class="img-fluid" alt="<?php echo site_phrase('featured_cuisine'); ?>" />
                                    <figcaption>
                                        <h5><?php echo sanitize($featured_cuisine['name']); ?></h5>
                                        <p><?php echo count($this->restaurant_model->get_restaurants_by_cuisine(sanitize($featured_cuisine['id']))) . ' ' . site_phrase('restaurants'); ?></p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
-->
<!--//END FEATURED CUISINES -->
<!--============================= POPULAR RESTAURANTS =============================-->
<!--<section class="main-block light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3><?php echo site_phrase('popular_restaurants', true); ?></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            foreach ($popular_restaurants as $key => $popular_restaurant) :
            ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap border-upper-radius border-downer-radius" >
                        <a href="#">
                            <img src="<?php echo base_url('uploads/restaurant/thumbnail/' . sanitize($popular_restaurant['thumbnail'])); ?>" class="img-fluid border-upper-radius" alt="<?php echo sanitize($popular_restaurant['name']); ?>">
                            <?php if ($popular_restaurant['rating'] >= 4) : ?>
                                <span class="featured-rating-green"><?php echo sanitize($popular_restaurant['rating']); ?></span>
                            <?php elseif ($popular_restaurant['rating'] > 2 && $popular_restaurant['rating'] < 4) : ?>
                                <span class="featured-rating-orange"><?php echo sanitize($popular_restaurant['rating']); ?></span>
                            <?php else : ?>
                                <span class="featured-rating"><?php echo sanitize($popular_restaurant['rating']); ?></span>
                            <?php endif; ?>
                            <div class="featured-title-box">
                                <h6><?php echo sanitize($popular_restaurant['name']); ?></h6>
                                <p>
                                    <?php
                                    $reviews = $this->db->get_where('reviews', ['restaurant_id' => sanitize($popular_restaurant['id'])]);
                                    echo sanitize($reviews->num_rows()) . ' ' . site_phrase('reviews');
                                    ?>
                                </p>
                                <span> • </span>
                                <p>
                                    <span>
                                        <?php for ($i = 1; $i <= sanitize($popular_restaurant['rating']); $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                        <?php
                                        $rest_rating = 5 - sanitize($popular_restaurant['rating']);
                                        if (is_float($rest_rating)) : ?>
                                            <?php $splitted_ratings = explode(".", $rest_rating); ?>
                                            <?php if (isset($splitted_ratings[1]) && $splitted_ratings[1]) : ?>
                                                <i class="fas fa-star-half-alt"></i>
                                            <?php endif; ?>
                                            <?php for ($j = 1; $j <= $splitted_ratings[0]; $j++) : ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        <?php else : ?>
                                            <?php for ($k = 1; $k <= (5 - sanitize($popular_restaurant['rating'])); $k++) : ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </span>
                                </p>
                                <ul>
                                   <li><span class="fas fa-map-marked-alt"></span>
                                        <p data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($popular_restaurant['address']); ?>"><?php echo ellipsis($popular_restaurant['address']); ?></p>
                                      </li>-->
                                     
                                      <!-- <li><span class="fas fa-mobile"></span>
                                        <p><?php echo sanitize($popular_restaurant['phone']); ?></p>
                                      </li>

                                      <li><span class="fas fa-biking" ></span>
                                        <p> <?php echo delivery_charge($popular_restaurant['id']) > 0 ? currency(sanitize(delivery_charge($popular_restaurant['id']))).' '.'Approx' : site_phrase('free'); ?></p>
                                      </li>

                                      <?php if(!empty(sanitize($popular_restaurant['website']))) :?>
                                      <li><span class="fas fa-link"></span>
                                        <p><?php echo ellipsis(sanitize($popular_restaurant['website'])); ?></p>
                                      </li>
                                    <?php endif; ?>-->
                              <!-- </ul>
                                <div class="bottom-icons">
                                    <?php if (is_open($popular_restaurant['id'])) : ?>
                                        <div class="open-now"><?php echo strtoupper(site_phrase('open_now')); ?></div>
                                    <?php else : ?>
                                        <div class="closed-now"><?php echo strtoupper(site_phrase('close_now')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                       </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="featured-btn-wrap">
                    <a href="<?php echo site_url('site/restaurants'); ?>" class="btn btn-danger"><?php echo strtoupper(site_phrase('view_all')); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!--//END POPULAR RESTAURANTS -->
<!--============================= CATEGORIES =============================-->
<!--
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="styled-heading">
                    <h3><?php echo site_phrase('browse_categories', true); ?></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($categories as $key => $category) : ?>
                <div class="col-md-3 category-responsive">
                    <a href="<?php echo site_url('site/restaurants/filter?category=' . sanitize($category['id'])); ?>" class="category-wrap">
                        <div class="category-block">
                            <img src="<?php echo base_url('uploads/category/'.$category['thumbnail']); ?>" class="category-img" alt="">
                            <h6><?php echo sanitize($category['name']); ?></h6>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>-->
<!--//END CATEGORIES -->

<!--============================= Phone order banner =============================-->
       <img src="https://ik.imagekit.io/l4f8iqzrdp1c/Foodrive_graphics/Banner/Phone_orders_S_ZZeyntJ.jpg?updatedAt=1640861453876" class="img-fluid">
<!--//Phone order banner -->



<!--============================= ADD LISTING =============================-->
<section class="main-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="add-listing-wrap">
                    <h2><?php echo site_phrase('become_a_restaurant_owner', true); ?></h2>
                    <p><?php echo site_phrase('do_you_want_to_add_your_own_restaurants_and_food_menus'); ?>?</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="featured-btn-wrap">
                    <a href="<?php echo site_url('auth/registration/owner'); ?>" class="btn btn-danger"><span class="ti-plus"></span> <?php echo strtoupper(site_phrase('Join_us')); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//END ADD LISTING -->



<!--============================= cities deliverd =============================-->
<img src="https://ik.imagekit.io/l4f8iqzrdp1c/Foodrive_graphics/Banner/deliver_cities_copy_FK-GmQ1qx.jpg?updatedAt=1640861392840" class="img-fluid">
<!--//cities deliverd -->


