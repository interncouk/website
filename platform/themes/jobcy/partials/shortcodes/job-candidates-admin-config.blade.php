<div class="form-group">
    <label class="control-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Number per page') }}</label>
    <input type="text" name="number_per_page" value="{{ Arr::get($attributes, 'number_per_page') }}" class="form-control" placeholder="{{ __('Number per page') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('style') }}</label>
    {!! Form::customSelect('style', ['list' => __('List'), 'grid' => __('Grid'), Arr::get($attributes, 'style')]) !!}
</div>
