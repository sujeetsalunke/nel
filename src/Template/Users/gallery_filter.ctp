<?php

use Cake\Routing\Router; ?>
<ul class="galleryGrid">
    <?php if (!empty($galleries)) { ?>
        <?php foreach ($galleries as $key => $value_gallery) { ?>
            <li>
                <div class="imgSec">
                    <a href="javascript:void(0);" data-toggle="modal" onclick="gallerModels('<?php echo $value_gallery['image']; ?>', '<?php echo $project_list[$value_gallery['project_id']]; ?>', '<?php echo $value_gallery['location']; ?>', '<?php echo $category_list[$value_gallery['category_id']]; ?>');" data-target="#galleryPopup"><img src="<?php echo Router::url('/', true); ?>img/gallery/<?php echo $value_gallery['image']; ?>" alt="Gallery" /></a>
                </div>
            </li>
        <?php } ?>                   
    <?php } else { ?> 
        <li>
            <h1 class="pghead text-center"><span class="underline">No Record Found</span></h1>
        </li>
    <?php } ?>            
</ul>