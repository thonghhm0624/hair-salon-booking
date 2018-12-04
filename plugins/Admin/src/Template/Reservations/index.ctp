<div class="reservations index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo "Reservation"; ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>


                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('stylist_id') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>

                    <th><?= $this->Paginator->sort('reservation_status') ?></th>
                    <th><?= $this->Paginator->sort('reservation_date') ?></th>
                    <th><?= $this->Paginator->sort('reservation_time') ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>

                        <td><?= h($reservation->customer_id) ?></td>
                        <td><?= $stylists[$reservation->stylist_id] ?></td>
                        <td><?= $services[$reservation->service_id] ?></td>

                        <td><?= $reservation_status[$reservation->reservation_status] ?></td>

                        <td><?= h($reservation->reservation_date) ?></td>
                        <td><?= $reservation->reservation_time ?></td>
                        <td class="actions">
                            <?php
                                if($reservation->reservation_status != 3)
                                    echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), ['action' => 'edit', $reservation->reservation_id],['escape' => false])
                            ?>
                            <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $reservation->reservation_id], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservation_id)]) ?>
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