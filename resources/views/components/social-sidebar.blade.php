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
    @if($storeInfo?->instagram ?? 'authorized_servicecenter.tegal')
    <a href="https://instagram.com/{{ $storeInfo?->instagram ?? 'authorized_servicecenter.tegal' }}" 
       target="_blank" 
       rel="noopener noreferrer"
       class="social-link instagram"
       aria-label="Follow us on Instagram">
        <div class="social-icon-wrapper">
            <i class="bi bi-instagram"></i>
        </div>
        <span class="social-tooltip">Instagram</span>
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
        <span class="social-tooltip">TikTok</span>
    </a>
    @endif
</div>

<style>

/* Social Media Sidebar */
.social-sidebar {
    position: fixed;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    flex-direction: column;
    gap: 0;
    z-index: 999;
}

.social-link {
    position: relative;
    width: 52px;
    height: 52px;
    text-decoration: none;
    cursor: pointer;
    display: block;
}

.social-link .social-icon-wrapper {
    width: 52px;
    height: 52px;
    border-radius: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-left: 3px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.social-link .social-icon-wrapper i {
    color: white;
    font-size: 24px;
    transition: transform 0.3s ease;
}

.instagram .social-icon-wrapper {
    background: linear-gradient(135deg, #833AB4 0%, #E1306C 50%, #FCAF45 100%);
    box-shadow: -4px 0 16px rgba(225, 48, 108, 0.3);
}

.tiktok .social-icon-wrapper {
    background: #000000;
    box-shadow: -4px 0 16px rgba(0, 0, 0, 0.5);
}

.social-tooltip {
    position: absolute;
    right: calc(100% + 12px);
    top: 50%;
    transform: translateY(-50%) translateX(10px);
    background: rgba(0, 0, 0, 0.9);
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.social-tooltip::after {
    content: '';
    position: absolute;
    right: -6px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 6px solid rgba(0, 0, 0, 0.9);
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}

.social-link:hover .social-tooltip {
    opacity: 1;
}


.instagram:hover .social-icon-wrapper {
    box-shadow: -6px 0 24px rgba(225, 48, 108, 0.5);
}

.tiktok:hover .social-icon-wrapper {
    box-shadow: -6px 0 24px rgba(0, 0, 0, 0.7);
}


/* Responsive */
@media (max-width: 768px) {
    .social-sidebar {
        display: none !important;
    }
}
</style>