<div class="view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Product Type</h1>
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
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Product Type'), ['action' => 'edit', $productType->id],['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Product Type'), ['action' => 'delete', $productType->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Product Types'), ['action' => 'index'],['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Product Type'), ['action' => 'add'],['escape' => false]) ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->
        <div class="productTypes col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productType->id) ?></td>
                </tr>

                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($productType->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($productType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($productType->created) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



