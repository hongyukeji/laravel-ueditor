<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.config.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.all.js') }}"></script>
@if($locale = strtolower(config('app.locale','zh-CN')))
<script type="text/javascript" src="{{ asset("vendor/ueditor/lang/{$locale}/{$locale}.js") }}"></script>
@endif