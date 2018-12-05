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
				<h1><?= __('Edit Reservation') ?></h1>
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
                                    ['action' => 'delete', $reservation->reservation_id],['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservation_id)]
                                    )
                                    ?>
                                </li>
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
                             <div class="form-group">
                                 <label for="customer-s-name"/>Reservation status</label>
                                 <?php echo $this->Form->select('reservation_status',$reservation_status,['class'=>'form-control','placeholder' => 'Reservation Status']);  ?>
                             </div>
                          <div class="form-group"><?php echo $this->Form->input('reservation_date',['class'=>'form-control','placeholder' => 'Reservation Date']);  ?></div>
                          <div class="form-group">
                              <label for="customer-s-name"/>Reservation time</label>
                              <?php echo $this->Form->select('reservation_time',$service_time,['class'=>'form-control','placeholder' => 'Reservation Time']);  ?>
                          </div>
                          <div class="form-group"><?php echo $this->Form->input('reservation_marks',['class'=>'form-control','placeholder' => 'Reservation Marks']);  ?></div>
                          <div class="form-group"><?php echo $this->Form->input('reservation_remark',['class'=>'form-control','placeholder' => 'Reservation Remark']); ?></div>
                         <div class="form-group">
                             <label for="customer-s-name"/>Customer</label>
                             <?php echo $this->Form->select('customer_id',$customers,['class'=>'form-control','placeholder' => 'Customer Id']);  ?>
                         </div>
                          <div class="form-group"><?php echo $this->Form->input('stylist_id',['class'=>'form-control','placeholder' => 'Stylist Id']);  ?></div>
                          <div class="form-group">
                              <label for="customer-s-name"/>Branch</label>
                              <?php echo $this->Form->select('branch_id',$branches,['class'=>'form-control','placeholder' => 'Branch Id']);  ?>
                          </div>
                          <div class="form-group">
                              <label for="customer-s-name"/>Service</label>
                              <?php echo $this->Form->select('service_id',$services,['class'=>'form-control','placeholder' => 'Service Id']);  ?>
                          </div>
                                 <div class="form-group">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                <?php echo $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
            </div>    
            <?php echo $this->Form->end() ?>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
