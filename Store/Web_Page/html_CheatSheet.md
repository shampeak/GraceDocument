HTML 速查列表
> HTML 基本用法总结







```
<!DOCTYPE html>
<html>
<head>
<title>Title of document goes here</title>
</head>
<body>
Visible text goes here...
</body>
</html>
```



## 基本标签(Basic Tags)
- <h1>Largest Heading</h1>
- <h2> . . . </h2>
- <h3> . . . </h3>
- <h4> . . . </h4>
- <h5> . . . </h5>
- <h6>Smallest Heading</h6>
- <p>This is a paragraph.</p>
- <br> (line break)
- <hr> (horizontal rule)
<!-- This is a comment -->

## 文本格式化（Formatting）
- <b>Bold text</b>
- <code>Computer code</code>
- <em>Emphasized text</em>
- <i>Italic text</i>
- <kbd>Keyboard input</kbd>
- <pre>Preformatted text</pre>
- <small>Smaller text</small>
- <strong>Important text</strong>
- <abbr> (abbreviation)
- <address> (contact information)
- <bdo> (text direction)
- <blockquote> (a section quoted from another source)
- <cite> (title of a work)
- <del> (deleted text)
- <ins> (inserted text)
- <sub> (subscripted text)
- <sup> (superscripted text)

## 链接（Links）
- Ordinary link: <a href="http://www.example.com/">Link-text goes here</a>
- Image-link: <a href="http://www.example.com/"><img src="URL" alt="Alternate Text"></a>
- Mailto link: <a href="mailto:webmaster@example.com">Send e-mail</a>

## Bookmark:
- <a id="tips">Tips Section</a>

- <a href="#tips">Jump to the Tips Section</a>
- 图片（Images）

<img src="URL" alt="Alternate Text" height="42" width="42">
- 样式（Styles/Sections）

```
<style type="text/css">
  h1 {color:red;}
  p {color:blue;}
</style>

<div>A block-level section in a document</div>
<span>An inline section in a document</span>
```

- Unordered list

```
<ul>
  <li>Item</li>
  <li>Item</li>
</ul>
```

- Ordered list

```
<ol>
  <li>First item</li>
  <li>Second item</li>
</ol>
```

- Definition list

```
<dl>
  <dt>Item 1</dt>
    <dd>Describe item 1</dd>
  <dt>Item 2</dt>
    <dd>Describe item 2</dd>
</dl>
```

- Tables


```
<table border="1">
  <tr>
    <th>table header</th>
    <th>table header</th>
  </tr>
  <tr>
    <td>table data</td>
    <td>table data</td>
  </tr>
</table>
```

- 框架（Iframe）


```
<iframe src="demo_iframe.htm"></iframe>
```

- 表单（Forms）

```
<form action="demo_form.asp" method="post/get">

<input type="text" name="email" size="40" maxlength="50">
<input type="password">
<input type="checkbox" checked="checked">
<input type="radio" checked="checked">
<input type="submit" value="Send">
<input type="reset">
<input type="hidden">
<select>
<option>Apples</option>
<option selected="selected">Bananas</option>
<option>Cherries</option>
</select>

<textarea name="comment" rows="60" cols="20"></textarea>

</form>
```

- Entities

```
&lt; is the same as <
&gt; is the same as >
© is the same as ©
```
