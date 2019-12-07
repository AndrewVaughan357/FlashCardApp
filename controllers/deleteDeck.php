<?php


	session_start();

	include('../models/DBConnect.php');
	include('../models/DBFunctions.php');

	if(!isset($_GET['DeckID'])){
		exit();
	}
	else{
		$deckID = $_GET['DeckID'];
	}

	DeleteDeck($deckID);

	header("Location: ../views/myDecks.php");
	

?>