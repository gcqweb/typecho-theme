    // 文章颜色
    window.onload = function () {

        try {
            // 获取文章头部图片主色，需要先引入color-thief.js
            const alfa = '0.1';
            const alpha = '0.5';
            // BETTER 👍
            const colorThief = new ColorThief();
            const img = document.querySelector('#banner');
            if (img.complete) {
                const most_colors = colorThief.getColor(img);
                const rgbs = colorThief.getPalette(img, 4);
                console.log(`主色：rgb(${most_colors.join(', ')})`);

                // 公式转换rgba->rgb, (1-透明度)*255+透明度*r/g/b/ 
                const postbg = `rgb(${most_colors.join(', ')},${alfa})`;
                const postcolor = `rgb(${rgbs[1].join(', ')},${alfa})`;
                const postcolor2 = `rgb(${rgbs[2].join(', ')},${alpha})`;
                const postcolor3 = `rgb(${rgbs[3].join(', ')},${alpha})`;
                // const postfontcolor = `rgb(${rgbs[2].join(', ')})`;

                const postbgafter = `rgb(${(1 - alfa) * 255 + alfa * most_colors[0]},${(1 - alfa) * 255 + alfa * most_colors[1]},${(1 - alfa) * 255 + alfa * most_colors[2]})`;
                // const postbgafter = `rgb(${(1 - alpha) * 255 + alpha * most_colors[0]},${(1 - alpha) * 255 + alpha * most_colors[1]},${(1 - alpha) * 255 + alpha * most_colors[2]})`;

                // 将变量赋值给body
                document.documentElement.style.setProperty('--postbg', postbg);
                document.documentElement.style.setProperty('--postcolor', postcolor);
                document.documentElement.style.setProperty('--postcolor2', postcolor2);
                document.documentElement.style.setProperty('--postcolor3', postcolor3);
                document.documentElement.style.setProperty('--postbgafter', postbgafter);
                // document.documentElement.style.setProperty('--postfontcolor', postfontcolor);

                const style = `.note_banner::after {background: linear-gradient(to top, ${postbgafter} 0, rgba(255, 255, 255, 0) 100%);}`;
                // 将样式添加到页面中
                const styleElement = document.createElement('style');
                styleElement.innerHTML = style;
                document.head.appendChild(styleElement);

                console.log(postbgafter + 'after');
                // console.log(rgbs, '颜色');

            }
            else {
                img.addEventListener('load', function () {
                    // console.log(colorThief.getColor(img));
                    return colorThief.getPalette(img, 4)
                });
            }
        } catch (e) {
            
            console.log(e);
        }
    }