# 如何自定义模板？


微联提供常用的几种布局模板，并会不定期新增美观实用的模板以适用更多的网站主题，
但是如果您想自定义模板，仅需简单几步也能实现。

微联两种自定义模板实现方式：

1. 基于浏览器`javascript`加载的预编译模板。
2. 基于服务器的`API`接口。


## 基于浏览器`javascript`加载的预编译模板

模板使用基于`PHP`语法的 [`blade模板`](https://laravel-china.org/docs/laravel/5.5/blade/1304) 编译，如果您不了解[`blade模板`](https://laravel-china.org/docs/laravel/5.5/blade/1304)，建议您[点击这里](https://laravel-china.org/docs/laravel/5.5/blade/1304)先简单熟悉一下。

在您自定义的模板中，您可以使用的变量有

- `$container` 值为方案信息中的容器值。

  - 类型：`string`

- `$consumers` 值为联盟消费方成员集合。

  - 类型：`Array` 
  - 示例结构 `[ ConsumerObject , ConsumerObject ]`
  - `ConsumerObject` 联盟消费方成员实例包含属性
    - `name` 名称
    - `logo` LOGO图片
    - `url`
    - `description`
