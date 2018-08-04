<?php
require __DIR__.'/../libs/youtube-dl/youtube-dl.php';
require __DIR__.'/../data/config.php';

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
		try {
	    	$video = youtubedl($ytdl_path, $_POST['url'], __DIR__.'/../data/userfiles/'.$dir);
	    	$download = [
		    	"status" => "success",
		    	"file" => './data/userfiles/'.$dir.'/'.filename(__DIR__."/../data/userfiles/".$dir."/"),
		    	"name" => $video['title'],
		    	"img" => $video['thumbnail']
		    ];
		} catch (Exception $e) {
		    $download = [
		    	"status" => "failed",
		    	"error" => "Imposible de télécharger la bande son !"
		    ];
		}
	}elseif($_POST['format'] == 2){
		$dir = md5(time());
		try {
			mkdir(__DIR__.'/../data/userfiles/'.$dir);
		} catch (Exception $e) {
			echo ("Create dir failed, abord ...");
			header('refresh:5;url=index.php');
			exit;
		}
		try {
	    	$video = youtubedlVideo($ytdl_path, $_POST['url'], __DIR__.'/../data/userfiles/'.$dir);
	    	$download = [
		    	"status" => "success",
		    	"file" => './data/userfiles/'.$dir.'/'.filename(__DIR__."/../data/userfiles/".$dir."/"),
		    	"name" => $video['title'],
		    	"img" => $video['thumbnail']
		    ];
		} catch (Exception $e) {
		    $download = [
		    	"status" => "failed",
		    	"error" => "Imposible de télécharger la vidéo !"
		    ];
		}
	}else{
		$download = [
			"status" => "failed",
			"error" => "Le format n'a pas été précisé"
		];
	}
}