<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Stylist</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Stylist'), ['action' => 'edit', $stylist->stylist_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Stylist'), ['action' => 'delete', $stylist->stylist_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $stylist->stylist_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Stylists'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Stylist'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="stylists col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Stylist Id') ?></th>
                            <td><?= $this->Number->format($stylist->stylist_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Stylist Branch Id') ?></th>
                            <td><?= $this->Number->format($stylist->stylist_branch_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Stylist Status') ?></th>
                            <td><?= $this->Number->format($stylist->stylist_status) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Stylist Name') ?></th>
                            <td><?= h($stylist->stylist_name) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Stylist Password') ?></th>
                            <td><?= h($stylist->stylist_password) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Stylist Phone') ?></th>
                            <td><?= h($stylist->stylist_phone) ?></td>
                        </tr>
                                                                                                                                                    <tr>
                            <th><?= __('Stylist Image') ?></th>
                            <td><?= $this->Text->autoParagraph(h($stylist->stylist_image)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    