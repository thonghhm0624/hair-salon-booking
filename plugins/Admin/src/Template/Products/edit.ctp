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
                <h1><?= __('Edit Product') ?></h1>
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
                                    ['action' => 'delete', $product->id],['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
                                )
                                ?>
                            </li>
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
            <div class="form-group"><?php echo $this->Form->input('name',['class'=>'form-control','placeholder' => 'Name']); ?></div>
            <div class="form-group">
                <label>Description</label>

                <?php echo $this->Form->textarea('description',['class'=>'form-control','placeholder' => 'Description']); ?>
            </div>
            <div class="form-group">

                <label>Product Types</label>
                <?php echo $this->Form->select('type',$product_types,['class'=>'form-control','placeholder' => 'Type']); ?>
            </div>
            <div class="form-group">
                <label>Color Group</label>
                <?php echo $this->Form->select('color_group',$color_group,['class'=>'form-control','placeholder' => 'Color Group']); ?>

            </div>

            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('image', 'upload',$product->image); ?>
                </div>
            </div>
            <div class="form-group"><?php echo $this->Form->input('is_new',['class'=>'form-control','placeholder' => 'Is New']); ?></div>
            <div class="form-group"><?php echo $this->Form->input('active',['class'=>'form-control','placeholder' => 'Active']); ?></div>

            <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>
            <?php echo $this->Form->end() ?>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
