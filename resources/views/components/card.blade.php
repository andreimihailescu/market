<div class="card" style="width: 18rem;">
    <?php // $src = 'https://picsum.photos/300?' . md5(rand()) ?>
    <img src="/img/default-thumbnail.png" data-src="{{ $src }}" data-srcset="{{ $src }}" class="card-img-top lazy" alt="{{ $title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $description }}</p>
        {{ $slot }}
{{--        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
    </div>
</div>
