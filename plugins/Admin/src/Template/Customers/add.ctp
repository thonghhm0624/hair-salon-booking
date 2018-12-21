<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $customer
 */
?>
<div class="customers form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= __('Add Customer') ?></h1>
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
                                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Customers'), ['action' => 'index']
,['escape' => false]) ?>
                                </li>
                                							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
            <?php echo  $this->Form->create($customer); ?>
                             <div class="form-group"><?php echo $this->Form->input('customer_password',['class'=>'form-control','placeholder' => 'Customer Password']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('customer_name',['class'=>'form-control','placeholder' => 'Customer Name']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('customer_status',['class'=>'form-control','placeholder' => 'Customer Status']);  ?></div>
                                 <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>    
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
