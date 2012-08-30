<?php
$this->breadcrumbs=array(
	'My Ganesh Photos',
);?>

<section id="photo_container" style="position:relative;">
    <div id="photo_wrapper" class="photo_wrapper" style="position:relative;width:100%;height:100%;">
        <ul id="photo_gallery" class="photo_gallery">
    <?php
        foreach($elementsList as $photo){
            $this->renderPartial('//photo/_single',array('photo'=>$photo));
        }
    ?>
        </ul>
    </div>
</section>

