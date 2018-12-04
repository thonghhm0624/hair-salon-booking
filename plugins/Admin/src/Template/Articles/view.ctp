<div class="view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Article</h1>
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
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Article'), ['action' => 'edit', $article->article_id],['escape' => false]) ?> </li>
                                <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Article'), ['action' => 'delete', $article->article_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $article->article_id)]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Articles'), ['action' => 'index'],['escape' => false]) ?> </li>
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Article'), ['action' => 'add'],['escape' => false]) ?> </li>                                
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->
        <div class="articles col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                                                                <tr>
                            <th><?= __('Article Id') ?></th>
                            <td><?= $this->Number->format($article->article_id) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Article Category Id') ?></th>
                            <td><?= $this->Number->format($article->article_category_id) ?></td>
                       </tr>
                                                    
                                                                                                                            <tr>
                            <th><?= __('Article Title') ?></th>
                            <td><?= $this->Text->autoParagraph(h($article->article_title)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Article Description') ?></th>
                            <td><?= $this->Text->autoParagraph(h($article->article_description)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Article Image') ?></th>
                            <td><?= $this->Text->autoParagraph(h($article->article_image)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Article Keyword') ?></th>
                            <td><?= $this->Text->autoParagraph(h($article->article_keyword)) ?></td>
                       </tr>
                                            <tr>
                            <th><?= __('Article Content') ?></th>
                            <td><?= $this->Text->autoParagraph(h($article->article_content)) ?></td>
                       </tr>
                                                        </tbody>
            </table> 
        </div>
            </div>
</div>
        
        
        
    