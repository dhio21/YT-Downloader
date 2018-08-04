<?php

require __DIR__.'/execHelper/autoload.php';

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

function isValidURL($url)
{
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url)) {
		return true;
	}else{
		return false;
	}
}

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

function youtubedl($ytdl_path="/usr/local/bin/youtube-dl", $url, $file_path=__DIR__)
{
	if(isValidURL($url) !== true){
		throw new Exception("URL non valide !");
	}else{
		$file = new Process('"'.$ytdl_path.'" -o "'.$file_path.'/%(title)s.mp3" '.$url.' --extract-audio --audio-format mp3 -f "bestaudio"');
		$infos = new Process('"'.$ytdl_path.'" '.$url.' --dump-json');

		try {
		    $file->mustRun();
		    $infos->mustRun();
		    $video_infos = json_decode($infos->getOutput(), true);
		    return array(
		    	"id" => $video_infos['id'],
		    	"title" => $video_infos['title'],
		    	"thumbnail" => "http://img.youtube.com/vi/".$video_infos['id']."/mqdefault.jpg"
		    );
		} catch (Exception $e) {
		    throw new Exception("Impossible de télécharger la bande son ! -> \n$e");
		    
		}

	}
}

function youtubedlVideo($ytdl_path="/usr/local/bin/youtube-dl", $url, $file_path=__DIR__)
{
	if(isValidURL($url) !== true){
		throw new Exception("URL non valide !");
	}else{
		$file = new Process('"'.$ytdl_path.'" -o "'.$file_path.'/%(title)s.%(ext)s" -f bestvideo+bestaudio '.$url.'');
		$infos = new Process('"'.$ytdl_path.'" '.$url.' --dump-json');

		try {
		    $file->mustRun();
		    $infos->mustRun();
		    $video_infos = json_decode($infos->getOutput(), true);
		    return array(
		    	"id" => $video_infos['id'],
		    	"title" => $video_infos['title'],
		    	"thumbnail" => "http://img.youtube.com/vi/".$video_infos['id']."/mqdefault.jpg"
		    );
		} catch (Exception $e) {
		    throw new Exception("Impossible de télécharger la bande son ! -> \n$e");
		    
		}

	}
}