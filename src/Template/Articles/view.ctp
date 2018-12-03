<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->article_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->article_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->article_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Article Id') ?></th>
            <td><?= $this->Number->format($article->article_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article Category Id') ?></th>
            <td><?= $this->Number->format($article->article_category_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Article Title') ?></h4>
        <?= $this->Text->autoParagraph(h($article->article_title)); ?>
    </div>
    <div class="row">
        <h4><?= __('Article Description') ?></h4>
        <?= $this->Text->autoParagraph(h($article->article_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Article Image') ?></h4>
        <?= $this->Text->autoParagraph(h($article->article_image)); ?>
    </div>
    <div class="row">
        <h4><?= __('Article Keyword') ?></h4>
        <?= $this->Text->autoParagraph(h($article->article_keyword)); ?>
    </div>
    <div class="row">
        <h4><?= __('Article Content') ?></h4>
        <?= $this->Text->autoParagraph(h($article->article_content)); ?>
    </div>
</div>
