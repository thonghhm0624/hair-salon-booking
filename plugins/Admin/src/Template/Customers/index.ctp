<div class="customers index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo "Customer"; ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	<div class="row">
		<div class="col-md-12">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
                                            <th><?= $this->Paginator->sort('customer_id') ?></th>
                                            <th><?= $this->Paginator->sort('customer_password') ?></th>
                                            <th><?= $this->Paginator->sort('customer_name') ?></th>
                                            <th><?= $this->Paginator->sort('customer_status') ?></th>
                                            <th class="actions"></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr >
                                        <td><?= h($customer->customer_id) ?></td>
                                        <td><?= h($customer->customer_password) ?></td>
                                        <td><?= h($customer->customer_name) ?></td>
                                        <td><?= $customer_status[$customer->customer_status] ?></td>
                                        <td class="actions">

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