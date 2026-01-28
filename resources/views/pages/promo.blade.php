@extends('layouts.app')
@section('title', 'Promo')
@section('content')
@include('partials.header-mobile')

<section class="container py-3">
    <h1 class="mb-4">PROMO</h1>
    
    <div class="image-gallery-modern">
        <div class="row g-4">
            @foreach($promoImages as $index => $image)
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="gallery-image-wrapper">
                        <img src="{{ asset($image->image_url) }}" 
                             class="gallery-image img-fluid" 
                             alt="{{ $image->title ?? 'Promo Image' }}"
                             loading="lazy">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <i class="bi bi-eye"></i>
                                <span class="overlay-text">View Image</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox-modal" id="lightboxModal">
        <div class="lightbox-overlay" id="lightboxOverlay"></div>
        <div class="lightbox-content">
            <button class="lightbox-close" id="lightboxClose">
                <i class="bi bi-x-lg"></i>
            </button>
            <div class="lightbox-controls">
                <button class="lightbox-zoom" id="zoomIn" title="Zoom In">
                    <i class="bi bi-zoom-in"></i>
                </button>
                <button class="lightbox-zoom" id="zoomOut" title="Zoom Out">
                    <i class="bi bi-zoom-out"></i>
                </button>
                <button class="lightbox-zoom" id="resetZoom" title="Reset Zoom">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
            <div class="lightbox-image-container" id="lightboxImageContainer">
                <img src="" alt="" id="lightboxImage" class="lightbox-image">
            </div>
        </div>
    </div>

    <style>
/* ================================
   MODERN IMAGE GALLERY STYLES
   ================================ */

.image-gallery-modern {
    padding: 1rem 0;
}

.gallery-item {
    position: relative;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
}

/* Image Wrapper */
.gallery-image-wrapper {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    background: #f8f9fa;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.4s ease;
    aspect-ratio: 3 / 4; /* Portrait ratio - height is taller than width */
    width: 100%;
}

.gallery-item:hover .gallery-image-wrapper {
    box-shadow: 0 8px 30px rgba(18, 2, 99, 0.2);
}

/* Image Styling */
.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: transform 0.5s ease;
}

.gallery-item:hover .gallery-image {
    transform: scale(1.05);
}

/* Overlay Effect */
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(18, 2, 99, 0.85) 0%, rgba(26, 3, 128, 0.9) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
    transform: translateY(20px);
    transition: transform 0.4s ease;
}

.gallery-item:hover .overlay-content {
    transform: translateY(0);
}

.overlay-content i {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    display: block;
}

.overlay-text {
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* ================================
   RESPONSIVE STYLES
   ================================ */

@media (max-width: 768px) {
    .gallery-image-wrapper {
        border-radius: 12px;
        aspect-ratio: 3 / 4; /* Maintain portrait ratio on tablets */
    }
    
    .overlay-content i {
        font-size: 2rem;
    }
    
    .overlay-text {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .image-gallery-modern {
        padding: 0.5rem 0;
    }
    
    .gallery-image-wrapper {
        border-radius: 10px;
        aspect-ratio: 3 / 4; /* Maintain portrait ratio on mobile */
    }
    
    .overlay-content i {
        font-size: 1.75rem;
    }
    
    .overlay-text {
        font-size: 0.85rem;
    }
}

/* Loading Animation */
@keyframes shimmer {
    0% {
        background-position: -468px 0;
    }
    100% {
        background-position: 468px 0;
    }
}

.gallery-image-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-image-wrapper:hover::before {
    opacity: 1;
}

/* ================================
   LIGHTBOX MODAL STYLES
   ================================ */

.lightbox-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
}

.lightbox-modal.active {
    display: flex;
}

.lightbox-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(10px);
    animation: fadeIn 0.3s ease;
}

.lightbox-content {
    position: relative;
    z-index: 10000;
    width: 90%;
    height: 90%;
    display: flex;
    flex-direction: column;
    animation: zoomIn 0.4s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes zoomIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Close Button */
.lightbox-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10001;
}

.lightbox-close:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(90deg);
    border-color: rgba(255, 255, 255, 0.4);
}

/* Zoom Controls */
.lightbox-controls {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 0.75rem 1.25rem;
    border-radius: 50px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    z-index: 10001;
}

.lightbox-zoom {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: white;
    font-size: 1.25rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.lightbox-zoom:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
    border-color: rgba(255, 255, 255, 0.4);
}

.lightbox-zoom:active {
    transform: scale(0.95);
}

/* Image Container */
.lightbox-image-container {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    cursor: grab;
    position: relative;
}

.lightbox-image-container.dragging {
    cursor: grabbing;
}

.lightbox-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    user-select: none;
    -webkit-user-drag: none;
}

/* ================================
   LIGHTBOX RESPONSIVE
   ================================ */

