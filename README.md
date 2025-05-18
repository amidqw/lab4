# lab4 Пономарь Дмитрий
## 1. Инструкции по запуску проекта
1. Скачайте проект и разместите файлы в директории веб-сервера:
`git clone https://github.com/ваш-репозиторий.git`
2. Запустите сервер:
   `php -S localhost:8000`
4. Откройте в браузере:
   `http://localhost:8000`
## 2. Описание лабораторной работы   
__Цель:__ Изучить основы работы с циклами, массивами и функциями в PHP. Научиться использовать ассоциативные массивы, генерировать данные с помощью циклов и выполнять базовые операции с файловой системой.

1. Реализовать циклы for и while с выводом промежуточных значений

2. Создать и обработать массивы

3. Разработать функции для обработки транзакций

4. Реализовать галерею изображений с обработкой файловой системы
## 3. Краткая документация к проекту 
<table>
    <tr>
        <th>Файл</th>
        <th>Описание</th>
    </tr>
    <tr>
        <td>index.php</td>
        <td>Решение с 1 по 4 задания</td>
    </tr>
    <tr>
       <td>indexcat.php</td>
      <td>Решение 5 задания </td>
    </tr>
     <tr>
        <td>image</td>
        <td>Папка с изображениями для галереи</td>
    </tr>
</table>

## 4. Примеры использования проекта с приложением скриншотов или фрагментов кода

1.Рeализация цикла for:

```php
$a = 0;
$b = 0;
echo "Задание 1 <br>";
for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;

    
    echo "Step $i: a = $a, b = $b<br>";
}

echo "End of the loop: a = $a, b = $b <br><br>";
```
Скриншот:

![image](https://github.com/user-attachments/assets/3b294ef5-4a48-4312-9aa2-b1eae18dfcaf)


2. Реализация цикла while:
```php
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
```
Скриншот:

![image](https://github.com/user-attachments/assets/7a9fffd5-6ae3-4e04-855a-274f6c67e65b)


3. Работа с массивами:
```php 
  echo "Задание 3 <br>";

$numbers = []; 


for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}


echo "<pre>";
print_r($numbers);
echo "</pre> <br><br>";
  ```

Скриншот:

![image](https://github.com/user-attachments/assets/0ce8c8b6-c978-4f25-9d22-8b61b4b7afb4)


4. Ассоциативные массивы и функции:

Вывод транзакций

  ```php
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


$transactions = [
    new Transaction(1, "2019-01-01", 100.00, "Payment for groceries", "SuperMart"),
    new Transaction(2, "2020-02-15", 75.50, "Dinner with friends", "Local Restaurant"),
    new Transaction(3, "2021-06-23", 200.00, "Electronics purchase", "TechStore"),
    new Transaction(4, "2022-11-10", 50.25, "Taxi fare", "CityTaxi"),
    new Transaction(5, "2023-03-05", 150.75, "Gym membership", "FitnessClub"),
];


function calculateTotalAmount($transactions) {
    return array_reduce($transactions, function($carry, $item) {
        return $carry + $item->amount;
    }, 0);
}


function calculateAverage($transactions) {
    $total = calculateTotalAmount($transactions);
    return count($transactions) > 0 ? $total / count($transactions) : 0;
}


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
   ```
Скриншот:

![image](https://github.com/user-attachments/assets/580cae73-3870-49fe-8612-c360f2134589)


5. Работа с файловой системой:
   
   Галерея изображений
   
   ```php
   foreach ($files as $file) {
            if ($file != "." && $file != ".." && preg_match('/\.(jpg|jpeg)$/i', $file)) {
                $path = $dir . $file;
                echo "<img src='$path' alt='cat image'>";
            }
        }
    ```

Скриншот:

![image](https://github.com/user-attachments/assets/8b805d85-445d-4657-890b-92bf582bfe0a)


## 5. Ответы на контрольные вопросы

1. Что делает цикл for ?

   Цикл for выполняет блок кода заданное количество раз.

2. Разница между while и for ?

   У while количетсво итераций зависит от условия. For же используется, когда известен точный диапазон итераций.

3. Как сгенерировать массив случайных  чисел ?

   ```php
   for($i=0; $i<100; $i++){
   $numbers[] = rand(1, 100); }
   ```

4. Что такое ассоциативный массив ?

   Это массив, в котором ключи представлены строками.

5. Как задать путь в папку с изображением ?

  ```php
  $dir = 'image/';
  ```
   
## 6. Список использованных источников

   1. https://skillbox.ru/media/code/yazyk-razmetki-markdown-shpargalka-po-sintaksisu-s-primerami/
      
   2. https://gist.github.com/Jekins/2bf2d0638163f1294637

   3. https://proglib.io/p/samouchitel-dlya-nachinayushchih-kak-osvoit-php-s-nulya-za-30-minut-2021-02-08
