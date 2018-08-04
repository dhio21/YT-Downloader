<?php

require __DIR__.'/cogs/ytdl.php';

if(!isset($download)){
	header('Location: index.php');
	exit();
}else if($download['status'] === "failed"){
	require __DIR__.'/view/download_failed.php';
}else{
	require __DIR__.'/view/download_success.php';
}