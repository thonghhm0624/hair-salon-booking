<div class="reservations index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo "Reservation"; ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	<div class="row">

		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
                                            <th><?= $this->Paginator->sort('reservation_id') ?></th>
                                            <th><?= $this->Paginator->sort('reservation_status') ?></th>
                                            <th><?= $this->Paginator->sort('reservation_date') ?></th>
                                            <th><?= $this->Paginator->sort('reservation_time') ?></th>
                                            <th><?= $this->Paginator->sort('reservation_marks') ?></th>
                                            <th><?= $this->Paginator->sort('customer_id') ?></th>
                                            <th><?= $this->Paginator->sort('stylist_id') ?></th>
                                            <th class="actions"></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                                        <td><?= $this->Number->format($reservation->reservation_id) ?></td>
                                        <td><?= $reservation_status[$reservation->reservation_status] ?></td>
                                        <td><?= h($reservation->reservation_date) ?></td>
                                        <td><?= h($reservation->reservation_time) ?></td>
                                        <td><?= $this->Number->format($reservation->reservation_marks) ?></td>
                                        <td><?= h($reservation->customer_id) ?></td>
                                        <td><?= $stylists[$reservation->stylist_id] ?></td>
                                        <td class="actions">
                                            <?php if ($reservation->reservation_status != 3) : ?>
                                                <?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $reservation->reservation_id],['escape' => false]) ?>
                                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>        
				</tbody>
			</table>
			<p>
				<small><?= $this->Paginator->counter() ?></small>
			</p>
            
            <?php 
            $params = $this->Paginator->params();   
            if($params['pageCount'] > 1):
            ?>    
			<ul class="pagination pagination-sm">
            <?php
                echo $this->Paginator->prev(__('Previous'));
                echo $this->Paginator->numbers();
                echo $this->Paginator->next(__('Next'));
            ?>           
			</ul>
            <?php endif; ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->