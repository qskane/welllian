# 如何自定义模板？


微联提供常用的几种布局模板，并会不定期新增美观实用的模板以适用更多的网站主题，
但是如果您想自定义模板，仅需简单几步也能实现。

微联两种自定义模板实现方式：

1. 基于自定义的预编译模板。
2. 基于 `API` 接口。


## 基于自定义的预编译模板

您可以在[模板信息](https://welllian.com/user/template/create)中创建模板，从而实现自定义。

模板使用基于 `PHP` 语法的 `blade模板` 编译，如果您不了解 `blade模板`，建议您[点击这里](https://laravel-china.org/docs/laravel/5.5/blade/1304)先简单熟悉一下。

在您自定义的模板中，您可以使用的变量有

- `$container` 方案信息中设置的容器值。

  - 类型：`string`

- `$consumers` 联盟消费方成员集合。

  - 类型：`Array` 
  - 示例结构 `[ ConsumerObject , ConsumerObject ]`
  - `ConsumerObject` 联盟消费方成员实例，包含属性
    - `name` 名称
    - `logo` LOGO图片
    - `url` 跳转链接
    - `description` 简短介绍

[示例代码](https://github.com/)


## 基于 `API` 接口

如果您希望显示内容更好的与您的应用结合或是使用了不能直接修改 `dom` 元素的技术，您可以考虑使用 `API` 自行组装视图。

`API` 信息如下：

- 请求地址：`https://welllian.com/api/media/YOUR-MEDIA-KEY` 请将 `YOUR-MEDIA-KEY` 替换为您的 `KEY` 值，`KEY` 值可以在查看媒体页面获取。
- 请求方式：`GET`
- 请求成功标志：`HTTP` 状态码为 `200`。 
- 请求成功返回结果类型：`json`

  成功结果示例：
  
    ```json
    {
    
      "parsed_consumers":[
          {
            "template":"<div>example</div>",
            "container":"my-container-name"
          }
      ],
      "origin_consumers":[
        {
          "name":"my-scheme-name",
          "container":"my-container-name",
          "data":{
            "name":"consumer-name",
            "logo":"https://example.com/logo.jpg",
            "url":"https://welllian.com/link/league",
            "description":"Awesome description"
          }
        }
      ]
    }
    ```
- 请求失败标志：`HTTP` 状态码非 `200`，状态码含义请参见 [https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html](https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html)。 
