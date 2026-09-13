<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-42</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Редактирование сеанса</h2>
    <form method="post" action="{{ url('session/update/'.$session->id) }}">
        @csrf
        <label>Клиент</label>
        <select name="client_id">
            <option style="display:none"></option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    @if(old('client_id'))
                        @if(old('client_id') == $user->id) selected @endif
                    @else
                        @if($session->client_id == $user->id) selected @endif
                    @endif>{{ $user->full_name }}</option>
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
                    @if(old('beautician_id'))
                        @if(old('beautician_id') == $user->id) selected @endif
                    @else
                        @if($session->beautician_id == $user->id) selected @endif
                    @endif>{{ $user->full_name }}</option>
            @endforeach
        </select>
        @error('beautician_id')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Начало</label>
        <input type="text" name="start_time" value="@if (old('start_time')) {{ old('start_time') }} @else {{ $session->start_time }} @endif" />
        @error('start_time')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <label>Окончание</label>
        <input type="text" name="end_time" value="@if (old('end_time')) {{ old('end_time') }} @else {{ $session->end_time }} @endif" />
        @error('end_time')
            <div class="is-invalid">{{ $message }}</div>
        @enderror
        <br>
        <input type="submit">
    </form>
</body>
</html>