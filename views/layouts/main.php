<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <section id="header" class="appear"></section>
        <?php
        NavBar::begin([
            'brandLabel' => 'Frenzel GmbH',
            'screenReaderToggleText' => 'MENU',
            'brandUrl' => Yii::$app->homeUrl,
            'brandOptions' => [
                'data-0' => 'line-height:90px;',
                'data-300' => 'line-height:50px;'
            ],
            'options' => [
                'class' => 'navbar navbar-fixed-top',
                'role'  => 'navigation',
                'data-0' => 'line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);',
                'data-300' => 'line-height:60px; height:60px; background-color:rgba(0,0,0,1);'
            ],
        ]);
        echo Nav::widget([
            'options' => [
                'class' => 'nav navbar-nav',
                'data-0' => 'margin-top:20px;',
                'data-300' => 'margin-top:5px;'
            ],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => '#section-about'],
                ['label' => 'Blog', 'url' => '#parallax1'],
                ['label' => 'Contact', 'url' => '#section-contact'],
                Yii::$app->user->isGuest ?
                    ['label' => 'Login', 'url' => ['/user/security/login']] :
                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']],
            ],
        ]);
        NavBar::end();
        ?>        

        <?= $content ?>

        
        <!-- /about -->

    <section id="footer" class="section footer">
        <div class="container">
            <div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
                <div class="col-sm-8 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="http://www.facebook.com/pepefrenzel" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://plus.google.com/u/0/102078578622410234043/posts/p/pub" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.github.com/philippfrenzel" class="icoGithub" title="Github" target="_blank"><i class="fa fa-github"></i></a></li>
                    </ul>               
                </div>
                <div class="col-sm-4">
                    <div class="footer-box">
                        <h4 class="fg-color-orange">Kontakt</h4>
                        <address>
                        Hohewartstr. 32 <br>
                        D-70469 Stuttgart <br>

                        Tel. 0049 - 7964 - 33 17 54 <br>
                        Fax. 0049 - 7664 - 33 17 55 <br>

                        Mail. info@frenzel.net
                        </address>                      
                    </div>
                </div>
            </div>

            <div class="row align-center copyright">
                    <div class="col-sm-12"><p>Copyright &copy; frenzel GmbH - by <a href="http://frenzel.net">Frenzel.NET</a></p></div>
            </div>
        </div>
    </section>

        <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
