<?php

return [
    'GET v1/authors' => 'v1/author',
    'GET v1/authors/<authorId:\d+>/articles' => 'v1/article/index-by-author',
    'GET v1/articles' => 'v1/article/index',
];
