<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $article
 */
?>
<div class="articles form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= __('Edit Article') ?></h1>
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
                                                                <li><?=
                                    $this->Form->postLink(
                                    __('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'),
                                    ['action' => 'delete', $article->article_id],['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $article->article_id)]
                                    )
                                    ?>
                                </li>
                                                                <li>
                                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Articles'), ['action' => 'index']
,['escape' => false]) ?>
                                </li>
                                							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
            <?php echo  $this->Form->create($article); ?>
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <?php echo $this->Form->select('article_category_id',$categories,['class'=>'form-control','placeholder' => 'Article Category Id']);  ?>
                </div>
                <div class="form-group"><?php echo $this->Form->input('article_title',['class'=>'form-control','placeholder' => 'Article Title']);  ?></div>
                <div class="form-group"><?php echo $this->Form->input('article_description',['class'=>'form-control','placeholder' => 'Article Description']); ?></div>
                <div class="form-group"><?php echo $this->Form->input('article_keyword',['class'=>'form-control','placeholder' => 'Article Keyword']); ?></div>
            <div class="form-group">
                <label for="content">Articles content</label>
                <?php echo $this->Form->textarea('article_content',['id'=>'article_content','class'=>'form-control','placeholder' => 'Article Content']); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('article_image',['class'=>'form-control','placeholder' => 'Article Image']); ?>
            </div>
                <div class="form-group">
                    <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
                </div>
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: "#article_content",
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
                block_formats: 'Header1=h1;Header2=h2;Header3=h3;Header4=h4;Paragraph=p;',
                image_advtab: true,
                image_class_list: [
                    {title: 'None', value: ''},
                    {title: 'Fullwidth', value: 'img-fullwidth'},
                    {title: 'MiddleSmallSquare', value: 'img-middlesquare'},
                ]
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

</div>
