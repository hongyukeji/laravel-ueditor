<!-- 配置文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ asset('vendor/ueditor/ueditor.all.min.js') }}"></script>
@if($locale = strtolower(config('app.locale','zh-CN')))
<script type="text/javascript" src="{{ asset("vendor/ueditor/lang/{$locale}/{$locale}.js") }}"></script>
@endif
<script>
    window.UEDITOR_CONFIG.serverUrl = '{{ @route_url(config('ueditor.route.name')) ?? config('ueditor.route.name') }}'
</script>