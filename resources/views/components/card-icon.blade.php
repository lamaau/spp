<div class="card card-large-icons">
    <div class="card-icon bg-{{ $type }} text-white">
        <i class="{{ $icon }}"></i>
    </div>
    <div class="card-body">
        <h4>{{ $title }}</h4>
        <p>{{ $description }}</p>
        <a href="{{ $linkRoute }}" class="card-cta text-primary">
            {{ $linkText }}
            <i class="{{ $linkIcon }}"></i>
        </a>
    </div>
</div>
