<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Service</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Service'), ['action' => 'edit', $service->service_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Service'), ['action' => 'delete', $service->service_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $service->service_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Services'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Service'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="services col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Service Id') ?></th>
                            <td><?= $this->Number->format($service->service_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Service Duration') ?></th>
                            <td><?= $this->Number->format($service->service_duration) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Service Price') ?></th>
                            <td><?= $this->Number->format($service->service_price) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Service Name') ?></th>
                            <td><?= h($service->service_name) ?></td>
                        </tr>
                                                                                                                                                    <tr>
                            <th><?= __('Service Image') ?></th>
                            <td><?= $this->Text->autoParagraph(h($service->service_image)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    