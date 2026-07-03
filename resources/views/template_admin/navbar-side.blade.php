<script>
var material = {

    menus: [],

    init: function () {
        this.loadMenu();
    },

    loadMenu: function () {

        var self = this;
        var prefix = getFirstPrefix();
        
        $.ajax({
            url: prefix + '/api/menu',
            type: 'GET',
            success: function (res) {

                if (!res.status) return;

                self.menus = res.data.menus;
                self.renderMenu();
            },
            error: function (err) {
                console.error(err);
            }
        });
    },

    renderMenu: function () {

        var html = '';
        var self = this;
    
        this.menus.forEach(function (menu, index) {
    
            var menuId = 'sidebar-menu-' + index;
            var hasChild = menu.children && menu.children.length > 0;
            var prefix = getFirstPrefix();
    
            // ==========================
            // MENU TANPA SUBMENU
            // ==========================
            if (!hasChild) {
    
                html += `
                    <li class="nav-item">
                        <a class="nav-link ${self.isActive(menu.url)}" href="${prefix}${menu.url}">
                            <i class="icon">
                                ${self.parentIcon()}
                            </i>
                            <span class="item-name">${menu.title}</span>
                        </a>
                    </li>
                `;
    
            } else {
    
                // ==========================
                // MENU DENGAN SUBMENU
                // ==========================
    
                var childHtml = '';
    
                menu.children.forEach(function (child) {
    
                    childHtml += `
                        <li class="nav-item">
                            <a class="nav-link ${self.isActive(child.url)}" href="${prefix}${child.url}">
                                <i class="icon">
                                    ${self.childIcon()}
                                </i>
                                <i class="sidenav-mini-icon">•</i>
                                <span class="item-name">${child.title}</span>
                            </a>
                        </li>
                    `;
                });
    
                html += `
                    <li class="nav-item">
                        <a class="nav-link"
                           data-bs-toggle="collapse"
                           href="#${menuId}"
                           role="button"
                           aria-expanded="false"
                           aria-controls="${menuId}">
                           
                            <i class="icon">
                                ${self.parentIcon()}
                            </i>
    
                            <span class="item-name">${menu.title}</span>
    
                            <i class="right-icon">
                                ${self.arrowIcon()}
                            </i>
                        </a>
    
                        <ul class="sub-nav collapse"
                            id="${menuId}"
                            data-bs-parent="#sidebar-menu">
                            ${childHtml}
                        </ul>
                    </li>
                `;
            }
        });
    
        $('#sidebar-menu').html(html);
    
        this.autoOpenActive();
    },

    isActive: function (url) {
        return window.location.pathname === url ? 'active' : '';
    },

    autoOpenActive: function () {

        var currentPath = window.location.pathname;
    
        this.menus.forEach(function (menu, index) {
    
            if (menu.children && menu.children.length > 0) {
    
                menu.children.forEach(function (child) {
    
                    if (child.url === currentPath) {
    
                        var collapseId = '#sidebar-menu-' + index;
    
                        $(collapseId).addClass('show');
    
                        // Tambahkan active ke parent
                        $(collapseId)
                            .closest('.nav-item')
                            .find('> .nav-link')
                            .addClass('active');
                    }
    
                });
    
            }
    
        });
    },


    parentIcon: function () {
        return `
            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="currentColor">
                <circle cx="12" cy="12" r="8"></circle>
            </svg>
        `;
    },
    childIcon: function () {
        return `
            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                <circle cx="12" cy="12" r="8"></circle>
            </svg>
        `;
    },
    arrowIcon: function () {
        return `
            <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        `;
    },
    getFirstPrefix: function() {
        var path = window.location.pathname;
        var parts = path.split('/').filter(Boolean);
        return parts.length ? '/' + parts[0] : '';
    }
        
};

// Jalankan setelah halaman siap
$(document).ready(function () {
    material.init();
});
</script>

<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
  <div class="sidebar-header d-flex align-items-center justify-content-start">
    <a href="#" class="navbar-brand">
      <!--Logo start-->
      <!--logo End-->

      <!--Logo start-->
      <div class="logo-main">
        <div class="logo-normal">
            <img src="{{ asset('/assets/images/icons/smartroute-logo.png') }}" alt="" width="40" height="40">
          <!--<svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">-->
          <!--  <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />-->
          <!--  <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />-->
          <!--  <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />-->
          <!--  <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />-->
          <!--</svg>-->
        </div>
        <div class="logo-mini">
          <!--<svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">-->
          <!--  <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />-->
          <!--  <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />-->
          <!--  <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />-->
          <!--  <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />-->
          <!--</svg>-->
        </div>
      </div>
      <!--logo End-->
      <h4 class="logo-title text-secondary">SmartRoutes</h4>
    </a>
    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
        <!--<i class='bx bx-home-alt'></i>-->
      <i class="icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </i>
    </div>
  </div>
  <div class="sidebar-body pt-0 data-scrollbar">
    <div class="sidebar-list">
      <!-- Sidebar Menu Start --> 
          <ul class="navbar-nav iq-main-menu" id="sidebar-menu"></ul>
      <!-- Sidebar Menu End -->
    </div>
  </div>
  <div class="sidebar-footer"></div>
</aside>
<main class="main-content">
 
    