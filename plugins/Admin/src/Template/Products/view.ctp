<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Product</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Product'), ['action' => 'edit', $product->product_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Product'), ['action' => 'delete', $product->product_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $product->product_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Products'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Product'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="products col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Product Id') ?></th>
                            <td><?= $this->Number->format($product->product_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Product Category Id') ?></th>
                            <td><?= $this->Number->format($product->product_category_id) ?></td>
                       </tr>
                                                    
                                                                                                                            <tr>
                            <th><?= __('Product Title') ?></th>
                            <td><?= $this->Text->autoParagraph(h($product->product_title)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Product Description') ?></th>
                            <td><?= $this->Text->autoParagraph(h($product->product_description)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Product Image') ?></th>
                            <td><?= $this->Text->autoParagraph(h($product->product_image)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Product Keyword') ?></th>
                            <td><?= $this->Text->autoParagraph(h($product->product_keyword)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Product Content') ?></th>
                            <td><?= $this->Text->autoParagraph(h($product->product_content)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    