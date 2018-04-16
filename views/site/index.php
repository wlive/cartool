<?php

use kartik\select2\Select2;
use russ666\widgets\Countdown;
use yii\bootstrap\BootstrapAsset;
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
        '<img src="' + encodeURI(time.escudo) + '" style="height:40px" />' +
        '<b style="margin-left:5px; margin-bottom:10px">' + time.nome + '</b>' + '<i> - ' + time.cartola + '</i>' +
    '</div>' 
'</div>';
    return '<div style="overflow:hidden;">' + markup + '</div>';
};
var formatTimeSelection = function (time) {
    return time.nome + ' - '  + time.cartola;
}
JS;
 
// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);
$this->registerCssFile("/cartool/web/css/cartola.css", [
    'depends' => [BootstrapAsset::className()]]);
//$this->registerCssFile(Yii::app()->theme->baseUrl . );
 
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
         <div class="cartola-campinho cartola-campinho--formacao-tatica-3" campinho="" empty-state="ctrl.emptyState" ctrl="ctrl" time="ctrl.timeService" parciais="ctrl.parciais">
    <!---->

    <!----><div ng-if="controller.exibeAtletas()">
        <!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="0" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__gol">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Fernando Leal" title="Fernando Leal" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/20/6020709514f63ef3c8e066601ee521fd_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/organizacoes/2018/01/24/AmericaMG-65.png" ng-src="https://s.glbimg.com/es/sde/f/organizacoes/2018/01/24/AmericaMG-65.png" alt="América-MG" title="América-MG"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="1" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__lat">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Norberto " title="Norberto " style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/17/05b05b9b4b348f4aef923ec2152f275e_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/organizacoes/2018/01/24/AmericaMG-65.png" ng-src="https://s.glbimg.com/es/sde/f/organizacoes/2018/01/24/AmericaMG-65.png" alt="América-MG" title="América-MG"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="2" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__lat">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Liziero" title="Liziero" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/04/13/1b255504597949eb8f15acc1bc6f2707_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/sao_paulo_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/sao_paulo_60x60.png" alt="São Paulo" title="São Paulo"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="3" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__zag">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Douglas Grolli" title="Douglas Grolli" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/21/ea4ba4bd9ed18698a6dad571dfdddbf9_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/bahia_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/bahia_60x60.png" alt="Bahia" title="Bahia"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="4" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__zag">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Lucas Veríssimo" title="Lucas Veríssimo" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2017/05/02/0198bbb1258bc8a618b6ef67781a60a6_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/santos_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/santos_60x60.png" alt="Santos" title="Santos"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="5" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__mei">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Marco Antônio" title="Marco Antônio" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/21/5bea6fd938bc4b34ea0ba52b788b8b3a_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/bahia_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/bahia_60x60.png" alt="Bahia" title="Bahia"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="6" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__mei">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Mateus Vital" title="Mateus Vital" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/20/737d7c44d8457c420b7d44f962dc43a2_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/corinthians_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/corinthians_60x60.png" alt="Corinthians" title="Corinthians"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="7" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__mei">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante pontuacao-flutuante--capitao" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Otero" title="Otero" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2017/04/03/9fe40eece7847c6e2d8feca1248f43a9_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2017/11/23/Atletico-Mineiro-escudo65px.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2017/11/23/Atletico-Mineiro-escudo65px.png" alt="Atlético-MG" title="Atlético-MG"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!----><svg class="cartola-campinho-button cartola-campinho-button__capitao cartola-campinho-button__capitao--fechado cartola-atleta-simples-capitao" ng-if="!ctrl.podeMovimentarMercado() &amp;&amp; time.capitao_id == atleta.atleta_id" nomeclasse="cartola-atleta-simples-capitao" seletor="time--icon-capitao"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/dist/3.3.9/img/sprite.svg#time--icon-capitao"></use></svg><!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="8" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__ata">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Pablo" title="Pablo" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2017/04/23/3edce5d707460f97a267436370d60be7_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2015/06/24/atletico-pr_2015_65.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2015/06/24/atletico-pr_2015_65.png" alt="Atlético-PR" title="Atlético-PR"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="9" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__ata">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Ricardo Oliveira" title="Ricardo Oliveira" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/20/08e587e5b70fbd4605dddaf9aaae5281_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2017/11/23/Atletico-Mineiro-escudo65px.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2017/11/23/Atletico-Mineiro-escudo65px.png" alt="Atlético-MG" title="Atlético-MG"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="10" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__ata">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">-</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Arthur Gomes" title="Arthur Gomes" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2017/05/02/0dce55b5ca74aab8f37b77c936bdc107_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/santos_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/santos_60x60.png" alt="Santos" title="Santos"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!----><div ng-repeat="atleta in time.atletas track by $index" data-atleta-id="11" ng-class="{ 'cartola-campinho-escalacao': ctrl.podeMovimentarMercado() }" class="cartola-atletas--posicao cartola-atletas--posicao__tec">

            <div class="cartola-campinho-atleta-container cartola-campinho-atleta-container--parcial" ng-class="{'cartola-campinho-atleta-container--parcial': !ctrl.podeMovimentarMercado()}">
                <!-- PONTUAÇÃO PARCIAL -->
                <!----><div ng-if="atleta.escalado &amp;&amp; !ctrl.podeMovimentarMercado()" class="cartola-campinho__pontuacao-parcial-container" ng-class="{'cartola-campinho__pontuacao-parcial-container--capitao': atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id &amp;&amp; parciais[atleta.atleta_id].pontuacao !== undefined}">
                        <pontuacao-flutuante pontuacao="parciais[atleta.atleta_id].pontuacao" pontuacao-original="parciais[atleta.atleta_id].pontuacao_original || parciais[atleta.atleta_id].pontuacao" eh-capitao="atleta.escalado &amp;&amp; time.capitao_id == atleta.atleta_id"><div class="pontuacao-flutuante" ng-class="{ 'pontuacao-flutuante--capitao': $ctrl.ehCapitao }">
    <!---->
    <!---->
    <div class="pontuacao-flutuante__ponto pontuacao-flutuante__ponto--calculado" ng-class="{
            'pont-positiva': $ctrl.pontuacao > 0,
            'pont-negativa': $ctrl.pontuacao < 0
        }" ng-bind="$ctrl.pontuacao.toFixed(2) || '-'">0.00</div>
