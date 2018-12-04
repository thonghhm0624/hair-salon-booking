<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Reservation</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Reservation'), ['action' => 'edit', $reservation->reservation_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Reservation'), ['action' => 'delete', $reservation->reservation_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservation_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Reservations'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Reservation'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="reservations col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Reservation Id') ?></th>
                            <td><?= $this->Number->format($reservation->reservation_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Reservation Status') ?></th>
                            <td><?= $this->Number->format($reservation->reservation_status) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Reservation Time') ?></th>
                            <td><?= $this->Number->format($reservation->reservation_time) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Reservation Marks') ?></th>
                            <td><?= $this->Number->format($reservation->reservation_marks) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Stylist Id') ?></th>
                            <td><?= $this->Number->format($reservation->stylist_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Branch Id') ?></th>
                            <td><?= $this->Number->format($reservation->branch_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Service Id') ?></th>
                            <td><?= $this->Number->format($reservation->service_id) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Customer Id') ?></th>
                            <td><?= h($reservation->customer_id) ?></td>
                        </tr>
                                                                                                            <tr>
                            <th><?= __('Reservation Date') ?></th>
                            <td><?= h($reservation->reservation_date) ?></td>
                       </tr>
                                                                                                                            <tr>
                            <th><?= __('Reservation Remark') ?></th>
                            <td><?= $this->Text->autoParagraph(h($reservation->reservation_remark)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    