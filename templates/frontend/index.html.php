<div class="clearfix"></div>
<div class="slider-settings">
    
    <div class="slider-pro" id="my-slider">
        <div class="sp-slides" >
            <?php 
                foreach ($sliders as $key => $v):?>
                <!-- Slide 1 -->
                <div class="sp-slide">
                    <div class="sp-slide-dark"></div>
                    <img class="sp-image" 
                        src="assets/slider_pro/src/css/images/blank.gif"
                        data-src="<?= $sliderimagepath.$v["slider_bg"]; ?>" />
                    <?= (!empty($v["slider_title"]))
                        ? '<div class="slider_mask"></div>'
                        : ''; 
                    ?>
                    
                    
                    <?php if(!empty($v["main_caption"])): ?>
                        <div class="sp-layer slider-heading"
                            data-show-transition="up" 
                            data-hide-transition="up" 
                            data-show-delay="300" 
                            data-hide-delay="100"
                            data-horizontal="70" 
                            data-show-duration="600"
                            data-vertical="10" >
                            <?= $v["main_caption"]; ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($v["description"])): ?>
                    <div class="sp-layer slider-subheading"
                        data-show-transition="up" 
                        data-hide-transition="up" 
                        data-show-delay="700" 
                        data-hide-delay="200"
                        data-show-duration="600"
                        data-vertical="340" 
                        data-horizontal="70" >
                        <?= $v["description"]; ?>
                        <?= (!empty($v["url"]))
                            ? '<br><a href="'.$v["url"].'" class="slider-action-button">'.$v["button_text"].'</a>'
                            : ''; 
                        ?>
                    </div>
                    <?php endif; ?>
                    

                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>


<!-- POP UP -->
<div id="homepopup"></div>