</div></pontuacao-flutuante>
                </div><!---->

                <!-- BOTÃO COMPRAR -->
                <!---->

                <!-- FOTO ATLETA -->
                <!----><div ng-if="atleta.escalado" class="cartola-campinho-atleta-foto cartola-campinho-atleta-foto--7" ng-style="{ 'background-image': 'url(' + atleta.foto.replace('FORMATO', '140x140') +')' }" ng-class="{
                        'cartola-campinho-atleta-foto--7': atleta.status_id,
                        'cartola-campinho-atleta-foto--problema': atleta.clube_id === 1
                    }" alt="Marcelo Chamusca" title="Marcelo Chamusca" style="background-image: url(&quot;https://s.glbimg.com/es/sde/f/2018/03/15/8575ab3c43af119d65d706a9e1c8e87f_140x140.png&quot;);"></div><!---->

                <!-- ESCUDO -->
                <!----><img ng-if="atleta.escalado" class="cartola-campinho-atleta-escudo cartola-atletas__escudo" src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/ceara_60x60.png" ng-src="https://s.glbimg.com/es/sde/f/equipes/2014/04/14/ceara_60x60.png" alt="Ceará" title="Ceará"><!---->

                <!---->

                <!-- CAPITÃO ATUAL -->
                <!---->

                <!---->

                <!-- VENDER -->
                <!---->
            </div>
        </div><!---->

        <span class="cartola-campinho-cortina"></span>
    </div><!---->
</div>
        <?php
        ini_set("allow_url_fopen", 1);
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        //Basically adding headers to the request
        $context = stream_context_create($opts);
        $json = file_get_contents('https://api.cartolafc.globo.com/time/slug/vinnare-fc', false, $context);
        $obj = json_decode($json);
        print_r($obj->atletas[0]);

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
    'options' => ['placeholder' => 'Procure pelo Time ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple'=>true,
        'minimumInputLength' => 4,
        'language' => [
            'errorLoading' => new JsExpression("function () { return 'Aguardando resultados...'; }"),
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
