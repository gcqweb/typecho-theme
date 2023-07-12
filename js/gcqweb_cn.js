
// 网页框架加载完隐藏loading
const timer = document.querySelector('.timer');
timer.style.display = 'none';

// // 导航栏下滑隐藏class，上滑显示class
// 获取header元素
const header = document.querySelector('header');
let prevScrollPos = window.scrollY || window.pageYOffset;
// 监听滚动事件
window.addEventListener('scroll', () => {
  const currentScrollPos = window.scrollY || window.pageYOffset;
  // 判断滚动方向
  if (prevScrollPos < currentScrollPos && currentScrollPos > 200) {
    // 向上滚动，显示header
    header.classList.add('scrollUp');
  } else {
    // 向下滚动，隐藏header
    header.classList.remove('scrollUp');
  }
  prevScrollPos = currentScrollPos;
});
// // 导航栏二级菜单展开/收缩
// const navMenuItems = document.querySelectorAll('.navMeun > ul > li');
// navMenuItems.forEach(navMenuItem => {
//     navMenuItem.addEventListener('mouseenter', () => {
//         // navMenuItem.children[1].style.display = 'block';

//         // navMenuItem.children[1].style.height = 'auto';
//         // const height = navMenuItem.children[1].clientHeight + 'px';
//         // navMenuItem.children[1].style.height = '0';
//         // navMenuItem.children[1].style.overflow = 'hidden';
//         // navMenuItem.children[1].style.transition = 'height 0.2s ease-in-out';
//         // setTimeout(() => {
//         //     navMenuItem.children[1].style.height = height;
//         // }, 0);
//     });
//     navMenuItem.addEventListener('mouseleave', () => {
//         // navMenuItem.children[1].style.display = 'none';
//         // navMenuItem.children[1].style.height = '0';
//         // navMenuItem.children[1].style.overflow = 'hidden';
//         // navMenuItem.children[1].style.transition = 'height 0.15s ease-in-out';
//     });
// });


// // 侧边栏原生js，打开/隐藏----------------
//         const sidebar = document.getElementById('sidebar'); // 获取侧边栏元素  
//         const toggleButton = document.getElementById('toggle-sidebar'); // 获取按钮元素  
//         let isOpen = false; // 是否展开侧边栏的标志位  
//         toggleButton.addEventListener('click', () => {
//             isOpen = !isOpen; // 切换标志位状态  
//             sidebar.classList.toggle('active', isOpen); // 切换侧边栏展开状态  
//         });
//         // 监听侧边栏之外的点击事件，隐藏侧边栏  
//         document.addEventListener('click', (event) => {
//             if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) { // 如果点击事件不是在侧边栏或按钮上发生的，则隐藏侧边栏  
//                 isOpen = false; // 切换标志位状态为false，即隐藏侧边栏  
//                 sidebar.classList.remove('active'); // 移除侧边栏的active类，使其隐藏起来  
//             }
//         });  

// 返回顶部
try {
  const btn = document.querySelector('.scroll-top');
  const toggleBtnVisibility = () => {
    if (window.pageYOffset > 500) {
      btn.classList.add('show');
    } else {
      btn.classList.remove('show');
    }
  };

  const scrollToTop = () => {
    const scrollOptions = {
      top: 0,
      behavior: 'smooth'
    };

    if ('scrollBehavior' in document.documentElement.style) {
      window.scrollTo(scrollOptions);
    } else {
      document.documentElement.scrollIntoView(scrollOptions);
    }
  };

  window.addEventListener('scroll', toggleBtnVisibility);
  btn.addEventListener('click', scrollToTop);
} catch (e) { }
// 返回顶部end
// ==============================

// 快捷键聚焦输入框
document.addEventListener('keydown', function (event) {
  // Ctrl+K聚焦搜索框
  if (event.ctrlKey && event.key === 'k') {
    event.preventDefault(); // 阻止默认行为
    const searchBox = document.getElementById('s');
    if (searchBox) {
      searchBox.focus(); // 聚焦搜索框
    }
  }
  //   按下‘/’键，聚焦评论框
  if (event.key === '/') {
    event.preventDefault(); // 阻止默认行为
    const textareaBox = document.getElementById('textarea');
    if (textareaBox) {
      textareaBox.focus(); // 聚焦搜索框
    } else {
      const textareaBox = document.getElementById('comment');
      if (textareaBox) {
        textareaBox.focus(); // 聚焦搜索框
      }
    }
  }
  //   按下Esc键使当前输入框失焦
  if (event.key === 'Escape') { // 按下Esc键
    const activeElement = document.activeElement;
    if (activeElement && (activeElement.tagName === 'INPUT' || activeElement.tagName === 'TEXTAREA')) {
      activeElement.blur(); // 将当前聚焦的输入框失去焦点
    }
  }
  //   按下Ctrl+回车键，提交表单按钮
  if (event.ctrlKey && event.key === 'Enter') { // 按下Ctrl+回车键
    event.preventDefault(); // 阻止默认行为
    const submitBtn = document.getElementsByClassName('submit');
    if (submitBtn) {
      submitBtn[0].click(); // 点击提交按钮
    }
  }
});
// 快捷键聚焦输入框end
