<?php

use kartik\select2\Select2;
use russ666\widgets\Countdown;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yiister\gentelella\widgets\StatsTile;
/* @var $this View */

$this->title = 'My Yii Application';
$formatJs = <<< 'JS'
var formatTime = function (time) {
    if (time.loading) {
        return time.text;
    }
    var markup =
'<div class="row">' + 
    '<div class="col-sm-5">' +
        '<img src="' + time.url_escudo_png + '" class="img-rounded" style="width:30px" />' +
        '<b style="margin-left:5px">' + time.nome + '</b>' + 
    '</div>' 
'</div>';
    if (time.description) {
      markup += '<h5>' + time.description + '</h5>';
    }
    return '<div style="overflow:hidden;">' + markup + '</div>';
};
var formatTimeSelection = function (time) {
    return time.nome || time.nome;
}
JS;
 
// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);
 
// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    return {
        results: data,
        pagination: {
            more: (params.page * 10) < data.length
        }
    };
}
JS;
?>
<div class="site-index">
    <div class="row">
        <?php
        ini_set("allow_url_fopen", 1);
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        //Basically adding headers to the request
        $context = stream_context_create($opts);
        $json = file_get_contents('https://api.cartolafc.globo.com/time/slug/vinnare-fc', false, $context);
        $obj = json_decode($json);
        echo $obj->time->nome;

        $json = file_get_contents('https://api.cartolafc.globo.com/mercado/status', false, $context);
        $obj = json_decode($json);
        $timestamp = $obj->fechamento->timestamp;
        echo '<br>' . date("d-m-Y H:i", $timestamp);
        echo Countdown::widget([
            'datetime' => date('Y-m-d H:i:s O', $timestamp),
            'format' => '%D dias %H:%M:%S',
            'events' => [
                'finish' => 'function(){location.reload()}',
            ],
        ])
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <?=
            StatsTile::widget(
                    [
                        'icon' => 'list-alt',
                        'header' => 'Orders',
                        'text' => 'All orders list',
                        'number' => '7084',
                    ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?=
            StatsTile::widget(
                    [
                        'icon' => 'pie-chart',
                        'header' => 'Conversion',
                        'text' => 'Users to orders',
                        'number' => '1.5%',
                    ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?=
            StatsTile::widget(
                    [
                        'icon' => 'users',
                        'header' => 'Users',
                        'text' => 'Count of registered users',
                        'number' => '1807',
                    ]
            )
            ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <?=
            StatsTile::widget(
                    [
                        'icon' => 'comments-o',
                        'header' => 'Reviews',
                        'text' => 'The next reviews are not approved',
                        'number' => Countdown::widget([
                            'datetime' => date('Y-m-d H:i:s O', $timestamp),
                            'format' => '%D dias %H:%M:%S',
                            'events' => [
                                'finish' => 'function(){location.reload()}',
                            ],
                        ]),
                    ]
            )
            ?>
        </div>

    </div>
<?=Select2::widget([
    'name' => 'kv-time-template',
    'options' => ['placeholder' => 'Search for a city ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 3,
        'language' => [
            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
        ],
        'ajax' => [
            'url' => Url::toroute(['lista-times']),
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('formatTime'),
        'templateSelection' => new JsExpression('formatTimeSelection'),
    ],
])?>
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Top Profiles <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    ini_set("allow_url_fopen", 1);
                    $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
                    //Basically adding headers to the request
                    $context = stream_context_create($opts);
                    $json = file_get_contents('https://api.cartolafc.globo.com/time/slug/vinnare-fc', false, $context);
                    $obj = json_decode($json);
                    $nome = $obj->time->nome;
                    $escudo = $obj->time->url_escudo_png;
                    ?>
                    <ul class="list-unstyled top_profiles scroll-view">
                          <li class="media event">
                              <img src="<?=$escudo?>" height="50px" class="pull-left">
                            <div class="media-body">
                              <a class="title" href="#"><?= $nome ?></a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-blue profile_thumb">
                              <i class="fa fa-user blue"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-aero profile_thumb">
                              <i class="fa fa-user aero"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Ms. Mary Jane</a>
                              <p><strong>$2300. </strong> Agent Avarage Sales </p>
                              <p> <small>12 Sales Today</small>
                              </p>
                            </div>
                          </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
