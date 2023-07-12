    let startingPoint
        const winter = document.querySelector('.winter')

        winter.addEventListener('mouseenter', (e) => {
            startingPoint = e.clientX
            winter.classList.add('moving')
        })

        winter.addEventListener('mouseout', (e) => {
            winter.classList.remove('moving')
            winter.style.setProperty('--percentage', 0.5)
        })

        winter.addEventListener('mousemove', (e) => {
            let percentage = (e.clientX - startingPoint) / window.outerWidth + 0.5

            winter.style.setProperty('--percentage', percentage)
        })