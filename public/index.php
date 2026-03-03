<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curiosity Kills the Cat</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #0c0a09;
      color: #fafaf9;
      font-family: 'JetBrains Mono', monospace;
      overflow: hidden;
    }
    .noise {
      position: fixed;
      inset: 0;
      opacity: 0.03;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
      pointer-events: none;
    }
    .gradient {
      position: fixed;
      inset: 0;
      background: radial-gradient(ellipse 80% 50% at 50% 120%, rgba(220, 38, 38, 0.15), transparent),
                  radial-gradient(ellipse 60% 40% at 50% -20%, rgba(251, 146, 60, 0.08), transparent);
      pointer-events: none;
    }
    main {
      position: relative;
      text-align: center;
      padding: 2rem;
      max-width: 42rem;
    }
    h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 8vw, 4.5rem);
      font-weight: 700;
      line-height: 1.15;
      letter-spacing: -0.02em;
      text-shadow: 0 0 60px rgba(220, 38, 38, 0.2);
    }
    h1 .italic {
      font-style: italic;
      color: #fca5a5;
      display: block;
      margin-top: 0.15em;
    }
    .sub {
      margin-top: 2rem;
      font-size: 0.875rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.3em;
      color: #78716c;
    }
    .paw {
      margin-top: 3rem;
      font-size: 2rem;
      opacity: 0.4;
      letter-spacing: 0.5em;
    }
  </style>
</head>
<body>
  <div class="noise" aria-hidden="true"></div>
  <div class="gradient" aria-hidden="true"></div>
  <main>
    <p class="sub">A warning</p>
    <h1>Curiosity<br><span class="italic">Kills the Cat</span></h1>
    <p class="paw">🐾</p>
  </main>
</body>
</html>
