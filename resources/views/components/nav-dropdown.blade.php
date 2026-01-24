<div class="nav-dropdown">
    <button class="nav-dropdown-toggle">
        {{ $title }}
        <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>
    <div class="nav-dropdown-menu">
        {{ $slot }}
    </div>
</div>

<style>
.nav-dropdown {
    position: relative;
    display: inline-block;
    border-right: 1.5px solid rgba(255, 255, 255, 0.2);
    border-left: 1.5px solid rgba(255, 255, 255, 0.2);
}

.nav-dropdown-toggle {
    background: none;
    border: none;
    color: #ffffff;
    font-size: 16px;
    font-weight: 500;
    padding: 10px 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: color 0.3s ease;
}

.nav-dropdown-toggle:hover {
    color: #3D8FEF;
    background: rgba(255, 255, 255, 1);
}

.dropdown-icon {
    transition: transform 0.3s ease;
}

.nav-dropdown:hover .dropdown-icon {
    transform: rotate(180deg);
}

.nav-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    min-width: 220px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1000;
    margin-top: 8px;
    overflow: hidden;
}

.nav-dropdown:hover .nav-dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.nav-dropdown-menu a {
    display: block;
    padding: 12px 20px;
    color: #333;
    text-decoration: none;
    transition: all 0.2s ease;
    border-left: 3px solid transparent;
}

.nav-dropdown-menu a:hover {
    background: #f0f7ff;
    color: #3D8FEF;
    border-left-color: #3D8FEF;
    padding-left: 24px;
}

.nav-dropdown-menu a:first-child {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.nav-dropdown-menu a:last-child {
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}
</style>