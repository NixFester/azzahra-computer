@props(['storeInfo' => null])

{{-- WhatsApp Floating Button --}}
@if($storeInfo?->whatsapp)
<a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $storeInfo->whatsapp) }}" 
   target="_blank" 
   rel="noopener noreferrer"
   class="whatsapp-float"
   aria-label="Contact us on WhatsApp">
    <div class="whatsapp-icon-wrapper">
        <i class="bi bi-whatsapp"></i>
    </div>
    <div class="whatsapp-pulse"></div>
</a>
@endif

{{-- Social Media Sidebar (Desktop Only) --}}
<div class="social-sidebar d-none d-md-flex">
    {{-- Toggle Button --}}
    <button class="social-toggle-btn" id="socialToggleDesktop" aria-label="Toggle social media">
        <i class="bi bi-chevron-left"></i>
    </button>
    
    <div class="social-links-container" id="socialLinksDesktop">
        @if($storeInfo?->instagram ?? 'authorized_servicecenter.tegal')
        <a href="https://instagram.com/{{ $storeInfo?->instagram ?? 'authorized_servicecenter.tegal' }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="social-link instagram"
           aria-label="Follow us on Instagram">
            <div class="social-icon-wrapper">
                <i class="bi bi-instagram"></i>
            </div>
            <div class="social-popup instagram-popup">
                <div class="popup-content">
                    <span class="popup-title">Instagram</span>
                </div>
            </div>
        </a>
        @endif
        
        @if($storeInfo?->tiktok ?? 'authorized_servicecenter.tegal')
        <a href="https://www.tiktok.com/{{ $storeInfo?->tiktok ?? '@authorized_servicecenter.tegal' }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="social-link tiktok"
           aria-label="Follow us on TikTok">
            <div class="social-icon-wrapper">
                <i class="bi bi-tiktok"></i>
            </div>
            <div class="social-popup tiktok-popup">
                <div class="popup-content">
                    <span class="popup-title">TikTok</span>
                </div>
            </div>
        </a>
        @endif
    </div>
</div>

{{-- Social Media Sidebar (Mobile - Scaled Down) --}}
<div class="social-sidebar-mobile d-md-none">
    {{-- Toggle Button Mobile --}}
    <button class="social-toggle-btn-mobile" id="socialToggleMobile" aria-label="Toggle social media">
        <i class="bi bi-chevron-left"></i>
    </button>
    
    <div class="social-links-container-mobile" id="socialLinksMobile">
        @if($storeInfo?->instagram ?? 'authorized_servicecenter.tegal')
        <a href="https://instagram.com/{{ $storeInfo?->instagram ?? 'authorized_servicecenter.tegal' }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="social-link-mobile instagram"
           aria-label="Follow us on Instagram">
            <div class="social-icon-wrapper-mobile">
                <i class="bi bi-instagram"></i>
            </div>
            <div class="social-popup-mobile instagram-popup">
                <div class="popup-content-mobile">
                    <span class="popup-title-mobile">Instagram</span>
                </div>
            </div>
        </a>
        @endif
        
        @if($storeInfo?->tiktok ?? 'authorized_servicecenter.tegal')
        <a href="https://www.tiktok.com/{{ $storeInfo?->tiktok ?? '@authorized_servicecenter.tegal' }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="social-link-mobile tiktok"
           aria-label="Follow us on TikTok">
            <div class="social-icon-wrapper-mobile">
                <i class="bi bi-tiktok"></i>
            </div>
            <div class="social-popup-mobile tiktok-popup">
                <div class="popup-content-mobile">
                    <span class="popup-title-mobile">TikTok</span>
                </div>
            </div>
        </a>
        @endif
    </div>
</div>

<style>
/* WhatsApp Float Button Enhanced */
.whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    cursor: pointer;
    box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: float-bounce 3s ease-in-out infinite;
}

.whatsapp-float:hover {
    transform: scale(1.1) translateY(-5px);
    box-shadow: 0 12px 32px rgba(37, 211, 102, 0.6);
}

.whatsapp-icon-wrapper {
    position: relative;
    z-index: 2;
}

.whatsapp-icon-wrapper i {
    color: white;
    font-size: 32px;
    animation: shake 2s ease-in-out infinite;
}

.whatsapp-pulse {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(37, 211, 102, 0.4);
    animation: pulse-ring 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}

@keyframes float-bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

