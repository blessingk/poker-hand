<?php


require_once '../vendor/autoload.php';

use Poker\Hand;
use Poker\Handler;

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['cards']) && is_string($input['cards'])) {
        $hand = new Hand($input['cards']);
        $evaluator = new Handler();
        $result = $evaluator->evaluate($hand->getCards());

        echo json_encode(['hand' => $result]);
    } else {
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
