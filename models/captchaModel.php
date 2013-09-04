<?
class captcha{
	public function msg($msg){
		$container = imagecreate(120,50);
		$black = imagecolorallocate($container,0,0,0);
		$white = imagecolorallocate($container,255,255,255);
		$font = 'Deming.ttf';
		imagefilledrectangle($container,0,0,250,150,$black);
		//imagerectangle($container,0,0,50,60,$white);
		imagefttext($container,20,8,10,40,$white,$font,$msg);
		header('Content-Type: image/png');
		imagepng($container,"cap.png");
		imagedestroy($container);
	}
	public function random($length = 10){
		return substr(str_shuffle("0123456789abcdefghijklmnopABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 	
	}
}
?>