@keyframes pulse-ring {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

@keyframes shake {
    0%, 100% {
        transform: rotate(0deg);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: rotate(-10deg);
    }
    20%, 40%, 60%, 80% {
        transform: rotate(10deg);
    }
}

/* ============================================
   DESKTOP VERSION - Social Media Sidebar
   ============================================ */
.social-sidebar {
    position: fixed;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    flex-direction: column;
    gap: 0;
    z-index: 999;
    animation: slideInRight 0.6s ease-out;
}

/* Desktop Toggle Button */
.social-toggle-btn {
    position: absolute;
    right: 0;
    top: -40px;
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, #120263 0%, #1a0380 100%);
    border: none;
    border-radius: 8px 0 0 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: -2px 2px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.social-toggle-btn i {
    color: white;
    font-size: 16px;
    transition: transform 0.3s ease;
}

.social-toggle-btn:hover {
    background: linear-gradient(135deg, #1a0380 0%, #120263 100%);
    box-shadow: -3px 3px 12px rgba(0, 0, 0, 0.3);
}

.social-sidebar.hidden .social-toggle-btn i {
    transform: rotate(180deg);
}

/* Social Links Container */
.social-links-container {
    display: flex;
    flex-direction: column;
    gap: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.social-sidebar.hidden .social-links-container {
    transform: translateX(100%);
    opacity: 0;
    pointer-events: none;
}

@keyframes slideInRight {
    from {
        transform: translateY(-50%) translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateY(-50%) translateX(0);
        opacity: 1;
    }
}

.social-link {
    position: relative;
    width: 44px;
    height: 44px;
    text-decoration: none;
    cursor: pointer;
    display: block;
    overflow: visible;
}

.social-link .social-icon-wrapper {
    width: 44px;
    height: 44px;
    border-radius: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-left: 3px solid rgba(255, 255, 255, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.social-link .social-icon-wrapper::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.social-link:hover .social-icon-wrapper::before {
    width: 100px;
    height: 100px;
}

.social-link .social-icon-wrapper i {
    color: white;
    font-size: 20px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    z-index: 1;
}

.social-link:hover .social-icon-wrapper i {
    transform: scale(1.2) rotate(10deg);
}

/* Instagram Colors */
.instagram .social-icon-wrapper {
    background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #FCAF45 100%);
    box-shadow: -4px 0 20px rgba(225, 48, 108, 0.4);
}

.instagram:hover .social-icon-wrapper {
    border-left-color: #FCAF45;
    box-shadow: -6px 0 30px rgba(225, 48, 108, 0.6);
}

/* TikTok Colors */
.tiktok .social-icon-wrapper {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    box-shadow: -4px 0 20px rgba(0, 0, 0, 0.6);
    position: relative;
}

.tiktok .social-icon-wrapper::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #00f2ea 0%, #ff0050 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.tiktok:hover .social-icon-wrapper::after {
    opacity: 0.2;
}

.tiktok:hover .social-icon-wrapper {
    border-left-color: #00f2ea;
    box-shadow: -6px 0 30px rgba(0, 242, 234, 0.4);
}

/* ============================================
   DESKTOP POPUP CARD
   ============================================ */
.social-popup {
    position: absolute;
    right: 100%;
    top: 0;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 12px;
    border-radius: 0;
    opacity: 0;
    pointer-events: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: -5px 0 20px rgba(0, 0, 0, 0.3);
    white-space: nowrap;
    transform: translateX(12px);
    min-width: 85px;
}

.social-link:hover .social-popup {
    opacity: 1;
    transform: translateX(0);
}

/* Instagram Popup */
.instagram-popup {
    background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #FCAF45 100%);
}

/* TikTok Popup */
.tiktok-popup {
    background: linear-gradient(135deg, #000000 0%, #2a2a2a 100%);
    border-left: 2px solid rgba(0, 242, 234, 0.5);
}

/* Popup Content */
.popup-content {
    display: flex;
    flex-direction: column;
}

.popup-title {
    color: white;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Popup Logo - REMOVED */

/* ============================================
   MOBILE VERSION - Social Media Sidebar
   ============================================ */
.social-sidebar-mobile {
    position: fixed;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 0;
    z-index: 999;
    animation: slideInRight 0.6s ease-out;
}

/* Mobile Toggle Button */
.social-toggle-btn-mobile {
    position: absolute;
    right: 0;
    top: -36px;
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #120263 0%, #1a0380 100%);
    border: none;
    border-radius: 6px 0 0 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: -2px 2px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.social-toggle-btn-mobile i {
    color: white;
    font-size: 14px;
    transition: transform 0.3s ease;
}

.social-toggle-btn-mobile:active {
    background: linear-gradient(135deg, #1a0380 0%, #120263 100%);
    transform: scale(0.95);
}

.social-sidebar-mobile.hidden .social-toggle-btn-mobile i {
    transform: rotate(180deg);
}

/* Social Links Container Mobile */
.social-links-container-mobile {
    display: flex;
    flex-direction: column;
    gap: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.social-sidebar-mobile.hidden .social-links-container-mobile {
    transform: translateX(100%);
    opacity: 0;
    pointer-events: none;
}

.social-link-mobile {
    position: relative;
    width: 36px;
    height: 36px;
    text-decoration: none;
    cursor: pointer;
    display: block;
    overflow: visible;
}

.social-link-mobile .social-icon-wrapper-mobile {
    width: 36px;
    height: 36px;
    border-radius: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-left: 3px solid rgba(255, 255, 255, 0.3);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.social-link-mobile .social-icon-wrapper-mobile::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.social-link-mobile:active .social-icon-wrapper-mobile::before {
    width: 80px;
    height: 80px;
}

.social-link-mobile .social-icon-wrapper-mobile i {
    color: white;
    font-size: 18px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    z-index: 1;
}

.social-link-mobile:active .social-icon-wrapper-mobile i {
    transform: scale(1.2) rotate(10deg);
}

/* Instagram Colors Mobile */
.social-link-mobile.instagram .social-icon-wrapper-mobile {
    background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #FCAF45 100%);
    box-shadow: -3px 0 15px rgba(225, 48, 108, 0.4);
}

.social-link-mobile.instagram:active .social-icon-wrapper-mobile {
    border-left-color: #FCAF45;
    box-shadow: -5px 0 25px rgba(225, 48, 108, 0.6);
}

/* TikTok Colors Mobile */
.social-link-mobile.tiktok .social-icon-wrapper-mobile {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    box-shadow: -3px 0 15px rgba(0, 0, 0, 0.6);
    position: relative;
}

.social-link-mobile.tiktok .social-icon-wrapper-mobile::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #00f2ea 0%, #ff0050 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.social-link-mobile.tiktok:active .social-icon-wrapper-mobile::after {
    opacity: 0.2;
}

.social-link-mobile.tiktok:active .social-icon-wrapper-mobile {
    border-left-color: #00f2ea;
    box-shadow: -5px 0 25px rgba(0, 242, 234, 0.4);
}

/* ============================================
   MOBILE POPUP CARD
   ============================================ */
.social-popup-mobile {
    position: absolute;
    right: 100%;
    top: 0;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 10px;
    border-radius: 0;
    opacity: 0;
    pointer-events: none;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: -4px 0 18px rgba(0, 0, 0, 0.3);
    white-space: nowrap;
    transform: translateX(10px);
    min-width: 75px;
}

.social-link-mobile:active .social-popup-mobile,
.social-link-mobile:hover .social-popup-mobile {
    opacity: 1;
    transform: translateX(0);
}

/* Instagram Popup Mobile */
.instagram-popup {
    background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #FCAF45 100%);
}

/* TikTok Popup Mobile */
.tiktok-popup {
    background: linear-gradient(135deg, #000000 0%, #2a2a2a 100%);
    border-left: 2px solid rgba(0, 242, 234, 0.5);
}

/* Popup Content Mobile */
.popup-content-mobile {
    display: flex;
    flex-direction: column;
}

.popup-title-mobile {
    color: white;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.4px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Popup Logo Mobile - REMOVED */

/* ============================================
   RESPONSIVE ADJUSTMENTS
   ============================================ */
@media (max-width: 768px) {
    .whatsapp-float {
        bottom: 20px;
        right: 20px;
        width: 52px;
        height: 52px;
    }
    
    .whatsapp-icon-wrapper i {
        font-size: 28px;
    }
}

@media (max-width: 380px) {
    .social-link-mobile {
        width: 32px;
        height: 32px;
    }
    
    .social-link-mobile .social-icon-wrapper-mobile {
        width: 32px;
        height: 32px;
    }
    
    .social-link-mobile .social-icon-wrapper-mobile i {
        font-size: 16px;
    }
    
    .social-popup-mobile {
        padding: 0 8px;
        min-width: 65px;
    }
    
    .popup-title-mobile {
        font-size: 9px;
    }
}

/* Prevent horizontal scroll */
body {
    overflow-x: hidden;
}
</style>

<script>
// Toggle Social Media Sidebar - Desktop
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtnDesktop = document.getElementById('socialToggleDesktop');
    const sidebarDesktop = document.querySelector('.social-sidebar');
    
    if (toggleBtnDesktop && sidebarDesktop) {
        toggleBtnDesktop.addEventListener('click', function() {
            sidebarDesktop.classList.toggle('hidden');
            
            // Save state to localStorage
            if (sidebarDesktop.classList.contains('hidden')) {
                localStorage.setItem('socialSidebarDesktop', 'hidden');
            } else {
                localStorage.setItem('socialSidebarDesktop', 'visible');
            }
        });
        
        // Restore state from localStorage
        const savedState = localStorage.getItem('socialSidebarDesktop');
        if (savedState === 'hidden') {
            sidebarDesktop.classList.add('hidden');
        }
    }
    
    // Toggle Social Media Sidebar - Mobile
    const toggleBtnMobile = document.getElementById('socialToggleMobile');
    const sidebarMobile = document.querySelector('.social-sidebar-mobile');
    
    if (toggleBtnMobile && sidebarMobile) {
        toggleBtnMobile.addEventListener('click', function() {
            sidebarMobile.classList.toggle('hidden');
            
            // Save state to localStorage
            if (sidebarMobile.classList.contains('hidden')) {
                localStorage.setItem('socialSidebarMobile', 'hidden');
            } else {
                localStorage.setItem('socialSidebarMobile', 'visible');
            }
        });
        
        // Restore state from localStorage
        const savedStateMobile = localStorage.getItem('socialSidebarMobile');
        if (savedStateMobile === 'hidden') {
            sidebarMobile.classList.add('hidden');
        }
    }
});
</script>