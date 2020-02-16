<?php
namespace app\views\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Menu;
use app\models\Advertisement;


class Header extends Widget{

	public function init(){
		parent::init();		
	}
	
	public function run(){   
		$slug = Yii::$app->session['cat'];
		$cat = new Menu();
		$advertisement = new Advertisement();
		$data = $cat->getDatacat($slug,1);
		$controller = Yii::$app->controller->id;
		$action = Yii::$app->controller->action->id;
        
        return $this->render('header',['data'=>$data,'controller'=>$controller,'action'=>$action,'slug'=>$slug]);
	}
}
?>