<?php
include('header.php');
$GLOBALS['option_value_count'] = 0;
?>
<style type="text/css">
    .sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
    .sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; height: 18px; }
    .sortable li>span { position: absolute; margin-left: -1.3em; margin-top:.4em; }
</style>

<script type="text/javascript">
    //<![CDATA[

    $(document).ready(function() {
        $(".sortable").sortable();
        $(".sortable > span").disableSelection();
        //if the image already exists (phpcheck) enable the selector

<?php if ($id) : ?>
            //options related
            var ct	= $('#option_list').children().size();
            // set initial count
                            
<?php endif; ?>

        photos_sortable();
    });

    function add_product_image(data)
    {
        p	= data.split('.');
	
        var photo = '<?php add_image("'+p[0]+'", "'+p[0]+'.'+p[1]+'", '', '', '', base_url('uploads/images/thumbnails')); ?>';
        $('#gc_photos').append(photo);
        $('#gc_photos').sortable('destroy');
        photos_sortable();
    }

    function remove_image(img)
    {
        if(confirm('<?php echo lang('confirm_remove_image'); ?>'))
        {
            var id	= img.attr('rel')
            $('#gc_photo_'+id).remove();
        }
    }

    function photos_sortable()
    {
        $('#gc_photos').sortable({	
            handle : '.gc_thumbnail',
            items: '.gc_photo',
            axis: 'y',
            scroll: true
        });
    }
    //]]>
</script>


