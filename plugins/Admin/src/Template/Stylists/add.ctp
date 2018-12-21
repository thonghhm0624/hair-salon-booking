<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $stylist
 */
?>
<div class="stylists form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= __('Add Stylist') ?></h1>
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
                                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Stylists'), ['action' => 'index']
,['escape' => false]) ?>
                                </li>
                                							</ul>
						</div>
					</div>
				</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
            <?php echo  $this->Form->create($stylist); ?>
            <div class="form-group">
                <label for="stylist-branch">Stylist Branch</label>
                <?php echo $this->Form->select('stylist_branch_id',$branches,['class'=>'form-control','placeholder' => 'Stylist Branch Id']);  ?>
            </div>
          <div class="form-group"><?php echo $this->Form->input('stylist_name',['class'=>'form-control','placeholder' => 'Stylist Name']);  ?></div>
          <div class="form-group"><?php echo $this->Form->input('stylist_password',['class'=>'form-control','placeholder' => 'Stylist Password']);  ?></div>
          <div class="form-group"><?php echo $this->Form->input('stylist_image',['class'=>'form-control','placeholder' => 'Stylist Image']); ?></div>
             <div class="form-group">
                 <label for="stylist-branch">Stylist Status</label>
                 <?php echo $this->Form->select('stylist_status',$stylist_status,['class'=>'form-control','placeholder' => 'Stylist Status']);  ?>
             </div>
            <div class="form-group"><?php echo $this->Form->input('stylist_phone',['class'=>'form-control','placeholder' => 'Stylist Phone']);  ?></div>
            <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
