
    let scrwidth = window.innerWidth
    if (scrwidth > 700) {
        const articleContainer = document.querySelector('.post_content');
        // 给文章标题的a链接添加点击事件
        document.querySelectorAll('.Tree-content').forEach(link => {
            link.addEventListener('click', function (event) {
                console.log(scrwidth)
                // articleContainer.style.display = 'block'; // 显示art-con的div
                event.preventDefault(); // 阻止默认跳转行为
                // 获取文章链接
                const articleUrl = this.href;
                // 清除之前的数据
                articleContainer.innerHTML = '';
                // 添加loading效果
                articleContainer.innerHTML = '<div class="loading">获取文章...</div>';
                // 发送请求获取文章
                let isTimeout = false;
                const timeoutId = setTimeout(() => {
                    isTimeout = true;
                    articleContainer.innerHTML = '<div class="error">文章获取超时！</div>';
                }, 5000);
                fetch(articleUrl)
                    .then(response => response.text())
                    .then(data => {
                        if (isTimeout) {
                            return; // 如果请求已经超时，不再处理请求结果
                        }
                        clearTimeout(timeoutId); // 取消超时计时器
                        // 获取文章内容
                        const articleDetails = new DOMParser().parseFromString(data, 'text/html').querySelector('.share_details');
                        // 渲染文章内容到div中
                        articleContainer.innerHTML = '';
                        articleContainer.appendChild(articleDetails);
                        articleContainer.style.display = 'block'; // 显示art-con的div
                    })
                    .catch(error => {
                        console.error(error);
                        articleContainer.innerHTML = '<div class="error">未完成加载，请重试！.</div>';
                    });
            });
        });
        

        // 点击页面其他区域隐藏art-con的div
        document.addEventListener('click', function (event) {
            if (!event.target.closest('.post_content') && articleContainer.style.display === 'block') {
                articleContainer.style.display = 'none';
            }
        });

        // 阻止的div上的点击事件冒泡
        articleContainer.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    }
    
    
