<?php

$a = 0;
$b = 0;
echo "Задание 1 <br>";
for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;

    
    echo "Step $i: a = $a, b = $b<br>";
}

echo "End of the loop: a = $a, b = $b <br><br>";

echo "Задание 2 <br>";

$a = 0;
$b = 0;
$i = 0;

while ($i <= 5) {
    $a += 10;
    $b += 5;

    
    echo "Step $i: a = $a, b = $b<br>";

    $i++;
}

echo "End of the loop: a = $a, b = $b <br><br>";

echo "Задание 3 <br>";

$numbers = []; 


for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}


echo "<pre>";
print_r($numbers);
echo "</pre> <br><br>";

echo "Задание 4 <br>";

class Transaction {
    public $id;
    public $date;
    public $amount;
    public $description;
    public $merchant;

    public function __construct($id, $date, $amount, $description, $merchant) {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->description = $description;
        $this->merchant = $merchant;
    }
}

// Создание массива объектов транзакций
$transactions = [
    new Transaction(1, "2019-01-01", 100.00, "Payment for groceries", "SuperMart"),
    new Transaction(2, "2020-02-15", 75.50, "Dinner with friends", "Local Restaurant"),
    new Transaction(3, "2021-06-23", 200.00, "Electronics purchase", "TechStore"),
    new Transaction(4, "2022-11-10", 50.25, "Taxi fare", "CityTaxi"),
    new Transaction(5, "2023-03-05", 150.75, "Gym membership", "FitnessClub"),
];

// Функция для подсчета общей суммы транзакций
function calculateTotalAmount($transactions) {
    return array_reduce($transactions, function($carry, $item) {
        return $carry + $item->amount;
    }, 0);
}

// Функция для вычисления среднего значения транзакций
function calculateAverage($transactions) {
    $total = calculateTotalAmount($transactions);
    return count($transactions) > 0 ? $total / count($transactions) : 0;
}

// Функция для получения массива описаний транзакций
function mapTransactionDescriptions($transactions) {
    return array_map(function($item) {
        return $item->description;
    }, $transactions);
}
?>

<table border="1">
    <tr style="background-color: #a6a6a6; color: #252525">
        <th colspan="5">Транзакции</th>
    </tr>
    <tr style="background-color: #a6a6a6; color: #252525">
        <th>ID</th>
        <th>Дата</th>
        <th>Сумма</th>
        <th>Описание</th>
        <th>Организация</th>
    </tr>
    <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?php echo $transaction->id; ?></td>
            <td><?php echo $transaction->date; ?></td>
            <td><?php echo number_format($transaction->amount, 2); ?></td>
            <td><?php echo $transaction->description; ?></td>
            <td><?php echo $transaction->merchant; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p><strong>Общая сумма транзакций:</strong> <?php echo number_format(calculateTotalAmount($transactions), 2); ?></p>
<p><strong>Средняя сумма транзакций:</strong> <?php echo number_format(calculateAverage($transactions), 2); ?></p>
<p><strong>Описание всех транзакций:</strong> <?php echo implode(", ", mapTransactionDescriptions($transactions)); ?></p>