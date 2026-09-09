<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователе</title>
</head>
<body>
    <h1>Пользователь: {{ $user->full_name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <h2>Сеансы в качестве клиента:</h2>
<ul>
    @forelse($user->clientSessions as $session)
        <li>
            <a href="/session/{{ $session->id }}">Сеанс №{{ $session->id }}</a>
            (Косметолог: {{ $session->beautician->full_name ?? 'Не указан' }})
            — {{ $session->start_time }}
        </li>
    @empty
        <li>Записей нет</li>
    @endforelse
</ul>

<h2>Проведённые сеансы (как косметолог):</h2>
<ul>
    @forelse($user->beauticianSessions as $session)
        <li>
            <a href="/session/{{ $session->id }}">Сеанс №{{ $session->id }}</a>
            (Клиент: {{ $session->client->full_name ?? 'Не указан' }})
            — {{ $session->start_time }}
        </li>
    @empty
        <li>Не проводил(а) сеансов</li>
    @endforelse
</ul>
</body>
</html>