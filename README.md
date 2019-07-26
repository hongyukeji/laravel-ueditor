<h1 align="center"> laravel-ueditor </h1>

<p align="center"> .</p>


## Installing

```shell
$ composer require hongyukeji/laravel-ueditor -vvv
$ php artisan vendor:publish --provider="Hongyukeji\LaravelUEditor\UEditorServiceProvider"
```

## Usage

- in your <head> block just put

```
@include('UEditor::assets')
```

```html
<!-- 加载编辑器的容器 -->
<script id="container" name="content" type="text/plain">这里写你的初始化内容</script>

<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
```

- Ueditor官方文档: [https://github.com/fex-team/ueditor/](https://github.com/fex-team/ueditor/)

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/hongyukeji/laravel-ueditor/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/hongyukeji/laravel-ueditor/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT