<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $reservation
 */
?>
<div class="reservations form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= __('Add Reservation') ?></h1>
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
                                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Reservations'), ['action' => 'index']
,['escape' => false]) ?>
                                </li>
                                							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
            <?php echo  $this->Form->create($reservation); ?>
                             <div class="form-group"><?php echo $this->Form->input('reservation_status',['class'=>'form-control','placeholder' => 'Reservation Status']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('reservation_date',['class'=>'form-control','placeholder' => 'Reservation Date']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('reservation_time',['class'=>'form-control','placeholder' => 'Reservation Time']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('reservation_marks',['class'=>'form-control','placeholder' => 'Reservation Marks']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('reservation_remark',['class'=>'form-control','placeholder' => 'Reservation Remark']); ?></div>
                                         <div class="form-group"><?php echo $this->Form->input('customer_id',['class'=>'form-control','placeholder' => 'Customer Id']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('stylist_id',['class'=>'form-control','placeholder' => 'Stylist Id']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('branch_id',['class'=>'form-control','placeholder' => 'Branch Id']);  ?></div>
                                          <div class="form-group"><?php echo $this->Form->input('service_id',['class'=>'form-control','placeholder' => 'Service Id']);  ?></div>
                                 <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>    
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
