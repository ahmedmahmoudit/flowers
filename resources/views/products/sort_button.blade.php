<div class="col-md-3 col-xs-6 {{ app()->getLocale() == 'en' ? 'pull-right' : 'pull-left' }}">
    <div class="form-group">
        <label class="control-label c-font-uppercase c-font-bold
{{ app()->getLocale() == 'en' ? 'pull-right' : 'pull-left' }}
">{{ __('Sort By') }}</label>
{{--        <label class="control-label {{ app()->getLocale() == 'en' ? 'pull-right' : 'pull-left' }}">{{ __('Sort By') }}</label>--}}
        <select class="form-control sort c-square c-theme input-lg" name="sort" id="sort">
            <option value="" {{ $sort == '' ? 'selected' : '' }} >{{ __('Relevance') }}</option>
            <option value="best-sellers" {{ $sort == 'best-sellers' ? 'selected' : '' }} >{{ __('Best Sellers') }}</option>
            <option value="price-l-h" {{ $sort == 'price-l-h' ? 'selected' : '' }}>{{ __('Price (Low - High)') }}</option>
            <option value="price-h-l" {{ $sort == 'price-h-l' ? 'selected' : '' }}>{{ __('Price (High - Low)') }}</option>
        </select>
    </div>
</div>

