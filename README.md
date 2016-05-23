Yii2 Organization Chart Widget
======================

Easily add [Google Visualization OrgChart](https://developers.google.com/chart/interactive/docs/gallery/orgchart#example) to your Yii2 application.

![Screen Shot](https://www.programmerthailand.com/uploads/1/1463994364_yii2-organization-chart.jpg)

Install
-----
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require kongoon/yii2-orgchart
```

Usage
-----
To use this widget, insert the following code into a view file:
```php
use kongoon\orgchart\OrgChart;

echo OrgChart::widget([
    'data' => [
            [['v' => 'Mike', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Mike&w=120&h=150" /><br  /> <strong>Mike</strong><br  />The President'],'', 'The President'],
            [['v' => 'Jim', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Jim&w=120&h=150" /><br  /><strong>Jim</strong><br  />The Test'],'Mike', 'VP'],
            [['v' => 'ทดสอบ', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=ทดสอบ&w=120&h=150" /><br  /><strong>ทดสอบ</strong><br  />The Test'], 'Mike', ''],
            [['v' => 'Bob', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Bob&w=120&h=150" /><br  /><strong>Bob</strong><br  />The Test'], 'Jim', 'Bob Sponge'],
            [['v' => 'Caral', 'f' => '<img src="https://placeholdit.imgix.net/~text?txtsize=20&txt=Caral&w=120&h=150" /><br  /><strong>Caral</strong><br  />The Test'], 'Mike', 'Caral Title'],

    ]
]);

```
