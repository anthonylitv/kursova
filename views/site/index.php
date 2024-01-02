<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\Article[] $articles */
/** @var yii\data\Pagination $pagination */

$this->title = 'Travel';
?>

<div class="col-md-8">
    <?php foreach ($articles as $article): ?>
        <article class="post post-modern">
            <div class="post-thumb">
                <a href="<?= Url::to(['/view', 'id' => $article->id]) ?>">
                    <?= Html::img($article->getImage(), ['alt' => 'Image', 'class' => 'img-fluid']) ?>
                </a>
            </div>

            <div class="post-info">
                <h6 class="post-topic">
                    <?= Html::a($article->topic->name, ['/topic', 'id' => $article->topic->id], ['class' => 'topic-link']) ?>
                </h6>
                <h2 class="entry-title">
                    <?= Html::a($article->title, ['/view', 'id' => $article->id], ['class' => 'post-title-link']) ?>
                </h2>
                <div class="post-meta">
                    <span class="author">By <?= Html::encode($article->user->name) ?></span> |
                    <span class="date">On <?= Html::encode($article->getDate()) ?></span> |
                    <span class="views"><i class="fa fa-eye"></i> <?= (int) $article->viewed ?></span>
                </div>
            </div>

            <div class="post-excerpt">
                <p><?= Html::encode(mb_strimwidth($article->description, 0, 360, "...")) ?></p>
                <?= Html::a('Continue Reading', ['/view', 'id' => $article->id], ['class' => 'btn btn-primary']) ?>
            </div>
        </article>
    <?php endforeach; ?>

    <?= LinkPager::widget(["pagination" => $pagination]) ?>
</div>

<?= $this->render('@app/views/site/right.php', compact('popular', 'recent', 'topics')) ?>
