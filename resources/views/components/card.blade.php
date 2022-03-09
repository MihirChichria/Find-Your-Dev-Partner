@props([
    'title' => 'Title',
    'footer' => ''
])

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title"> {{ $title }} </h3>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer">
        {{ $footer }}
    </div>
</div>


