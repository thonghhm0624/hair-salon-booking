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
                <div class="form-group"><?php echo $this->Form->input('article_content',['class'=>'form-control','placeholder' => 'Article Content']); ?></div>
            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('product_image', 'upload',$article->article_image); ?>
                </div>
            </div>
                <div class="form-group">
                    <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
                </div>
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
