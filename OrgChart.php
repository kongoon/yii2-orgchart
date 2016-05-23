<?php
namespace kongoon\orgchart;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

class OrgChart extends Widget
{
    public $htmlOptions = [];
    public $setupOptions = [];
    public $data = [];

    public function run()
    {
        if(isset($this->htmlOptions['id'])){
            $this->id = $this->htmlOptions['id'];
        }else{
            $this->id = $this->htmlOptions['id'] = $this->getId();
        }
        echo Html::tag('div', '', $this->htmlOptions);

        if(is_string($this->data)){
            $this->data = Json::decode($this->data);
        }
        $this->registerAsset();
        parent::run();
    }

    protected function registerAsset()
    {
        $jsData = Json::encode($this->data);
        $setupOptions = Json::encode($this->setupOptions);
        $js = "
            google.charts.load('current', {packages:[\"orgchart\"]});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name');
                data.addColumn('string', 'Manager');
                data.addColumn('string', 'ToolTip');

                // For each orgchart box, provide the name, manager, and tooltip to show.
                data.addRows(
                    ".$jsData."
                );

                // Create the chart.
                var chart = new google.visualization.OrgChart(document.getElementById('".$this->id."'));
                chart.draw(data, {allowHtml:true});
            }
        ";
        $this->view->registerJsFile('https://www.gstatic.com/charts/loader.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
        $this->view->registerJs($js, View::POS_READY);
    }
}
