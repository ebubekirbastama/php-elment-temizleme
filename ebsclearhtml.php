<?php
function cleanHtmlElements($htmlInput, $tagsToRemoveContent = [], $tagsToRemoveAttributes = [], $tagsToRemoveEntirely = []) {
    // Remove content and the tags themselves for specified tags
    foreach ($tagsToRemoveContent as $tag) {
        $pattern = '/<' . preg_quote($tag, '/') . '\b[^>]*>(.*?)<\/' . preg_quote($tag, '/') . '>/is';
        $htmlInput = preg_replace($pattern, '', $htmlInput);
    }

    // Remove all attributes from specified tags but keep the tags themselves
    foreach ($tagsToRemoveAttributes as $tag) {
        $pattern = '/<' . preg_quote($tag, '/') . '\b[^>]*>/i';
        $replacement = '<' . $tag . '>';
        $htmlInput = preg_replace($pattern, $replacement, $htmlInput);
    }

    // Remove entire specified tags (self-closing or not)
    foreach ($tagsToRemoveEntirely as $tag) {
        $pattern = '/<' . preg_quote($tag, '/') . '\b[^>]*\/?>/i';
        $htmlInput = preg_replace($pattern, '', $htmlInput);
    }

    return $htmlInput;
}

$htmlInput = '<div id="main"><a href="example.com">Link</a><script>alert("Hello");</script><link rel="stylesheet" href="styles.css"></div>';

$tagsToRemoveContent = ['script']; // Bu etiketler tamamen içeriğiyle birlikte kaldırılacak
$tagsToRemoveAttributes = ['div', 'a']; // Bu etiketlerin öznitelikleri silinecek
$tagsToRemoveEntirely = ['link']; // Bu etiketler tamamen kaldırılacak

$cleanedHtml = cleanHtmlElements($htmlInput, $tagsToRemoveContent, $tagsToRemoveAttributes, $tagsToRemoveEntirely);

echo $cleanedHtml;
?>
