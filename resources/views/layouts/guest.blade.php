<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Softura Solutions') }} — Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Inter', sans-serif;
      background: #F0F4FF;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
      position: relative;
      overflow: hidden;
    }

    /* Decoración de fondo */
    body::before {
      content: '';
      position: fixed;
      top: -30%;
      right: -15%;
      width: 60vmax;
      height: 60vmax;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(26,79,255,0.08) 0%, transparent 70%);
      pointer-events: none;
    }
    body::after {
      content: '';
      position: fixed;
      bottom: -20%;
      left: -10%;
      width: 50vmax;
      height: 50vmax;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(0,201,167,0.06) 0%, transparent 70%);
      pointer-events: none;
    }

    .auth-wrapper {
      width: 100%;
      max-width: 440px;
      position: relative;
      z-index: 1;
    }

    .auth-brand {
      text-align: center;
      margin-bottom: 2rem;
    }

    .auth-brand a {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }

    .auth-brand img {
      height: 36px;
      width: auto;
    }

    .auth-brand-text {
      font-family: 'Syne', sans-serif;
      font-size: 1.5rem;
      font-weight: 800;
      color: #0A0A14;
      letter-spacing: -0.03em;
    }

    .auth-brand-text span {
      color: #1A4FFF;
    }

    .auth-card {
      background: #fff;
      border-radius: 24px;
      padding: 2.5rem;
      box-shadow: 0 8px 40px rgba(10,10,20,0.10), 0 1px 3px rgba(10,10,20,0.05);
      border: 1px solid rgba(10,10,20,0.06);
    }

    .auth-card-header {
      margin-bottom: 2rem;
    }

    .auth-card-header h1 {
      font-family: 'Syne', sans-serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #0A0A14;
      letter-spacing: -0.02em;
      margin-bottom: 0.35rem;
    }

    .auth-card-header p {
      font-size: 0.88rem;
      color: #64748b;
    }

    /* Status message */
    .auth-status {
      background: #ecfdf5;
      border: 1px solid #6ee7b7;
      color: #065f46;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 0.85rem;
      margin-bottom: 1.25rem;
    }

    /* Form fields */
    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-group label {
      display: block;
      font-size: 0.82rem;
      font-weight: 600;
      color: #374151;
      margin-bottom: 0.45rem;
      letter-spacing: 0.01em;
    }

    .form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1.5px solid #e2e8f0;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 0.92rem;
      color: #0A0A14;
      background: #fafafa;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }

    .form-input:focus {
      border-color: #1A4FFF;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(26,79,255,0.1);
    }

    .form-input::placeholder {
      color: #94a3b8;
    }

    .form-error {
      font-size: 0.78rem;
      color: #dc2626;
      margin-top: 0.35rem;
    }

    /* Remember me + forgot */
    .form-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
      gap: 0.5rem;
    }

    .form-check {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }

    .form-check input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: #1A4FFF;
      cursor: pointer;
    }

    .form-check span {
      font-size: 0.82rem;
      color: #64748b;
    }

    .form-link {
      font-size: 0.82rem;
      color: #1A4FFF;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s;
    }

    .form-link:hover {
      color: #0A2FCC;
      text-decoration: underline;
    }

    /* Submit button */
    .btn-auth {
      width: 100%;
      padding: 0.85rem 1.5rem;
      background: #1A4FFF;
      color: #fff;
      border: none;
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 0.92rem;
      font-weight: 600;
      letter-spacing: 0.02em;
      cursor: pointer;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      box-shadow: 0 4px 16px rgba(26,79,255,0.28);
    }

    .btn-auth:hover {
      background: #0A2FCC;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(26,79,255,0.38);
    }

    .btn-auth:active {
      transform: translateY(0);
    }

    .auth-footer {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.78rem;
      color: #94a3b8;
    }
  </style>
</head>
<body>
  <div class="auth-wrapper">
    <div class="auth-brand">
      <a href="{{ route('home') }}">
        <img src="/img/s3.png" alt="Softura Solutions">
        <span class="auth-brand-text">Softura<span>.</span></span>
      </a>
    </div>

    {{ $slot }}

    <p class="auth-footer">© {{ date('Y') }} Softura Solutions — Panel de administración</p>
  </div>
</body>
</html>