<?php echo form_open($this->config->item('admin_folder') . '/products/form/' . $id); ?>
<div class="row">
    <div class="span8">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#product_info" data-toggle="tab"><?php echo lang('details'); ?></a></li>
                <?php
                //if there aren't any files uploaded don't offer the client the tab
                if (count($file_list) > 0):
                    ?>
                    <li><a href="#product_downloads" data-toggle="tab"><?php echo lang('digital_content'); ?></a></li>
                <?php endif; ?>
                <li><a href="#product_categories" data-toggle="tab"><?php echo lang('categories'); ?></a></li>
                <li><a href="#product_related" data-toggle="tab"><?php echo lang('related_products'); ?></a></li>
                <li><a href="#product_photos" data-toggle="tab"><?php echo lang('images'); ?></a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="product_info">
                <div class="row">
                    <div class="span8">
                        <?php
                        $data = array('placeholder' => lang('name'), 'name' => 'name', 'value' => set_value('name', $name), 'class' => 'span8');
                        echo form_input($data);
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="span8">

                        <?php
                        $data = array('name' => 'description', 'class' => 'redactor', 'value' => set_value('description', $description));
                        echo form_textarea($data);
                        ?>

                    </div>
                </div>

                <div class="row">
                    <div class="span8">
                        <label><?php echo lang('excerpt'); ?></label>
                        <?php
                        $data = array('name' => 'excerpt', 'value' => set_value('excerpt', $excerpt), 'class' => 'span8', 'rows' => 5);
                        echo form_textarea($data);
                        ?>
                    </div>
                </div>


                <div class="row">
                    <div class="span8">
                        <fieldset>
                            <legend><?php echo lang('header_information'); ?></legend>
                            <div class="row" style="padding-top:10px;">
                                <div class="span8">

                                    <label for="slug"><?php echo lang('slug'); ?> </label>
                                    <?php
                                    $data = array('name' => 'slug', 'value' => set_value('slug', $slug), 'class' => 'span8');
                                    echo form_input($data);
                                    ?>

                                    <label for="seo_title"><?php echo lang('seo_title'); ?> </label>
                                    <?php
                                    $data = array('name' => 'seo_title', 'value' => set_value('seo_title', $seo_title), 'class' => 'span8');
                                    echo form_input($data);
                                    ?>

                                    <label for="meta"><?php echo lang('meta'); ?> <i><?php echo lang('meta_example'); ?></i></label> 
                                    <?php
                                    $data = array('name' => 'meta', 'value' => set_value('meta', html_entity_decode($meta)), 'class' => 'span8');
                                    echo form_textarea($data);
                                    ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="product_downloads">
                <div class="alert alert-info">
                    <?php echo lang('digital_products_desc'); ?>
                </div>
                <fieldset>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('filename'); ?></th>
                                <th><?php echo lang('title'); ?></th>
                                <th style="width:70px;"><?php echo lang('size'); ?></th>
                                <th style="width:16px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo (count($file_list) < 1) ? '<tr><td style="text-align:center;" colspan="6">' . lang('no_files') . '</td></tr>' : '' ?>
                            <?php foreach ($file_list as $file): ?>
                                <tr>
                                    <td><?php echo $file->filename ?></td>
                                    <td><?php echo $file->title ?></td>
                                    <td><?php echo $file->size ?></td>
                                    <td><?php echo form_checkbox('downloads[]', $file->id, in_array($file->id, $product_files)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>

            <div class="tab-pane" id="product_categories">
                <div class="row">
                    <div class="span8">
                        <label><strong><?php echo lang('select_a_product'); ?></strong></label>
                    </div>
                </div>
                <div class="row">
                    <div class="span2" style="text-align:center">
                        <div class="row">
                            <div class="span2">
                                <input class="span2" type="text" id="category_search" />
                                <script type="text/javascript">
                                    $('#category_search').keyup(function(){
                                        $('#category_list').html('');
                                        run_category_query();
                                    });

                                    function run_category_query()
                                    {
                                        $.post("<?php echo site_url($this->config->item('admin_folder') . '/categories/category_autocomplete/'); ?>", { name: $('#category_search').val(), limit:10},
                                        function(data) {

                                            $('#category_list').html('');

                                            $.each(data, function(index, value){

                                                if($('#category_'+index).length == 0)
                                                {
                                                    $('#category_list').append('<option id="category_item_'+index+'" value="'+index+'">'+value+'</option>');
                                                }
                                            });

                                        }, 'json');
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2">
                                <select class="span2" id="category_list" size="5" style="margin:0px;"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2" style="margin-top:8px;">
                                <a href="#" onclick="add_category(); return false;" class="btn" title="Add Category"><?php echo lang('add_category'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <table class="table table-striped" style="margin-top:10px;">
                            <tbody id="categories_container">
                                <?php
                                foreach ($product_categories as $cat) {
                                    echo category($cat->id, $cat->name);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="product_related">
                <div class="row">
                    <div class="span8">
                        <label><strong><?php echo lang('select_a_product'); ?></strong></label>
                    </div>
                </div>
                <div class="row">
                    <div class="span2" style="text-align:center">
                        <div class="row">
                            <div class="span2">
                                <input class="span2" type="text" id="product_search" />
                                <script type="text/javascript">
                                    $('#product_search').keyup(function(){
                                        $('#product_list').html('');
                                        run_product_query();
                                    });
						
                                    function run_product_query()
                                    {
                                        $.post("<?php echo site_url($this->config->item('admin_folder') . '/products/product_autocomplete/'); ?>", { name: $('#product_search').val(), limit:10},
                                        function(data) {
									
                                            $('#product_list').html('');
									
                                            $.each(data, function(index, value){
									
                                                if($('#related_product_'+index).length == 0)
                                                {
                                                    $('#product_list').append('<option id="product_item_'+index+'" value="'+index+'">'+value+'</option>');
                                                }
                                            });
									
                                        }, 'json');
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2">
                                <select class="span2" id="product_list" size="5" style="margin:0px;"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2" style="margin-top:8px;">
                                <a href="#" onclick="add_related_product();return false;" class="btn" title="Add Related Product"><?php echo lang('add_related_product'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <table class="table table-striped" style="margin-top:10px;">
                            <tbody id="product_items_container">
                                <?php
                                foreach ($related_products as $rel) {
                                    echo related_items($rel->id, $rel->name);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="product_photos">
                <div class="row">
                    <iframe id="iframe_uploader" src="<?php echo site_url($this->config->item('admin_folder') . '/products/product_image_form'); ?>" class="span8" style="height:75px; border:0px;"></iframe>
                </div>
                <div class="row">
                    <div class="span8">

                        <div id="gc_photos">

                            <?php
                            foreach ($images as $photo_id => $photo_obj) {
                                if (!empty($photo_obj)) {
                                    $photo = (array) $photo_obj;
                                    add_image($photo_id, $photo['filename'], $photo['alt'], $photo['caption'], isset($photo['primary']));
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="span4">
        <?php
        $options = array('0' => lang('disabled')
            , '1' => lang('enabled')
        );
        echo form_dropdown('enabled', $options, set_value('enabled', $enabled), 'class="span4"');
        ?>

        <?php
//        $options = array('1' => lang('taxable')
//            , '0' => lang('not_taxable')
//        );
//        echo form_dropdown('taxable', $options, set_value('taxable', $taxable), 'class="span4"');
        ?>

        <label for="code"><?php echo lang('code'); ?></label>
        <?php
        $data = array('name' => 'sku', 'value' => set_value('sku', $sku), 'class' => 'span4');
        echo form_input($data);
        ?>

        <label for="price"><?php echo lang('price'); ?></label>
        <?php
        $data = array('name' => 'price', 'value' => set_value('price', $price), 'class' => 'span4');
        echo form_input($data);
        ?>

        <label for="weekendprice"><?php echo lang('weekendprice'); ?></label>
        <?php
        $data = array('name' => 'saleprice', 'value' => set_value('saleprice', $saleprice), 'class' => 'span4');
        echo form_input($data);
        ?>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary"><?php echo lang('form_save'); ?></button>
</div>
</form>

<?php

function add_image($photo_id, $filename, $alt, $caption, $primary = false) {

    ob_start();
    ?>
    <div class="row gc_photo" id="gc_photo_<?php echo $photo_id; ?>" style="background-color:#fff; border-bottom:1px solid #ddd; padding-bottom:20px; margin-bottom:20px;">
        <div class="span2">
            <input type="hidden" name="images[<?php echo $photo_id; ?>][filename]" value="<?php echo $filename; ?>"/>
            <img class="gc_thumbnail" src="<?php echo base_url('uploads/images/thumbnails/' . $filename); ?>" style="padding:5px; border:1px solid #ddd"/>
        </div>
        <div class="span6">
            <div class="row">
                <div class="span2">
                    <input name="images[<?php echo $photo_id; ?>][alt]" value="<?php echo $alt; ?>" class="span2" placeholder="<?php echo lang('alt_tag'); ?>"/>
                </div>
                <div class="span2">
                    <input type="radio" name="primary_image" value="<?php echo $photo_id; ?>" <?php if ($primary) echo 'checked="checked"'; ?>/> <?php echo lang('primary'); ?>
                </div>
                <div class="span2">
                    <a onclick="return remove_image($(this));" rel="<?php echo $photo_id; ?>" class="btn btn-danger" style="float:right; font-size:9px;"><i class="icon-trash icon-white"></i> <?php echo lang('remove'); ?></a>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <label><?php echo lang('caption'); ?></label>
                    <textarea name="images[<?php echo $photo_id; ?>][caption]" class="span6" rows="3"><?php echo $caption; ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <?php
    $stuff = ob_get_contents();

    ob_end_clean();

    echo replace_newline($stuff);
}

//this makes it easy to use the same code for initial generation of the form as well as javascript additions
function replace_newline($string) {
    return trim((string) str_replace(array("\r", "\r\n", "\n", "\t"), ' ', $string));
}
?>


<script type="text/javascript">
    //<![CDATA[
    
    var option_value_count	= <?php echo $GLOBALS['option_value_count']; ?>

    function add_related_product()
    {
        //if the related product is not already a related product, add it
        if($('#related_product_'+$('#product_list').val()).length == 0 && $('#product_list').val() != null)
        {
<?php $new_item = str_replace(array("\n", "\t", "\r"), '', related_items("'+$('#product_list').val()+'", "'+$('#product_item_'+$('#product_list').val()).html()+'")); ?>
            var related_product = '<?php echo $new_item; ?>';
            $('#product_items_container').append(related_product);
            run_product_query();
        }
        else
        {
            if($('#product_list').val() == null)
            {
                alert('<?php echo lang('alert_select_product'); ?>');
            }
            else
            {
                alert('<?php echo lang('alert_product_related'); ?>');
            }
        }
    }

    function add_category()
    {
        //if the related product is not already a related product, add it
        if($('#categories_'+$('#category_list').val()).length == 0 && $('#category_list').val() != null)
        {
<?php $new_item = str_replace(array("\n", "\t", "\r"), '', category("'+$('#category_list').val()+'", "'+$('#category_item_'+$('#category_list').val()).html()+'")); ?>
            var category = '<?php echo $new_item; ?>';
            $('#categories_container').append(category);
            run_category_query();
        }
    }

    function remove_related_product(id)
    {
        if(confirm('<?php echo lang('confirm_remove_related'); ?>'))
        {
            $('#related_product_'+id).remove();
            run_product_query();
        }
    }

    function remove_category(id)
    {
        if(confirm('<?php echo lang('confirm_remove_category'); ?>'))
        {
            $('#category_'+id).remove();
            run_product_query();
        }
    }

    function photos_sortable()
    {
        $('#gc_photos').sortable({	
            handle : '.gc_thumbnail',
            items: '.gc_photo',
            axis: 'y',
            scroll: true
        });
    }
    //]]>
</script>
<?php

function related_items($id, $name) {
    return '
			<tr id="related_product_' . $id . '">
				<td>
					<input type="hidden" name="related_products[]" value="' . $id . '"/>
					' . $name . '</td>
				<td>
					<a class="btn btn-danger pull-right btn-mini" href="#" onclick="remove_related_product(' . $id . '); return false;"><i class="icon-trash icon-white"></i> ' . lang('remove') . '</a>
				</td>
			</tr>
		';
}

function category($id, $name) {
    return '
			<tr id="category_' . $id . '">
				<td>
					<input type="hidden" name="categories[]" value="' . $id . '"/>
					' . $name . '</td>
				<td>
					<a class="btn btn-danger pull-right btn-mini" href="#" onclick="remove_category(' . $id . '); return false;"><i class="icon-trash icon-white"></i> ' . lang('remove') . '</a>
				</td>
			</tr>
		';
}

include('footer.php');
?>