@media (max-width: 768px) {
    .lightbox-content {
        width: 95%;
        height: 95%;
    }

    .lightbox-close {
        width: 45px;
        height: 45px;
        font-size: 1.25rem;
        top: 0.75rem;
        right: 0.75rem;
    }

    .lightbox-controls {
        padding: 0.625rem 1rem;
        gap: 0.5rem;
        bottom: 1.5rem;
    }

    .lightbox-zoom {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    .lightbox-close {
        width: 40px;
        height: 40px;
        font-size: 1.1rem;
    }

    .lightbox-controls {
        padding: 0.5rem 0.75rem;
        gap: 0.375rem;
        bottom: 1rem;
    }

    .lightbox-zoom {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
}
</style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lightbox Elements
        const lightboxModal = document.getElementById('lightboxModal');
        const lightboxOverlay = document.getElementById('lightboxOverlay');
        const lightboxClose = document.getElementById('lightboxClose');
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxImageContainer = document.getElementById('lightboxImageContainer');
        const zoomInBtn = document.getElementById('zoomIn');
        const zoomOutBtn = document.getElementById('zoomOut');
        const resetZoomBtn = document.getElementById('resetZoom');
        
        // Zoom variables
        let currentZoom = 1;
        const zoomStep = 0.25;
        const minZoom = 0.5;
        const maxZoom = 3;
        
        // Drag variables
        let isDragging = false;
        let startX, startY, translateX = 0, translateY = 0;
        
        // Open lightbox when gallery item is clicked
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        galleryItems.forEach(item => {
            item.style.cursor = 'pointer';
            
            item.addEventListener('click', function() {
                const img = this.querySelector('.gallery-image');
                openLightbox(img.src, img.alt);
            });
        });
        
        // Open Lightbox Function
        function openLightbox(src, alt) {
            lightboxImage.src = src;
            lightboxImage.alt = alt;
            
            lightboxModal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            resetZoom();
        }
        
        // Close Lightbox Function
        function closeLightbox() {
            lightboxModal.classList.remove('active');
            document.body.style.overflow = '';
            
            setTimeout(() => {
                lightboxImage.src = '';
                resetZoom();
            }, 300);
        }
        
        lightboxClose.addEventListener('click', closeLightbox);
        lightboxOverlay.addEventListener('click', closeLightbox);
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
                closeLightbox();
            }
        });
        
        zoomInBtn.addEventListener('click', function() {
            if (currentZoom < maxZoom) {
                currentZoom += zoomStep;
                applyZoom();
            }
        });
        
        zoomOutBtn.addEventListener('click', function() {
            if (currentZoom > minZoom) {
                currentZoom -= zoomStep;
                applyZoom();
            }
        });
        
        resetZoomBtn.addEventListener('click', resetZoom);
        
        function applyZoom() {
            lightboxImage.style.transform = `scale(${currentZoom}) translate(${translateX}px, ${translateY}px)`;
        }
        
        function resetZoom() {
            currentZoom = 1;
            translateX = 0;
            translateY = 0;
            applyZoom();
        }
        
        lightboxImageContainer.addEventListener('wheel', function(e) {
            e.preventDefault();
            
            if (e.deltaY < 0) {
                if (currentZoom < maxZoom) {
                    currentZoom += zoomStep;
                    applyZoom();
                }
            } else {
                if (currentZoom > minZoom) {
                    currentZoom -= zoomStep;
                    applyZoom();
                }
            }
        });
        
        lightboxImageContainer.addEventListener('mousedown', function(e) {
            if (currentZoom > 1) {
                isDragging = true;
                startX = e.clientX - translateX;
                startY = e.clientY - translateY;
                lightboxImageContainer.classList.add('dragging');
            }
        });
        
        document.addEventListener('mousemove', function(e) {
            if (isDragging) {
                translateX = e.clientX - startX;
                translateY = e.clientY - startY;
                applyZoom();
            }
        });
        
        document.addEventListener('mouseup', function() {
            if (isDragging) {
                isDragging = false;
                lightboxImageContainer.classList.remove('dragging');
            }
        });
        
        // Touch Support
        let touchStartX, touchStartY;
        
        lightboxImageContainer.addEventListener('touchstart', function(e) {
            if (currentZoom > 1 && e.touches.length === 1) {
                touchStartX = e.touches[0].clientX - translateX;
                touchStartY = e.touches[0].clientY - translateY;
            }
        });
        
        lightboxImageContainer.addEventListener('touchmove', function(e) {
            if (currentZoom > 1 && e.touches.length === 1) {
                e.preventDefault();
                translateX = e.touches[0].clientX - touchStartX;
                translateY = e.touches[0].clientY - touchStartY;
                applyZoom();
            }
        });
        
        // Pinch to Zoom
        let initialDistance = 0;
        let initialZoom = 1;
        
        lightboxImageContainer.addEventListener('touchstart', function(e) {
            if (e.touches.length === 2) {
                initialDistance = getDistance(e.touches[0], e.touches[1]);
                initialZoom = currentZoom;
            }
        });
        
        lightboxImageContainer.addEventListener('touchmove', function(e) {
            if (e.touches.length === 2) {
                e.preventDefault();
                const currentDistance = getDistance(e.touches[0], e.touches[1]);
                const scale = currentDistance / initialDistance;
                currentZoom = Math.max(minZoom, Math.min(maxZoom, initialZoom * scale));
                applyZoom();
            }
        });
        
        function getDistance(touch1, touch2) {
            const dx = touch1.clientX - touch2.clientX;
            const dy = touch1.clientY - touch2.clientY;
            return Math.sqrt(dx * dx + dy * dy);
        }
    });
    </script>
</section>

@include('partials.footer-mobile')
@endsection