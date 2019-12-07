<?php
	session_start();
	include_once('../models/DBConnect.php');
    include_once('../models/DBFunctions.php');

	if(isset($_GET['DeckID'])){
		$deckID = $_GET['DeckID'];
		 $deck = GetDeckByID($deckID);
    	include_once('../views/newDeck.php');
	}


   

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$deckID = trim(filter_input(INPUT_POST, 'deckID', FILTER_VALIDATE_INT));
		$deckName = trim(filter_input(INPUT_POST, 'deck-name', FILTER_SANITIZE_STRING));
		$description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
		$categoryID = trim(filter_input(INPUT_POST, 'categories', FILTER_VALIDATE_INT));


		if(empty($deckName) || empty($description))
		{

			header("Location: ../views/myDecks.php");
		}
		else
		{
			
			if(isset($_POST['if-public'])){
				$ifPublic = 1;
			}
			else{
				$ifPublic = 0;
			}
			EditDeck($deckID, $deckName, $description, $ifPublic, $categoryID);

			
			header("Location: ../views/myDecks.php");
		}


	}
	
?>