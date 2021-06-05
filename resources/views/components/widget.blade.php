<div {{ $attributes->merge(['class' => 'card card-statistic-1']) }}>
    <div class="card-icon bg-{{ $type }}">
        <i class="{{ $icon }}"></i>
    </div>
    <div class="card-wrap">
        <div class="card-header">
            <h4>{{ $title }}</h4>
        </div>
        <div class="card-body">
            {{ $value }}
        </div>
    </div>
</div>
