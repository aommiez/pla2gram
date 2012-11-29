<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        if ( !empty($_GET['p'])) {
            $p = $_GET['p'];
            $this->render('show',array( 'p' => $p));
        } else {
            $this->render('index');
        }

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

    public function actionGo(){
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
            $f = $_POST['filter'];
            $min_rand=rand(0,1000);
            $max_rand=rand(100000000000,10000000000000000);
            $name_file=rand($min_rand,$max_rand);//this part is for creating random name for image
            $ext=end(explode(".", $_FILES["file"]["name"]));//gets extension
            $file = Yii::app()->request->baseUrl."photo/".$name_file.".".$ext;
            move_uploaded_file($_FILES["file"]["tmp_name"],Yii::app()->request->baseUrl."photo/".$name_file.".".$ext );
            chmod($file, 0777);
            $filter = Instagraph::factory(Yii::app()->request->baseUrl."photo/".$name_file.".".$ext,Yii::app()->request->baseUrl."photo/".$name_file.".".$ext);
            $filter->$f();
            echo "<img src=\"{$file}\">";
            //Helper::redir("/?p=".Yii::app()->request->baseUrl."photo/".$name_file.".".$ext,0);
        }

    }

}