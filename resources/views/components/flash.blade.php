@if (session()->has('error'))
<div class="message-alert alert alert-danger bg-danger-600 text-white border-danger-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
    {{ session('error') }}
    <button class="remove-button text-white text-xxl line-height-1">
        <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
    </button>
</div>    
@endif

@if (session()->has('success'))
<div class="message-alert alert alert-success bg-success-600 text-white border-success-600 px-24 py-11 mb-0 fw-semibold text-lg radius-8 d-flex align-items-center justify-content-between" role="alert">
    {{ session('success') }}
    <button class="remove-button text-white text-xxl line-height-1">
        <iconify-icon icon="iconamoon:sign-times-light" class="icon"></iconify-icon>
    </button>
</div>
@endif

@push('scripts')    
<script>
    $(".remove-button").on("click", function() {
        $(this).closest(".alert").addClass("d-none")
    });
</script>
@endpush