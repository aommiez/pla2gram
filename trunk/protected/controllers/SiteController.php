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
        if ( !empty($_GET['code'])) {
            Helper::redir("/",0);
        }
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

            if (exif_imagetype($file) == IMAGETYPE_JPEG) {
                $exif = exif_read_data($file);
                if ( isset($exif['Orientation']) ) {
                    $orientation = $exif['Orientation'];
                    if ( $orientation == 6 ) {
                        $imz = new Imagick($file);
                        $imz->rotateimage("#FFF", 90);
                        $imz->writeImage($file);
                        chmod($file, 0777);
                    } else if ( $orientation == 8) {
                        $imz = new Imagick($file);
                        $imz->rotateimage("#FFF", -90);
                        $imz->writeImage($file);
                        chmod($file, 0777);
                    }
                }
            }

            // Max vert or horiz resolution
            $maxsize=1200;

            // create new Imagick object
            $image = new Imagick($file);

            // Resizes to whichever is larger, width or height
            if($image->getImageHeight() <= $image->getImageWidth())
            {
            // Resize image using the lanczos resampling algorithm based on width
                $image->resizeImage($maxsize,0,Imagick::FILTER_LANCZOS,1);
            }
            else
            {
            // Resize image using the lanczos resampling algorithm based on height
                $image->resizeImage(0,$maxsize,Imagick::FILTER_LANCZOS,1);
            }

            // Set to use jpeg compression
            $image->setImageCompression(Imagick::COMPRESSION_JPEG);

            // Set compression level (1 lowest quality, 100 highest quality)
            $image->setImageCompressionQuality(75);
            // Strip out unneeded meta data
            $image->stripImage();
            // Writes resultant image to output directory
            $image->writeImage($file);
            // Destroys Imagick object, freeing allocated resources in the process
            $image->destroy();
            chmod($file, 0777);

            $filter = Instagraph::factory($file,$file);
            $filter->$f();

            // 320 Show Preview
            $immid = new Imagick($file);
            if ( $immid->getimagewidth() > 320 ) {
                $immid->thumbnailImage(320,null);
                $immid->writeImage(Yii::app()->request->baseUrl."thumb/thumb320_".$name_file.".".$ext);
                $immid->destroy();
                chmod(Yii::app()->request->baseUrl."thumb/thumb320_".$name_file.".".$ext, 0777);
            } else {
                $immid->writeImage(Yii::app()->request->baseUrl."thumb/thumb320_".$name_file.".".$ext);
                $immid->destroy();
                chmod(Yii::app()->request->baseUrl."thumb/thumb320_".$name_file.".".$ext, 0777);
            }

            // null x 230 show last upload
            $imlast = new Imagick($file);
            $imlast->thumbnailimage(null,230);
            $imlast->writeImage(Yii::app()->request->baseUrl."thumb/thumb230_".$name_file.".".$ext);
            $imlast->destroy();
            chmod(Yii::app()->request->baseUrl."thumb/thumb230_".$name_file.".".$ext, 0777);


            // 130 x 110 thumbmail
            $im = new Imagick($file);
            $im->thumbnailImage(130,110);
            $im->writeImage(Yii::app()->request->baseUrl."thumb/thumb_".$name_file.".".$ext);
            chmod(Yii::app()->request->baseUrl."thumb/thumb_".$name_file.".".$ext, 0777);
            $im->destroy();

            $photo = new Photo;
            $photo->link = $file;
            $photo->fbid = Yii::app()->facebook->getUser();
            $photo->ip = $_SERVER['REMOTE_ADDR'];
            if ($photo->save()) {
                $id = $photo->id;
                Helper::redir("/?p=".$id,0);
            } else {
                print_r($photo->getErrors());
            }
        }
    }


    public function actionphpinfo() {
        echo phpinfo();
    }

    public function actionmenutop() {
        $this->renderPartial("menutop");
    }


    public function actionalbum() {
        if ( !empty($_GET['code'])) {
            Helper::redir(Yii::app()->request->requestUri,0);
        }
        $this->render("album");
    }


}