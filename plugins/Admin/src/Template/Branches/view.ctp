<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Branch</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Branch'), ['action' => 'edit', $branch->branch_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Branch'), ['action' => 'delete', $branch->branch_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $branch->branch_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Branches'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Branch'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="branches col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Branch Id') ?></th>
                            <td><?= $this->Number->format($branch->branch_id) ?></td>
                       </tr>
                                                    
                                                                                                                            <tr>
                            <th><?= __('Branch Address') ?></th>
                            <td><?= $this->Text->autoParagraph(h($branch->branch_address)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Branch Phonenumber') ?></th>
                            <td><?= $this->Text->autoParagraph(h($branch->branch_phonenumber)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    