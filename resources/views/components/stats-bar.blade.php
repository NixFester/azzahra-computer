<style>
    .stats-container {
        background: linear-gradient(135deg, rgba(61, 143, 239, 0.05) 0%, rgba(42, 107, 196, 0.03) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem 2rem;
        margin: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .stats-container::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(61, 143, 239, 0.08) 0%, transparent 70%);
        border-radius: 50%;
    }

    .stats-container::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(61, 143, 239, 0.05) 0%, transparent 70%);
        border-radius: 50%;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        position: relative;
        z-index: 1;
    }

    .stat-card {
        
        border: 1px solid rgba(255, 255, 255, 0);
        backdrop-filter: blur(0px);
        border-radius: 15px;
        padding: 2.5rem;
        text-align: center;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(61, 143, 239, 0.3) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        border: 1px solid rgba(61, 143, 239, 0.5);
        background: linear-gradient(135deg, rgba(61, 143, 239, 0.15) 0%, rgba(61, 143, 239, 0.05) 100%);
        backdrop-filter: blur(15px);
        box-shadow: 0 10px 40px rgba(61, 143, 239, 0.3), inset 0 0 20px rgba(61, 143, 239, 0.05);
    }

    .stat-card:hover::before {
        opacity: 1;
        animation: pulse 1.5s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(61, 143, 239, 0.4);
        }
        50% {
            box-shadow: 0 0 0 20px rgba(61, 143, 239, 0);
        }
    }

    .stat-content {
        position: relative;
        z-index: 1;
    }

    .stat-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        display: inline-block;
        transition: transform 0.4s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.15);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        color: rgba(61, 143, 239, 0.6);
        margin: 0.8rem 0;
        line-height: 1;
        letter-spacing: -1px;
        transition: all 0.4s ease;
    }

    .stat-card:hover .stat-number {
        background: linear-gradient(135deg, #120263 0%, #070129 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        text-shadow: none;
    }

    .stat-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        font-weight: 700;
        color:rgba(61, 143, 239,  0.5);
        letter-spacing: 2px;
        margin-bottom: 0.8rem;
        font-family: 'Courier New', monospace;
        transition: all 0.4s ease;
    }

    .stat-card:hover .stat-label {
        background: linear-gradient(135deg, #3D8FEF 0%, #00D4FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }

    .stat-subtitle {
        font-size: 0.85rem;
        color:black;
        margin-top: 0.8rem;
        letter-spacing: 1px;
        transition: color 0.4s ease;
    }

    .stat-card:hover .stat-subtitle {
        color: rgb(0, 34, 254);
    }

    .rating-stars {
        color: rgba(255, 215, 0, 0.4);
        font-size: 1.8rem;
        margin-top: 0.8rem;
        letter-spacing: 4px;
        transition: all 0.4s ease;
    }

    .stat-card:hover .rating-stars {
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
    }

    @media (max-width: 768px) {
        .stats-container {
            padding: 2rem 1.5rem;
        }

        .stat-number {
            font-size: 2.2rem;
        }

        .stat-icon {
            font-size: 2.5rem;
        }

        .stat-label {
            font-size: 0.8rem;
        }
    }
</style>

<div class="stats-container">
    <div class="stats-grid">
        {{-- Service Count --}}
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Services Completed</div>
                <div class="stat-number">{{ number_format($serviceCount) }}+</div>
                <div class="stat-subtitle">Unit Service Dikerjakan</div>
            </div>
        </div>

        {{-- Satisfaction --}}
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Customer Rating</div>
                <div class="stat-number">{{ number_format($satisfaction) }}/{{ number_format($maxSatisfaction) }}</div>
                <div class="rating-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        ★
                    @endfor
                </div>
            </div>
        </div>

        {{-- Customer Count --}}
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-label">Active Users</div>
                <div class="stat-number">{{ number_format($customerCount) }}+</div>
                <div class="stat-subtitle">Since 2010 - 2023</div>
            </div>
        </div>
    </div>
</div>
