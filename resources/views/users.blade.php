<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
</head>
<body>
    <h1>Список пользователей</h1>
    <ul>
        @foreach($users as $u)
            <li>
                <a href="/user/{{ $u->id }}">{{ $u->full_name }}</a> ({{ $u->email }})
            </li>
        @endforeach
    </ul>
</body>
</html>