<?php $menu_details = $this->menu_model->get_by_id($param2); ?>
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <?php $items = !empty($menu_details['items']) ? explode(",", $menu_details['items']) : []; ?>
            <?php if (count($items) > 0) : ?>
                <h6><i class="fas fa-hamburger"></i> <?php echo site_phrase('menu_contains', true); ?></h6>
                <?php foreach ($items as $item) : ?>
                    <label class="custom-checkbox">
                        <span class="ti-check-box text-danger p-0"></span>
                        <span class="custom-control-description">
                            <?php echo ucfirst(sanitize($item)); ?>
                        </span>
                    </label>
                <?php endforeach; ?>
                <hr>
            <?php endif; ?>
        </div>

        <div class="text-center">
            <h6><i class="fas fa-utensils"></i> <?php echo site_phrase('menu_details', true); ?></h6><?php echo sanitize($menu_details['details']); ?>
        </div>
        <!--<hr>
        <div class="text-center justify-content-center">
            <h6><i class="fab fa-nutritionix"></i> <?php echo site_phrase('nutrition_facts', true); ?></h6>
            <?php
            $nutrition_facts = json_decode($menu_details['nutrition_fact'], true); ?>
            <?php foreach ($nutrition_facts as $key => $nutrition_fact) : ?>
                <?php if (!empty($key)) : ?>
                    <span class="d-block"> ● <strong><?php echo sanitize($key); ?></strong> : <?php echo sanitize($nutrition_fact); ?></span>
                <?php else : ?>
                    <?php echo site_phrase('not_recorded'); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>-->
    </div>
</div>