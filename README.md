# PHP HTML Element Cleaner

This PHP script provides a dynamic function to clean specific HTML tags and their attributes based on user-defined preferences. The script offers the following functionalities:

1. **Remove specified tags and their content**: For example, you can remove all `<script>` tags along with their enclosed JavaScript code.
2. **Strip attributes from specified tags**: You can remove all attributes from tags like `<div>` or `<a>`, leaving only the plain tags.
3. **Completely remove specified tags**: This allows you to entirely remove tags like `<link>` from the HTML.

## Usage

### Example

```php
<?php
require 'path/to/your/script.php';

$htmlInput = '<div id="main"><a href="example.com">Link</a><script>alert("Hello");</script><link rel="stylesheet" href="styles.css"></div>';

$tagsToRemoveContent = ['script']; // Tags and their content will be removed
$tagsToRemoveAttributes = ['div', 'a']; // Attributes will be removed, tags will remain
$tagsToRemoveEntirely = ['link']; // Tags will be removed entirely

$cleanedHtml = cleanHtmlElements($htmlInput, $tagsToRemoveContent, $tagsToRemoveAttributes, $tagsToRemoveEntirely);

echo $cleanedHtml;
?>
```
###  Output
The script will produce the following output:
```html
<div><a></a></div>
```
