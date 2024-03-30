<div class="row">
    <div class="col-sm-8 col-lg-9">

        <div class="mb-3">
            {{ Form::label('title', null, ['class' => 'form-label']) }}
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) }}
        </div>

        <div class="row">
            <div class="col-sm-4 mb-3">
                {{ Form::label('email', null, ['class' => 'form-label']) }}
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) }}
            </div>
            <div class="col-sm-4 mb-3">
                {{ Form::label('phone', null, ['class' => 'form-label']) }}
                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone']) }}
            </div>

            <div class="col-sm-4 mb-3">
                {{ Form::label('timing', null, ['class' => 'form-label']) }}
                {{ Form::text('timing', null, ['class' => 'form-control', 'placeholder' => 'Enter timing']) }}
            </div>
        </div>


        <div class="mb-3">
            {{ Form::label('address', null, ['class' => 'form-label']) }}
            {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address', 'rows' => 3]) }}
        </div>

        <div class="mb-3">
            {{ Form::label('google_map_url', null, ['class' => 'form-label']) }}
            {{ Form::textarea('google_map_url', null, ['class' => 'form-control', 'placeholder' => 'Enter Google Map URL', 'rows' => 5]) }}
        </div>

        <div class="mb-3">
            {{ Form::label('footer_scripts', 'Extra Scripts', ['class' => 'form-label']) }}
            {{ Form::textarea('footer_scripts', null, ['class' => 'form-control', 'placeholder' => 'Add scripts for Webmaster, Analytics, Adsense, Search Console, etc.', 'rows' => 10]) }}
        </div>

        <div class="row">
            <div class="col-sm-4 mb-3">
                {{ Form::label('facebook_link', null, ['class' => 'form-label']) }}
                {{ Form::text('facebook_link', null, ['class' => 'form-control', 'placeholder' => 'Enter facebook link']) }}
            </div>
            <div class="col-sm-4 mb-3">
                {{ Form::label('twitter_link', null, ['class' => 'form-label']) }}
                {{ Form::text('twitter_link', null, ['class' => 'form-control', 'placeholder' => 'Enter twitter link']) }}
            </div>

            <div class="col-sm-4 mb-3">
                {{ Form::label('instagram_link', null, ['class' => 'form-label']) }}
                {{ Form::text('instagram_link', null, ['class' => 'form-control', 'placeholder' => 'Enter instagram link']) }}
            </div>
        </div>

    </div>
    <div class="col-sm-4 col-lg-3">
        <div class="mb-3">
            {{ Form::label('logo_file', 'Choose Logo', ['class' => 'form-label']) }}
            <label for="logo_file" class="d-block upload-image">
                <img src="{{ !empty($site->logo) ? $site->logo : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}"
                    alt="" id="logo-img-preview" loading="lazy">
                {{ Form::file('logo_file', ['class' => 'd-none', 'data-target' => '#logo-img-preview', 'data-text-target' => '#logo']) }}
            </label>
            <textarea name="logo" id="logo" class="d-none">{{ !empty($site->logo) ? $site->logo : '' }}</textarea>
        </div>
        <div class="mb-3">
            {{ Form::label('favicon_file', 'Choose Favicon', ['class' => 'form-label']) }}
            <label for="favicon_file" class="d-block upload-image">
                <img src="{{ !empty($site->favicon) ? $site->favicon : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}"
                    alt="" id="img-preview" loading="lazy">
                {{ Form::file('favicon_file', ['class' => 'd-none', 'data-target' => '#img-preview', 'data-text-target' => '#favicon']) }}
            </label>
            <textarea name="favicon" id="favicon" class="d-none">{{ !empty($site->favicon) ? $site->favicon : '' }}</textarea>
        </div>
    </div>
</div>
