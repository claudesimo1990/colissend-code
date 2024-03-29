<header class="header-image page-header">
    {{ getHeaderImage() }}
    <div class="container px-5">
        <div class="row gx-5 search-card-box pt-5 align-items-center justify-content-center">
            <div class="col-lg-8 gx-5 col-xl-7 col-xxl-6">
                <div class="text-center header-block-title text-xl-start">
                    <h1 class="display-5 fw-bolder text-success mb-2">@lang('site.header.with_colissend')</h1>
                    <p class="lead fw-bold text-success mb-4">@lang('site.header.body_why_use_colissend')
                    </p>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"></div>
        </div>
        <div class="row mt-5">
            <search-component location="home"></search-component>
        </div>
    </div>
</header>
