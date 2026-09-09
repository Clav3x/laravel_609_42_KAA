<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Детали сеанса</title>
</head>
<body>
    <h1>Сеанс №{{ $session->id }}</h1>
    <p><strong>Клиент:</strong> {{ $session->client->full_name }}</p>
    <p><strong>Косметолог:</strong> {{ $session->beautician->full_name }}</p>
    <p><strong>Время:</strong> {{ $session->start_time }} — {{ $session->end_time }}</p>

    <h2>Оказанные услуги:</h2>
    <ul>
        @foreach($session->services as $service)
            <li>
                {{ $service->name }} — Фактическая цена: {{ $service->pivot->actual_price }} руб.
            </li>
        @endforeach
    </ul>

    <h2>{{ "Итого: " . ($total->total ?? 0) . " руб." }}</h2>
</body>
</html>