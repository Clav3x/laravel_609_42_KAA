<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Добавление сеанса</h2>
    <form method="post" action="{{ url('session') }}">
        @csrf
        <label>Клиент</label>
        <select name="client_id">
            <option style="display:none"></option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    @if(old('client_id') == $user->id) selected
                    @endif>{{ $user->full_name }}
                </option>
            @endforeach
        </select>
        @error('client_id')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Косметолог</label>
        <select name="beautician_id">
            <option style="display:none"></option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    @if(old('beautician_id') == $user->id) selected
                    @endif>{{ $user->full_name }}
                </option>
            @endforeach
        </select>
        @error('beautician_id')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Начало</label>
        <input type="text" name="start_time" value="{{ old('start_time') }}"/>
        @error('start_time')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Окончание</label>
        <input type="text" name="end_time" value="{{ old('end_time') }}"/>
        @error('end_time')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <input type="submit">
    </form>
</body>
</html>