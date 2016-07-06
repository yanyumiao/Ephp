<?php

class App {
	public static function router(){
		if(isset($_SERVER['PATH_INFO'])) {
			$path=$_SERVER['PATH_INFO'];
			$path_arr=explode('/', $path);
			$ctrl=$path_arr[1];
			$action=isset($path_arr[2]) ? $path_arr[2] : 'index';
		}else{
			$ctrl='index';
			$action='index';
		}
		return ['ctrl'=>$ctrl, 'action'=>$action];
	}

	public static function run() {
		$router=self::router();
		$ctrl=$router['ctrl'].'Ctrl';
		$action=$router['action'];
		$class=new $ctrl();
		$class->$action();
	}
}

