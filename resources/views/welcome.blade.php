<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            :root {
                --primary: #3b82f6;
                --primary-dark: #2563eb;
                --text: #1f2937;
                --muted: #6b7280;
                --bg: #f8fafc;
            }

            html, body {
                background: linear-gradient(135deg, #eff6ff 0%, #f8fafc 100%);
                color: var(--text);
                font-family: 'Nunito', sans-serif;
                font-weight: 400;
                height: 100%;
                margin: 0;
            }

            body {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 24px;
            }

            .hero {
                width: 100%;
                max-width: 1100px;
                background: #ffffff;
                border-radius: 24px;
                box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
                overflow: hidden;
            }

            .hero-content {
                display: grid;
                grid-template-columns: 1.2fr 0.8fr;
                min-height: 560px;
            }

            .hero-main {
                padding: 56px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .hero-side {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: #fff;
                padding: 56px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .eyebrow {
                display: inline-block;
                padding: 6px 12px;
                border-radius: 999px;
                background: #dbeafe;
                color: var(--primary-dark);
                font-size: 13px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 16px;
            }

            .title {
                font-size: 48px;
                font-weight: 700;
                margin: 0 0 16px;
                line-height: 1.1;
            }

            .subtitle {
                font-size: 18px;
                color: var(--muted);
                margin-bottom: 28px;
                line-height: 1.6;
            }

            .actions {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
            }

            .btn {
                display: inline-block;
                padding: 12px 20px;
                border-radius: 999px;
                text-decoration: none;
                font-weight: 700;
            }

            .btn-primary {
                background: var(--primary);
                color: #fff;
            }

            .btn-outline {
                border: 1px solid #d1d5db;
                color: var(--text);
            }

            .links {
                margin-top: 28px;
                display: flex;
                flex-wrap: wrap;
                gap: 16px;
            }

            .links a {
                color: var(--muted);
                text-decoration: none;
                font-weight: 600;
            }

            .feature-list {
                list-style: none;
                padding: 0;
                margin: 20px 0 0;
            }

            .feature-list li {
                margin-bottom: 12px;
                font-size: 16px;
            }

            .feature-list i {
                margin-right: 8px;
            }

            @media (max-width: 900px) {
                .hero-content {
                    grid-template-columns: 1fr;
                }

                .hero-main, .hero-side {
                    padding: 32px;
                }
            }
        </style>

        <link rel='icon' href='favicon.ico' type='image/x-icon'/ >
        @include('includes.analytics')
    </head>
    <body>
        <div class="hero">
            <div class="hero-content">
                <div class="hero-main">
                    <span class="eyebrow">Learning platform</span>
                    <h1 class="title">{{ env('APP_NAME') }}</h1>
                    <p class="subtitle">
                        Create, share, and grow with a modern learning experience designed for students, teachers, and administrators.
                    </p>

                    <div class="actions">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary">Go to dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline">Register</a>
                            @endif
                        @endauth
                    </div>

                    <div class="links">
                        <a href="{{ env('APP_FB') }}" target="_blank">Facebook</a>
                        <a href="{{ env('APP_AUTHOR_URL') }}" target="_blank">Founder: {{ env('APP_AUTHOR_NAME') }}</a>
                    </div>
                </div>

                <div class="hero-side">
                    <h2 style="font-size: 28px; margin-bottom: 16px;">Why learners love it</h2>
                    <ul class="feature-list">
                        <li><i class="fas fa-check-circle"></i> Structured courses and lessons</li>
                        <li><i class="fas fa-check-circle"></i> Easy navigation for teachers and students</li>
                        <li><i class="fas fa-check-circle"></i> Built-in communication and engagement tools</li>
                        <li><i class="fas fa-check-circle"></i> A clean experience for daily learning</li>
                    </ul>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
