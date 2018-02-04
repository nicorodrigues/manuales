window.addEventListener('load', function() {
    let hamburguer = document.querySelector('.nav-hamburg');
    let itemsNav = document.querySelectorAll('.sidebar-item > a');
    let navUser = document.querySelector('.nav-user p');

    hamburguer.addEventListener('click', function() {

        let menu = document.querySelector('.sidebar');

        if (menu.style.width === '170px') {
            menu.style.width = '0px';
        } else {
            menu.style.width = '170px';
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            document.querySelector('.sidebar').style.width = '170px';
        } else {
            document.querySelector('.sidebar').style.width = '0px';
        }
    });

    navUser.addEventListener('click', showSubmenu);

    itemsNav.forEach(function(elem) {

        if (elem.classList.contains('with-submenu')) {
            elem.addEventListener('click', showSubmenu);
        }

        if (elem.getAttribute('href').split('/')[2] === location.pathname.split('/')[2]) {
            if (elem.classList.contains('with-submenu')) {

                let limit = 0;
                let ul = elem.parentElement.children[1];
                let childrenLi = Array.from(ul.children);


                childrenLi.forEach(function(elem) {
                    if (elem.children[0].getAttribute('href').split('/')[3] === location.pathname.split('/')[3]) {
                        elem.children[0].parentElement.classList.add('subactual');
                    }
                    limit += 40;
                });
                ul.style.height = limit + 'px';
            }
            elem.parentElement.classList.add('actual');


        }


    });

    function showSubmenu(evento) {
        evento.preventDefault();

        let submenu = this.parentElement.children[1];
        let limit = 0;

        Array.from(submenu.children).forEach(function() {
            limit += 40;
        });

        if (submenu.style.height === limit + 'px') {
            submenu.style.height = '0px';
        } else {
            submenu.style.height = limit + 'px';
        }

    }
});
