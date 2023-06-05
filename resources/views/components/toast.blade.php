@php
    if (isset($validationErrors)) {
        $title = 'Erro!';
        $messages = $validationErrors;
    } else {
        $messages = is_array($message) ? $message : [$message];
    }
@endphp

<div class="position-relative" aria-live="polite" aria-atomic="true">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @foreach ($messages as $message)
            @php
                $userMessage = is_array($message) ? $message[0] : $message;
            @endphp
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    @if (isset($validationErrors))
                        <i class="bi bi-x-circle-fill me-2 text-danger"></i>
                    @else
                        <i class="bi bi-check-circle-fill me-2 text-success"></i>
                    @endif

                    <strong class="me-auto">{{ $title }}</strong>
                    <button class="btn-close" data-bs-dismiss="toast" type="button" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">
                    {{ $userMessage }}
                </div>
            </div>
        @endforeach
    </div>
</div>
