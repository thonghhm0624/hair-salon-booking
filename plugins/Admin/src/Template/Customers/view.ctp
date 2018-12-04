<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Customer</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Customer'), ['action' => 'edit', $customer->customer_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Customer'), ['action' => 'delete', $customer->customer_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $customer->customer_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Customers'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Customer'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="customers col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Customer Status') ?></th>
                            <td><?= $this->Number->format($customer->customer_status) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Customer Id') ?></th>
                            <td><?= h($customer->customer_id) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Customer Password') ?></th>
                            <td><?= h($customer->customer_password) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Customer Name') ?></th>
                            <td><?= h($customer->customer_name) ?></td>
                        </tr>
                                                                                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    