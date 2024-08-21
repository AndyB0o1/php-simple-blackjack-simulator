<?php

declare(strict_types=1);

function getBlackjackWinner(int $pOneScore, int $pTwoScore): string
{
    if ($pOneScore === $pTwoScore) {
        return 'It\'s a draw <br />';
    }

    $playerOneIsBust = $pOneScore > 21;
    $playerTwoIsBust = $pTwoScore > 21;

    if ($playerOneIsBust && !$playerTwoIsBust) {
        return 'Player 1 is bust so Player 2 wins!<br />';
    } elseif ($playerTwoIsBust && !$playerOneIsBust) {
        return 'Player 2 is bust so Player 1 wins! <br />';
    }

    if ($pOneScore > $pTwoScore) {
        return 'Player 1 wins !<br />';
    } else {
        return 'Player 2 wins !<br />';
    }
}

function deckBuilder(): array
{
    $deck = [];
    $points = [21, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10];
    $cards = ['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10,
        'Jack', 'Queen', 'King'];
    $suits = ['Hearts', 'Spades', 'Diamonds', 'Clubs'];

    foreach ($suits as $suit) {
        foreach ($cards as $key => $card) {
            $deck[] = ['card' => $card . ' of ' . $suit . '<br />', 'score' => $points[$key]];
        }
    }
    return $deck;
}

$deck = deckBuilder();

shuffle($deck);
$playerOneCards = array_slice($deck, 0, 2);

shuffle($deck);
$playerTwoCards = array_slice($deck, 0, 2);

$pOneScore = 0;
$pTwoScore = 0;

echo "<h1>Blackjack game</h1>";

echo"<h2>Player 1 cards</h2>";
foreach ($playerOneCards as $card) {
    $pOneScore += $card['score'];
    echo 'Player 1 got a ' . $card['card'];
}

echo"<h2>Player 2 cards</h2>";
foreach ($playerTwoCards as $card) {
    $pTwoScore += $card['score'];
    echo 'Player 2 got a ' . $card['card'];
}

echo"<h2>The scores are:</h2>";
echo "Player 1 got $pOneScore points </br>";
echo "Player 2 got $pTwoScore points </br>";

echo"<h2>The final result is....</h2>";
echo getBlackjackWinner($pOneScore, $pTwoScore);
echo "<br>";
echo "<form action='' method='POST'>
<input type='submit' name='submit' value='Deal again..'>
</form>";