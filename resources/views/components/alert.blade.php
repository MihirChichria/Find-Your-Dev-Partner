@props([
'alert' => 'info'
])

<div class="alert alert-custom alert-{{($alert=='error')?'danger':'success'}} fade show" role="alert">
    <div class="alert-icon"><i class="{{ ($alert=='error')?'flaticon-info':'flaticon2-check-mark' }}"></i></div>
    <div class="alert-text">{{ $slot }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
