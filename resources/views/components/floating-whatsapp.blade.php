@props(['storeInfo' => null])

@if ($storeInfo?->whatsapp)
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $storeInfo->whatsapp) }}" target="_blank"
        rel="noopener noreferrer" class="whatsapp-float" aria-label="Contact us on WhatsApp">
        <div class="whatsapp-icon-wrapper">
            <i class="bi bi-whatsapp"></i>
        </div>
        <div class="whatsapp-pulse"></div>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 64px;
            height: 64px;
            z-index: 1000;
            text-decoration: none;
            cursor: pointer;
        }

        .whatsapp-icon-wrapper {
            position: relative;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .whatsapp-icon-wrapper i {
            color: white;
            font-size: 32px;
            transition: transform 0.3s ease;
        }

        .whatsapp-pulse {
            position: absolute;
            top: 0;
            left: 0;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.3);
            animation: pulse 2s infinite;
            z-index: 1;
        }

        .whatsapp-float:hover .whatsapp-icon-wrapper {
            transform: scale(1.1);
            box-shadow: 0 6px 28px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-float:hover .whatsapp-icon-wrapper i {
            transform: rotate(15deg);
        }

        .whatsapp-float:active .whatsapp-icon-wrapper {
            transform: scale(0.95);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.3);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float {
                width: 56px;
                height: 56px;
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-icon-wrapper,
            .whatsapp-pulse {
                width: 56px;
                height: 56px;
            }

            .whatsapp-icon-wrapper i {
                font-size: 28px;
            }
        }
    </style>
@endif
