<div class="articles index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo "Article"; ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->
	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
                                <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Article'), ['action' => 'add'],['escape' => false]); ?></li>
                                    							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
                                            <th><?= $this->Paginator->sort('article_id') ?></th>
                                            <th><?= $this->Paginator->sort('article_category_id') ?></th>
                                            <th><?= $this->Paginator->sort('article_title') ?></th>
                                            <th><?= $this->Paginator->sort('article_description') ?></th>

                                            <th class="actions"></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                                        <td><?= ($article->article_id) ?></td>
                                        <td><?= $categories[$article->article_category_id] ?></td>
                                        <td><?= ($article->article_title) ?></td>
                                        <td><?= ($article->article_description) ?></td>

                                        <td class="actions">
                            <?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $article->article_id],['escape' => false]) ?>
                            <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $article->article_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $article->article_id)]) ?>
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