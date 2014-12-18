<?php
/**
 * 基类
 */
namespace app\controllers;

abstract class Controller extends \yii\web\Controller
{

	protected $view = null;

	protected $session = null;

	protected $publicActions = null;

	protected $homePage = '/';

	private $appName = null;

	private $controllerName = null;

	private $actionName = null;

	/**
	 * 模板变量
	 */
	protected $params = null;

	public function init()
	{
		!$this->view and $this->view = $this->getView();
		!$this->session and $this->session = \Yii::$app->session;

		!empty($this->params) and $this->view->params = $this->params;

		$this->analyse();

		$this->checkAuth();
	}

	public function checkAuth()
	{

	}

	public function analyse()
	{
		$request_uri = $_SERVER['REQUEST_URI'];

		$base = null;
		if (($pos = strpos($request_uri, '?')) !== false)
			$base = substr($request_uri, 1, $pos-1);
		else
			$base = substr($request_uri, 1);
		$base = trim($base, '/');
		$items = explode('/', $base);
		if (in_array($items[0], ['sysadm', 'user']))
		{
		}	
		else
		{
			array_unshift($items, 'site');
		}
		count($items) == 1 and $items[1] = 'index';
		count($items) == 2 and $items[2] = 'index';

		list($this->appName, $this->controllerName, $this->actionName) = $items;
	}

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
			//验证码
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode'	=>	null,
				'width'	=>	100,
				'minLength'	=>	4,
				'maxLength'	=>	5,
				'transparent'	=>	true
            ],
        ];
    }

	public function noLayout()
	{
		$this->layout = false;
	}

	public function param($key)
	{
		return \Yii::$app->params[$key];
	}

	public function moduleName()
	{
		return $this->moduleName;
	}

	public function controllerName()
	{
		return $this->controllerName;
	}

	public function appName()
	{
		return $this->appName;
	}

	public function goHome()
	{
		parent::redirect($this->homePage);
	}

}
