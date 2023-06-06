@php
    if ($type === 'error') {
        $title = 'Erro!';
    } elseif ($type === 'success') {
        $title = 'Tudo certo!';
        $messages[] = $message;
    }
@endphp

<div class="position-relative" aria-live="polite" aria-atomic="true">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @foreach ($messages as $message)
            @php $message = is_array($message) ? $message[0] : $message; @endphp
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    @if ($type === 'error')
                        <i class="bi bi-x-circle-fill me-2 text-danger"></i>
                    @elseif ($type === 'success')
                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                    @endif
                    <strong class="me-auto">{{ $title }}</strong>
                    <button class="btn-close" data-bs-dismiss="toast" type="button" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">{{ $message }}</div>
            </div>
        @endforeach
    </div>
</div>
