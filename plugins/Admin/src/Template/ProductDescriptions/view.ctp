<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Product Description</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Product Description'), ['action' => 'edit', $productDescription->id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Product Description'), ['action' => 'delete', $productDescription->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $productDescription->id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Product Descriptions'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Product Description'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="productDescriptions col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($productDescription->id) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($productDescription->name) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Imageblock 1') ?></th>
                            <td><?= h($productDescription->imageblock_1) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Imageblock 2') ?></th>
                            <td><?= h($productDescription->imageblock_2) ?></td>
                        </tr>
                                                                                            <tr>
                            <th><?= __('Imageblock 3') ?></th>
                            <td><?= h($productDescription->imageblock_3) ?></td>
                        </tr>
                                                                                                            <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($productDescription->created) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($productDescription->modified) ?></td>
                       </tr>
                                                                                                                            <tr>
                            <th><?= __('Textblock 1') ?></th>
                            <td><?= $this->Text->autoParagraph(h($productDescription->textblock_1)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Textblock 2') ?></th>
                            <td><?= $this->Text->autoParagraph(h($productDescription->textblock_2)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Textblock 3') ?></th>
                            <td><?= $this->Text->autoParagraph(h($productDescription->textblock_3)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    