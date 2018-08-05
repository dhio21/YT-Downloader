<?php
require __DIR__.'/../data/config.php';
require __DIR__.'/../libs/autoload.php';

use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;

function filename($dir)
{
	$scan = scandir($dir);
	$file = null;
	foreach ($scan as $value) {
		if($value !== "." || $value !== ".."){
			$file = $value;
		}
	}
	return $file;
}

function isValidURL($url)
{
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url)) {
		return true;
	}else{
		return false;
	}
}

if(isset($_POST['download'])){
	if($_POST['format'] == 1){
		$dir = md5(time());
		try {
			mkdir(__DIR__.'/../data/userfiles/'.$dir);
		} catch (Exception $e) {
			echo ("Create dir failed, abord ...");
			header('refresh:5;url=index.php');
			exit;
		}
		if(isValidURL($_POST['url']) !== true){
			$download = [
		    	"status" => "failed",
		    	"error" => "URL non valide"
		    ];
		}else{
			$dl = new YoutubeDl([
				'extract-audio' => true,
				'audio-format' => 'mp3',
				'audio-quality' => 0,
				'output' => '%(title)s.%(ext)s',
				'restrict-filenames' => true
			]);
			$dl->setDownloadPath(__DIR__.'/../data/userfiles/'.$dir);
			try {
				$video = $dl->download($_POST['url']);
				$download = [
					"status" => "success",
					"file" => './data/userfiles/'.$dir.'/'.filename(__DIR__."/../data/userfiles/".$dir."/"),
					"name" => $video->getTitle(),
					"img" => "http://img.youtube.com/vi/".$video->getId()."/mqdefault.jpg"
				];
			} catch (NotFoundException $e) {
				$download = [
					"status" => "failed",
					"error" => "Vidéo non trouvé"
				];
			} catch (PrivateVideoException $e) {
				$download = [
					"status" => "failed",
					"error" => "La vidéo est privé"
				];
			} catch (CopyrightException $e) {
				$download = [
					"status" => "failed",
					"error" => "Le compte associé avec cette vidéo a été suspendu"
				];
			} catch (\Exception $e) {
				$download = [
					"status" => "failed",
					"error" => "Erreur inconnue"
				];
			}
		}
	}else{
		$dir = md5(time());
		try {
			mkdir(__DIR__.'/../data/userfiles/'.$dir);
		} catch (Exception $e) {
			echo ("Create dir failed, abord ...");
			header('refresh:5;url=index.php');
			exit;
		}
		if(isValidURL($_POST['url']) !== true){
			$download = [
		    	"status" => "failed",
		    	"error" => "URL non valide"
		    ];
		}else{
			$dl = new YoutubeDl([
				'continue' => true,
				'format' => 'bestvideo+bestaudio',
				'restrict-filenames' => true
			]);
			$dl->setDownloadPath(__DIR__.'/../data/userfiles/'.$dir);
			try {
				$video = $dl->download($_POST['url']);
				$download = [
					"status" => "success",
					"file" => './data/userfiles/'.$dir.'/'.filename(__DIR__."/../data/userfiles/".$dir."/"),
					"name" => $video->getTitle(),
					"img" => "http://img.youtube.com/vi/".$video->getId()."/mqdefault.jpg"
				];
			} catch (NotFoundException $e) {
				$download = [
					"status" => "failed",
					"error" => "Vidéo non trouvé"
				];
			} catch (PrivateVideoException $e) {
				$download = [
					"status" => "failed",
					"error" => "La vidéo est privé"
				];
			} catch (CopyrightException $e) {
				$download = [
					"status" => "failed",
					"error" => "Le compte associé avec cette vidéo a été suspendu"
				];
			} catch (\Exception $e) {
				$download = [
					"status" => "failed",
					"error" => "Erreur inconnue"
				];
			}
		}
	}
}