@if (count($errors) > 0)
    <notify-component :message-bag="{
        title: '錯誤訊息',
        type: 'error',
        text: {{ json_encode(session()->pull('errors')->all()) }}
    }"></notify-component>
@elseif(session('success'))
    <notify-component :message-bag="{
        title: '系統訊息',
        type: 'success',
        text: {{ json_encode(session()->pull('success')) }}
    }"></notify-component>
@endif