<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<div class="products form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?= __('Add Product') ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Products'), ['action' => 'index']
                                    ,['escape' => false]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo  $this->Form->create($product); ?>
            <div class="form-group"><?php echo $this->Form->input('product_title',['class'=>'form-control','placeholder' => 'Product Title']);  ?></div>
            <div class="form-group"><?php echo $this->Form->textarea('product_description',['class'=>'form-control','placeholder' => 'Product Description']); ?></div>
            <div class="form-group"><?php echo $this->Form->input('product_keyword',['class'=>'form-control','placeholder' => 'Product Keyword']);  ?></div>
            <div class="form-group"><?php echo $this->Form->textarea('product_content',['id'=>'product_content','class'=>'form-control','placeholder' => 'Product Content']); ?></div>
            <!--            ADD image-->
            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('product_image', 'upload'); ?>
                </div>
            </div>
            <!--            ADD image-->

            <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>
            <?php echo $this->Form->end() ?>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
<script>
    $(document).ready(function() {
        tinymce.init({
            selector: "#product_content",
            theme: "modern",
            paste_data_images: true,
            paste_as_text: true,
            height : "500",
            menubar: false,
            plugins: [
                "advlist lists link image media ",
                "paste textcolor colorpicker"
            ],
            toolbar1: "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ",
            block_formats: 'Header=h4;Paragraph=p;',
            image_advtab: true,
//            file_picker_callback: function(callback, value, meta) {
//                if (meta.filetype == 'image') {
//
//                    $('#upload').trigger('click');
//                    $('#upload').on('change', function() {
//                        var file = this.files[0];
//                        var reader = new FileReader();
//                        reader.onload = function(e) {
//                            callback(e.target.result, {
//                                alt: ''
//                            });
//                        };
//                        reader.readAsDataURL(file);
//                    });
//                }
//            }
        });
    });
</script>
