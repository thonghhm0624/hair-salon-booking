<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Category</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Category'), ['action' => 'edit', $category->category_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Category'), ['action' => 'delete', $category->category_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $category->category_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Categories'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Category'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="categories col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Category Id') ?></th>
                            <td><?= $this->Number->format($category->category_id) ?></td>
                       </tr>
                                                    
                                                                    <tr>
                            <th><?= __('Category Name') ?></th>
                            <td><?= h($category->category_name) ?></td>
                        </tr>
                                                                                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    