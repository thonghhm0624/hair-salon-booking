<div class="view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Collection</h1>
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
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Collection'), ['action' => 'edit', $collection->id],['escape' => false]) ?> </li>
                            <li><?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Collection'), ['action' => 'delete', $collection->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $collection->id)]) ?> </li>
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Collections'), ['action' => 'index'],['escape' => false]) ?> </li>
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Collection'), ['action' => 'add'],['escape' => false]) ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->
        <div class="collections col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($collection->id) ?></td>
                </tr>

                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($collection->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($collection->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($collection->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('To Homepage') ?></th>
                    <td><?= $collection->to_homepage ? __('Yes') : __('No'); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



