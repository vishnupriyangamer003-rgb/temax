{{-- Inner page banner (Velss "Breadcrumbs" band): title + breadcrumb --}}
<section class="page-title">
    <div class="outer-container">
        <div class="content-box">
            <h1>{{ $pageTitle }}</h1>
            <ul class="bread-crumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="flaticon-right"></i></li>
                <li><span>{{ $pageTitle }}</span></li>
            </ul>
        </div>
    </div>
</section>
