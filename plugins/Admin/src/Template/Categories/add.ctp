<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $category
 */
?>
<div class="categories form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= __('Add Category') ?></h1>
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
                                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), ['action' => 'index']
,['escape' => false]) ?>
                                </li>
                                							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
            <?php echo  $this->Form->create($category); ?>
                             <div class="form-group"><?php echo $this->Form->input('category_name',['class'=>'form-control','placeholder' => 'Category Name']);  ?></div>
                                 <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>    
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
