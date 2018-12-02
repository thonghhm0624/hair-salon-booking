<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $productDescription
 */
?>
<div class="productDescriptions form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?= __('Add Product Description') ?></h1>
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
                                <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Product Descriptions'), ['action' => 'index']
                                    ,['escape' => false]) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo  $this->Form->create($productDescription); ?>
            <div class="form-group"><?php echo $this->Form->input('name',['class'=>'form-control','placeholder' => 'Name']); ?></div>
            <div class="form-group"><?php echo $this->Form->input('textblock_1',['class'=>'form-control','placeholder' => 'Textblock 1']); ?></div>
            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image 1 (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('imageblock_1', 'upload'); ?>
                </div>
            </div>
            <div class="form-group"><?php echo $this->Form->input('textblock_2',['class'=>'form-control','placeholder' => 'Textblock 2']); ?></div>
            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image 2 (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('imageblock_2', 'upload'); ?>
                </div>
            </div>
            <div class="form-group"><?php echo $this->Form->input('textblock_3',['class'=>'form-control','placeholder' => 'Textblock 3']); ?></div>
            <div class="form-group">
                <div class="form-group" id="group-image">
                    <label for="image">Image 3 (600x600)</label>
                    <?php echo $this->JqueryUpload->upload('imageblock_3', 'upload'); ?>
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
