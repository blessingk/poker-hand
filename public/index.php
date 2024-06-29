<?php

require_once '../src/Poker/Hand.php';
require_once '../src/Poker/Handler.php';

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['cards']) && is_array($input['cards'])) {
        $hand = new \Poker\Hand($input['cards']);
        $evaluator = new \Poker\Poker\Handler();
        $result = $evaluator->evaluate($hand->getCards());

        echo json_encode(['hand' => $result]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
