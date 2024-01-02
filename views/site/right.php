<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var app\models\Article[] $popular */
/** @var app\models\Article[] $recent */
/** @var app\models\Topic[] $topics */
/** @var app\models\SearchForm $searchForm */

$searchForm = new \app\models\SearchForm();
?>

<div class="sidebar col-md-4" data-sticky_column>
    <!-- Popular Posts -->
    <aside class="widget popular-posts">
        <h3 class="widget-title">Popular Posts</h3>
        <?php foreach ($popular as $article): ?>
            <div class="post2">
                <a href="<?= Url::toRoute(['/view', 'id' => $article->id]) ?>">
                    <?= Html::img($article->getImage(), ['alt' => 'Image', 'class' => 'post2-image']) ?>
                </a>
                <div class="post2-details">
                    <?= Html::a($article->title, ['/view', 'id' => $article->id], ['class' => 'post2-title']) ?>
                    <span class="post2-date"><?= Html::encode($article->getDate()) ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </aside>

    <!-- Recent Posts -->
    <aside class="widget recent-posts">
        <h3 class="widget-title">Recent Posts</h3>
        <?php foreach ($recent as $article): ?>
            <div class="post2">
                <a href="<?= Url::toRoute(['/view', 'id' => $article->id]) ?>">
                    <?= Html::img($article->getImage(), ['alt' => 'Image', 'class' => 'post2-image']) ?>
                </a>
                <div class="post2-details">
                    <?= Html::a($article->title, ['/view', 'id' => $article->id], ['class' => 'post2-title']) ?>
                    <span class="post2-date"><?= Html::encode($article->getDate()) ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </aside>

    <!-- Categories -->
    <aside class="widget categories">
        <h3 class="widget-title">Categories</h3>
        <ul>
            <?php foreach ($topics as $topic): ?>
                <li>
                    <?= Html::a($topic->name, ['/topic', 'id' => $topic->id]) ?>
                    <span class="post2-count"> (<?= $topic->getArticles()->count(); ?>)</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <!-- Search Form -->
    <aside class="widget search-widget">
        <?php $form = ActiveForm::begin([
            'method' => 'get',
            'action' => Url::to(['site/search']),
            'options' => ['class' => 'search-form']
        ]) ?>
        <?= $form->field($searchForm, 'text')->textInput(['class' => 'search-input', 'placeholder' => 'Search'])->label(false) ?>
        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
        <?php ActiveForm::end() ?>
    </aside>
</div>
