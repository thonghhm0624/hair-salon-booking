<div class="products index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo "Product"; ?></h1>
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
                            <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Product'), ['action' => 'add'],['escape' => false]); ?></li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('color_group') ?></th>
                    <th><?= $this->Paginator->sort('Active') ?></th>
                    <th><?= $this->Paginator->sort('is_new') ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): $product_id = $product->id ?>
                    <tr>
                        <td>
                            <a href="<?= $this->request->webroot.$product->image ?>" class="fancybox"><img height="60" src="<?= $this->request->webroot.$product->image ?>"></a>
                        </td>
                        <td><?= h($product->name) ?></td>
                        <td>
                            <a id="various" href="#inline-<?php echo $product_id?>" title=""><?= $this->Text->truncate(h($product->description, 60)) ?></a>
                            <div style="display: none;">
                                <div id="inline-<?php echo $product_id?>" style="width:700px;overflow:auto;">
                                    <?php echo $product->description ?>
                                </div>
                            </div>
                        </td>
                        <td><?= $product_types[$product->type] ?></td>
                        <td><?= $color_group[$product->color_group] ?></td>

                        <td><?php echo $product->active == '1' ? '<span field="active" update_status="1" id="'.$product_id.'" class="pointer glyphicon glyphicon-ok"></span>' : '<span field="active" update_status="1" id="'.$product_id.'" class="pointer glyphicon glyphicon-remove"></span>'; ?></td>
                        <td><?php echo $product->is_new == '1' ? '<span field="is_new" update_status="1" id="'.$product_id.'" class="pointer glyphicon glyphicon-ok"></span>' : '<span field="is_new" update_status="1" id="'.$product_id.'" class="pointer glyphicon glyphicon-remove"></span>'; ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $product->id],['escape' => false]) ?>
                            <?= $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $product->id],['escape' => false]) ?>
                            <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $product->id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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


</div><!-- end containing of description -->
<script>
    $(document).ready(function() {
        $("#various").fancybox({
            'transitionIn': 'none',
            'transitionOut': 'none'
        });
    });
    $(document).on("click", "span[update_status=1]", function () {
        var id = $(this).attr('id');
        var field = $(this).attr('field');
        var $this = $(this);
        $.ajax({
            url: '<?php echo $this->Url->build(array('controller' => 'Products', 'action' => 'active_fields')) ?>',
            type: 'post',
            data: {id: id, field: field},
            success: function (data) {
                var _this = $this;
                if (data == 1) {
                    _this.removeClass('glyphicon-remove');
                    _this.addClass('glyphicon-ok');
                }
                if (data == 0) {
                    _this.removeClass('glyphicon-ok');
                    _this.addClass('glyphicon-remove');
                }
            }
        });
    });
</script>