<div class="productTypes index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo "Product Type"; ?></h1>
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
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Product Type'), ['action' => 'add'],['escape' => false]); ?></li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>

                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($productTypes as $productType): ?>
                    <tr>
                        <td><?= $this->Number->format($productType->id) ?></td>
                        <td><?= h($productType->slug) ?></td>
                        <td><?= h($productType->name) ?></td>
                        <td><?= h($productType->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $productType->id],['escape' => false]) ?>
                            <?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $productType->id],['escape' => false]) ?>
                            <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $productType->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?>
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