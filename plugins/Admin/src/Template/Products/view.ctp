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
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Product'), ['action' => 'edit', $product->id],['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Product'), ['action' => 'delete', $product->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $this->Number->format($product->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Color Group') ?></th>
                    <td><?= $this->Number->format($product->color_group) ?></td>
                </tr>
                <tr>
                    <th><?= __('Collection') ?></th>
                    <td><?= $this->Number->format($product->collection) ?></td>
                </tr>

                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($product->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td>
                        <a href="<?= $this->request->webroot.$product->image ?>" class="fancybox"><img height="60" src="<?= $this->request->webroot.$product->image ?>"></a>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($product->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($product->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is New') ?></th>
                    <td><?= $product->is_new ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $product->active ? __('Yes') : __('No'); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



