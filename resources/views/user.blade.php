<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
</head>
<body>
    <h1>Пользователь: {{ $user->full_name }}</h1>
    <p>Email: {{ $user->email }}</p>

    <h2>Сеансы клиента:</h2>
    <ul>
        @forelse($user->sessions as $session)
            <li>
                <a href="/session/{{ $session->id }}">Сеанс №{{ $session->id }}</a>
                — Начало: {{ $session->start_time }}
            </li>
        @empty
            <li>У данного клиента нет записанных сеансов.</li>
        @endforelse
    </ul>
</body>
</html>