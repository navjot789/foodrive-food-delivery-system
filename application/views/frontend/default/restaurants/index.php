<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= DETAIL =============================-->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 responsive-wrap">
        <div class="row detail-filter-wrap">
          <div class="col-md-4 featured-responsive">
            <div class="detail-filter-text">
              <p>
                <span class="d-block"><?php echo sanitize($page_header); ?> <?php echo ($type == "filter" && isset($_GET['query']) && !empty(sanitize($_GET['query']))) ? strtolower(site_phrase("for_query")) . " '" . sanitize($_GET['query']) . "'" : ""; ?></span>
                <small><?php echo sanitize($total_rows); ?> <span><?php echo site_phrase('restaurants_found'); ?></span></small>
              </p>
            </div>
          </div>
          <div class="col-md-8 featured-responsive">
            <div class="detail-filter">
              <p><?php echo site_phrase('filter_by'); ?></p>
              <form action="<?php echo site_url('site/restaurants/filter'); ?>" class="filter-dropdown" method="GET">
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="cuisine">
                  <option value=""><?php echo ucwords(site_phrase('all_cuisine')); ?></option>
                  <?php foreach ($cuisines as $cuisine_row) : ?>
                    <option value="<?php echo sanitize($cuisine_row['id']); ?>" <?php if ($cuisine_row['id'] == $cuisine) echo "selected"; ?>><?php echo sanitize($cuisine_row['name']); ?></option>
                  <?php endforeach; ?>
                </select>

                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect1" name="category">
                  <option value=""><?php echo ucwords(site_phrase('all_category')); ?></option>
                  <?php foreach ($categories as $category_row) : ?>
                    <option value="<?php echo sanitize($category_row['id']); ?>" <?php if ($category_row['id'] == $category) echo "selected"; ?>><?php echo sanitize($category_row['name']); ?></option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-dark"><?php echo site_phrase('filter'); ?></button>
              </form>
            </div>
          </div>
        </div>
        <!-- RESTAURANT LIST STARTS -->
        <div class="row justify-content-center light-bg detail-options-wrap">
          <?php foreach ($restaurants as $key => $restaurant) : ?>
            <div class="col-sm-6 col-lg-4 col-xl-4 featured-responsive">
              <div class="featured-place-wrap border-upper-radius border-downer-radius">   
                  <img src="<?php echo base_url('uploads/restaurant/thumbnail/' . sanitize($restaurant['thumbnail'])); ?>" class="img-fluid border-upper-radius" alt="#">
                  <?php if ($restaurant['rating'] >= 4) : ?>
                    <span class="featured-rating-green"><?php echo sanitize($restaurant['rating']); ?></span>
                  <?php elseif ($restaurant['rating'] > 2 && $restaurant['rating'] < 4) : ?>
                    <span class="featured-rating-orange"><?php echo sanitize($restaurant['rating']); ?></span>
                  <?php else : ?>
                    <span class="featured-rating"><?php echo sanitize($restaurant['rating']); ?></span>
                  <?php endif; ?>
                  <div class="featured-title-box">
                    <h6><?php echo sanitize($restaurant['name']); ?></h6>
                    <p>
                      <?php
                      $reviews = $this->db->get_where('reviews', ['restaurant_id' => $restaurant['id']]);
                      echo sanitize($reviews->num_rows()) . ' ' . site_phrase('reviews');
                      ?>
                    </p>
                    <span> • </span>
                    <p>
                      <span>
                        <?php for ($i = 1; $i <= $restaurant['rating']; $i++) : ?>
                          <i class="fas fa-star"></i>
                        <?php endfor; ?>
                        <?php
                        $rest_rating = 5 - sanitize($restaurant['rating']);
                        if (is_float($rest_rating)) : ?>
                          <?php $splitted_ratings = explode(".", $rest_rating); ?>
                          <?php if (isset($splitted_ratings[1]) && $splitted_ratings[1]) : ?>
                            <i class="fas fa-star-half-alt"></i>
                          <?php endif; ?>
                          <?php for ($j = 1; $j <= $splitted_ratings[0]; $j++) : ?>
                            <i class="far fa-star"></i>
                          <?php endfor; ?>
                        <?php else : ?>
                          <?php for ($k = 1; $k <= (5 - $restaurant['rating']); $k++) : ?>
                            <i class="far fa-star"></i>
                          <?php endfor; ?>
                        <?php endif; ?>
                      </span>
                    </p>
                    <ul>
                      <li><span class="icon-location-pin"></span>
                        <p data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($restaurant['address']); ?>"><?php echo ellipsis($restaurant['address']); ?></p>
                      </li>
                      <!--
                      <li><span class="icon-screen-smartphone"></span>
                        <p><?php echo sanitize($restaurant['phone']); ?></p>
                      </li>
                      <li><span class="icon-link"></span>
                        <p><?php echo ellipsis(sanitize($restaurant['website'])); ?></p>
                      </li>
                      -->
                    </ul>
                    <div class="bottom-icons">
                      <?php if (is_open($restaurant['id'])) : ?>
                        <div class="open-now"><?php echo strtoupper(site_phrase('open_now')); ?></div>
                      <?php else : ?>
                        <div class="closed-now"><?php echo strtoupper(site_phrase('close_now')); ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php if (count($restaurants) == 0) : ?>
          <div class="row justify-content-center light-bg detail-options-wrap">
            <h3><?php echo site_phrase('no_data_found'); ?></h3>
          </div>
        <?php endif; ?>
        <div class="row justify-content-center light-bg detail-options-wrap">
          <?php echo $this->pagination->create_links(); ?>
        </div>
        <!-- RESTAURANT LIST ENDS -->
      </div>
    </div>
  </div>
</section>
<!--//END DETAIL -->
