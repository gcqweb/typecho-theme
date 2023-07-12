function themeInit($archive) {
    if ($archive->is('category', 'list')) {
        $archive->parameter->pageSize = 15; // 自定义条数
    }
}