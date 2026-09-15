<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
</head>
<body>
    <h2>Список сеансов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Клиент</td>
            <td>Косметолог</td>
            <td>Начало</td>
            <td>Окончание</td>
            <td>Действия</td>
        </thead>
        @foreach ($sessions as $session)
            <tr>
                <td>{{ $session->id }}</td>
                <td>{{ $session->client->full_name }}</td>
                <td>{{ $session->beautician->full_name }}</td>
                <td>{{ $session->start_time }}</td>
                <td>{{ $session->end_time }}</td>
                <td>
                    <a href="{{ url('session/destroy/'.$session->id) }}">Удалить</a>
                    <a href="{{ url('session/edit/'.$session->id) }}">Редактировать</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $sessions->links() }}
</body>
</html>