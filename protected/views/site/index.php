<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/sliderindex.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jssor.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jssor.slider.js"></script>


    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 1344px;
        height: 770px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 1344px;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1344px; height: 500px; overflow: hidden;">
            
        <?php

        	foreach ($Peliculas as $Pelicula) {    ?>
	    		<div>
	                <a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/Eventos/ConsultarPelicula?n=1'>
	                	<img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/escena/<?php echo $Pelicula->cImagen?>" />
	                </a>
	                
	                <img u="thumb" src="<?php echo Yii::app()->request->baseUrl; ?>/images/poster/<?php echo $Pelicula->cImagenPoster?>" />
	            </div>
        <?php	}

        ?>

           
         
         
          
        </div>
        
        <!-- Arrow Navigator Skin Begin -->

        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 198px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 198px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
        
        <!-- Thumbnail Navigator Skin Begin -->
        <div u="thumbnavigator" class="jssort01" style="position: absolute; width: 1344px; height: 250px; left:0px; bottom: 0px;">
            <!-- Thumbnail Item Skin Begin -->


            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 200px; height: 260px; top: 0; left: 0;">
                    <div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>
                    <div class=c>
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Thumbnail Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">Bootstrap Crousel</a>
    </div>
    <!-- Jssor Slider End -->

