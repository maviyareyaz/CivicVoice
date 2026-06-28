<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CivicVoice — Crowd Problem Reporter</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --navy: #1a2744;
    --navy-mid: #243358;
    --asphalt: #2d3748;
    --amber: #f59e0b;
    --amber-glow: #fbbf24;
    --green: #10b981;
    --red: #ef4444;
    --blue: #3b82f6;
    --purple: #8b5cf6;
    --chalk: #f8f9fc;
    --chalk2: #eef1f7;
    --muted: #8892a4;
    --text: #1a2744;
    --white: #ffffff;
    --card-radius: 14px;
    --transition: 0.2s ease;
  }
html{
    scroll-behavior: smooth;
}

  body {
    font-family: 'Inter', sans-serif;
    background: var(--chalk);
    color: var(--text);
    min-height: 100vh;
  }

  /* ── HEADER ── */
  header {
    background: var(--navy);
    padding: 0 24px;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 20px rgba(26,39,68,0.3);
  }
  .header-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 64px;
    gap: 16px;
  }
  .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
  }
  .logo-icon {
    width: 36px; height: 36px;
    background: var(--amber);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
  }
  .logo-icon svg { width: 20px; height: 20px; }
  .logo-text {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 1.8rem;
    color: white;
    letter-spacing: -0.02em;
    text-shadow: 0 0 12px rgba(255,167,68,0.6);
}
  .logo-text span { color: var(--amber); }

  .header-stats {
    display: flex;
    gap: 20px;
    align-items: center;
  }
  .stat-pill {
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 4px 12px;
    font-size: 0.75rem;
    color: rgba(255,255,255,0.7);
    display: flex; align-items: center; gap: 5px;
  }
  .stat-pill strong { color: var(--amber); font-weight: 600; }

  .btn-report {
    background: var(--amber);
    color: var(--navy);
    border: none;
    border-radius: 8px;
    padding: 9px 18px;
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
    transition: var(--transition);
    display: flex; align-items: center; gap: 6px;
    white-space: nowrap;
  }
  .btn-report:hover{
    background:var(--amber-glow);
    transform:translateY(-3px) scale(1.04);
    box-shadow:0 10px 28px rgba(245,158,11,.45);
}
  
.btn-login{
    background:#ff9e1b;
    color:white;
    border:none;
    padding:8px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    transition:0.3s;
}

.btn-login:hover{
    background:#e88d10;
}
.delete-btn{
    margin-top:8px;
    padding:6px 12px;
    border:none;
    border-radius:6px;
    background:#ef4444;
    color:white;
    cursor:pointer;
    transition:0.3s ease;
}

.delete-btn:hover{
    background:#dc2626;
    transform:scale(1.05);
}

  /* ── HERO ── */
  .hero {
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 60%, #1e3a6e 100%);
    padding: 48px 24px 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 70% 50%, rgba(245,158,11,0.08) 0%, transparent 60%);
    pointer-events: none;
  }
  .hero-grid-bg {
    position: absolute;
    inset: 0;
    background-image: 
      linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
  }
  .hero h1 {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    color: var(--white);
    letter-spacing: -0.03em;
    line-height: 1.15;
    position: relative;
    margin-bottom: 12px;
  }
  .hero h1 em {
    font-style: normal;
    color: var(--amber);
    background: linear-gradient(90deg, var(--amber), var(--amber-glow));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  .hero p {
    color: rgba(255,255,255,0.6);
    font-size: 1rem;
    max-width: 460px;
    margin: 0 auto;
    line-height: 1.6;
    position: relative;
  }

  /* ── FILTERS ── */
  .filter-bar {
    background: var(--white);
    border-bottom: 1px solid var(--chalk2);
    padding: 12px 24px;
    position: sticky;
    top: 64px;
    z-index: 90;
    box-shadow: 0 2px 8px rgba(26,39,68,0.06);
  }
  .filter-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
  }
  #searchInput:focus{
    border-color:#ff9e1b;
    box-shadow:0 0 15px rgba(255,158,27,0.35);
}
  .filter-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-right: 4px;
  }
  .filter-chip {
    border: 1.5px solid var(--chalk2);
    background: transparent;
    border-radius: 20px;
    padding: 8px 16px;
    font-size: 0.8rem;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    color: var(--muted);
    cursor: pointer;
    transition: var(--transition);
    display: flex; align-items: center; gap: 5px;
  }
  .filter-chip:hover{
    border-color:#ff9e1b;
    background:#ff9e1b;
    color:white;
    transform:translateY(-2px);
    box-shadow:0 8px 18px rgba(255,158,27,.35);
}
  .filter-chip.active{
    background:#ff9e1b;
    color:white;
    border-color:#ff9e1b;
    box-shadow:0 8px 18px rgba(255,158,27,.35);
}
  .filter-chip .dot {
    width: 7px; height: 7px;
    border-radius: 50%;
    background: currentColor;
    opacity: 0.6;
  }

  .sort-select {
    margin-left: auto;
    border: 1.5px solid var(--chalk2);
    border-radius: 8px;
    padding: 5px 10px;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    color: var(--asphalt);
    cursor: pointer;
    outline: none;
    background: var(--white);
  }

  /* ── MAIN LAYOUT ── */
  .main {
    max-width: 1100px;
    margin: 0 auto;
    padding: 28px 24px;
  }
  .section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  .section-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    color: var(--navy);
  }
  .count-badge {
    background: var(--navy);
    color: var(--white);
    border-radius: 20px;
    padding: 2px 10px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-left: 8px;
  }
  .issues-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 16px;
  }

  /* ── ISSUE CARD ── */
  .issue-card {
    background: var(--white);
    border-radius: var(--card-radius);
    border: 1.5px solid var(--chalk2);
    padding: 20px;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    cursor: default;
  }
  
  .issue-card:hover {
    border-color: #ffb24a;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    transform: translateY(-8px) scale(1.02);
}
  .card-accent {
    position: absolute;
    top: 0; left: 0;
    width: 4px; height: 100%;
    border-radius: 14px 0 0 14px;
  }

  .card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
  }
  .category-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    border-radius: 6px;
    padding: 3px 9px;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }
  .status-badge {
    border-radius: 6px;
    padding: 3px 9px;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: none;
    letter-spacing: 0.04em;
    border: 1.5px solid;
  }
  .status-reported { color: var(--amber); border-color: rgba(245,158,11,0.3); background: rgba(245,158,11,0.08); }
  .status-inprogress { color: var(--blue); border-color: rgba(59,130,246,0.3); background: rgba(59,130,246,0.08); }
  

  .card-title {
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    color: var(--navy);
    margin-bottom: 6px;
    line-height: 1.3;
  }
  .card-desc {
    font-size: 0.84rem;
    color: #5a6478;
    line-height: 1.55;
    margin-bottom: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .card-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    flex-wrap: wrap;
  }
  .meta-item {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 0.76rem;
    color: var(--muted);
  }
  .meta-item svg { width: 12px; height: 12px; flex-shrink: 0; }

  .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid var(--chalk2);
  }

  /* ── SIGNAL METER (signature element) ── */
  .signal-meter {
    display: flex;
    align-items: flex-end;
    gap: 3px;
    height: 20px;
  }
  .signal-bar {
    width: 5px;
    border-radius: 2px;
    background: var(--chalk2);
    transition: background 0.3s ease;
  }
  .signal-bar:nth-child(1) { height: 8px; }
  .signal-bar:nth-child(2) { height: 12px; }
  .signal-bar:nth-child(3) { height: 16px; }
  .signal-bar:nth-child(4) { height: 20px; }
  .signal-bar.active { background: var(--amber); }

  .upvote-btn {
    display: flex;
    align-items: center;
    gap: 7px;
    background: var(--chalk);
    border: 1.5px solid var(--chalk2);
    border-radius: 8px;
    padding: 6px 12px;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    font-size: 0.82rem;
    color: var(--muted);
    transition: var(--transition);
  }
  .upvote-btn:hover { border-color: var(--amber); color: var(--amber); background: rgba(245,158,11,0.06); }
  .upvote-btn.voted { border-color: var(--amber); color: var(--amber); background: rgba(245,158,11,0.1); }
  .upvote-btn svg { width: 14px; height: 14px; }
  .upvote-count { font-size: 0.85rem; }

  /* ── MODAL ── */
  .modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(10,18,40,0.65);
    backdrop-filter: blur(4px);
    z-index: 200;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
  }
  .modal-overlay.open { display: flex; }
  .modal {
    background: var(--white);
    border-radius: 18px;
    width: 100%;
    max-width: 520px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 24px 60px rgba(10,18,40,0.35);
    animation: modal-in 0.25s ease;
  }
  @keyframes modal-in {
    from { opacity: 0; transform: scale(0.95) translateY(10px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
  }
  .modal-header {
    padding: 24px 24px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .modal-title {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 1.2rem;
    color: var(--navy);
  }
  .modal-close {
    background: var(--chalk);
    border: none;
    border-radius: 8px;
    width: 32px; height: 32px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: var(--muted);
    font-size: 1.1rem;
    transition: var(--transition);
  }
  .modal-close:hover { background: var(--chalk2); color: var(--navy); }

  .modal-close:hover{
    background: var(--chalk2);
    color: var(--navy);
}

/* 👇 Paste the new CSS here */

.login-overlay{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.login-modal{
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    width: 320px;
}

.login-modal input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
}

.login-modal button{
    width:100%;
    padding:10px;
    margin-top:10px;
    border:none;
    border-radius:8px;
    background:#ff9e1b;
    color:white;
    cursor:pointer;
}
  .modal-body { padding: 20px 24px 24px; }



  .form-group { margin-bottom: 16px; }
  .form-label {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--asphalt);
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }
  .form-input, .form-textarea, .form-select {
    width: 100%;
    border: 1.5px solid var(--chalk2);
    border-radius: 8px;
    padding: 10px 12px;
    font-family: 'Inter', sans-serif;
    font-size: 0.9rem;
    color: var(--text);
    outline: none;
    transition: border-color var(--transition);
    background: var(--white);
  }
  .form-input:focus, .form-textarea:focus, .form-select:focus{
    outline:none;
    border-color:#ff9e1b;
    box-shadow:0 0 12px rgba(255,158,27,0.35);
}
  .form-textarea { resize: vertical; min-height: 90px; }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

  .severity-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
  }
  .severity-btn {
    border: 1.5px solid var(--chalk2);
    background: transparent;
    border-radius: 8px;
    padding: 8px 6px;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--muted);
    transition: var(--transition);
    text-align: center;
  }
  .severity-btn.active-low { border-color: var(--green); color: var(--green); background: rgba(16,185,129,0.07); }
  .severity-btn.active-medium { border-color: var(--amber); color: #d97706; background: rgba(245,158,11,0.07); }
  .severity-btn.active-high { border-color: var(--red); color: var(--red); background: rgba(239,68,68,0.07); }

  .submit-btn {
    width: 100%;
    background: var(--navy);
    color: var(--white);
    border: none;
    border-radius: 10px;
    padding: 13px;
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: var(--transition);
    margin-top: 4px;
    letter-spacing: 0.01em;
  }
  .submit-btn:hover { background: #243358; transform: translateY(-1px); }

  /* ── EMPTY STATE ── */
  .empty-state {
    text-align: center;
    padding: 60px 20px;
    color: var(--muted);
    grid-column: 1/-1;
  }
  .empty-state svg { width: 48px; height: 48px; margin-bottom: 12px; opacity: 0.3; }
  .empty-state p { font-size: 0.95rem; }

  /* ── TOAST ── */
  .toast {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%) translateY(80px);
    background: var(--navy);
    color: var(--white);
    padding: 12px 22px;
    border-radius: 30px;
    font-size: 0.88rem;
    font-weight: 500;
    z-index: 500;
    transition: transform 0.3s ease;
    display: flex; align-items: center; gap: 8px;
    box-shadow: 0 8px 30px rgba(10,18,40,0.35);
  }
  .toast.show { transform: translateX(-50%) translateY(0); }
  .toast .toast-icon { color: var(--amber); font-size: 1rem; }

  /* ── RESPONSIVE ── */
  @media (max-width: 640px) {
    .header-stats { display: flex; }
    .hero { padding: 32px 16px 28px; }
    .filter-inner { gap: 6px; }
    .sort-select { margin-left: 0; width: 100%; }
    .form-row { grid-template-columns: 1fr; }
    .issues-grid { grid-template-columns: 1fr; }
  }

  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
  }

.dark {
  background-color: #111827 !important;
}

.dark header {
  background-color: #000 !important;
}

.dark .hero {
  background: #000 !important;
}

.dark .filter-bar {
  background: #1f2937 !important;
}

.dark .issue-card {
  background: #1f2937 !important;
  color: white !important;
}

.dark .card-title,
.dark .card-desc,
.dark .section-title {
  color: white !important;
}

.about-section{
    max-width:1000px;
    margin:60px auto;
    padding:35px;
    background:white;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.about-section h2{
    color:#ff7a30;
    margin-bottom:18px;
    font-size:32px;
}


.about-section p{
    line-height:1.6;
    color:#555;
}

.about-section h3{
    color:#333;
    margin-top:25px;
    margin-bottom:12px;
    font-size:24px;
}

.about-highlights{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
    margin-top:30px;
}

.about-highlights span{
    background:#fff3eb;
    color:#ff7a30;
    padding:12px 22px;
    border-radius:30px;
    font-weight:600;
    box-shadow:0 6px 15px rgba(0,0,0,.08);
}
.dark .section-title {
  color: white !important;
}

.nav-links{
  display:flex;
  gap:20px;
  align-items:center;
  margin-left:30px;
}

.nav-links a{
    position:relative;
    text-decoration:none;
    color:white;
    font-weight:600;
    transition:0.3s;
}

.nav-links a:hover{
  color:#f59e0b;

align-items:center:
}
.nav-links a::after{
    content:"";
    position:absolute;
    left:0;
    bottom:-6px;
    width:0;
    height:2px;
    background:#f59e0b;
    transition:0.3s;
}

.nav-links a:hover::after{
    width:100%;
}
.header-inner{
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.nav-links{
  margin-left:auto;
  margin-right:30px;
}

.about-section p {
    line-height: 1.6;
    color: #555;
}

.about-section{
    transition:0.4s ease;
}

.about-section:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,0.2);
}

.stat-pill {
    font-size: 16px;
    font-weight: 700;
    padding: 8px 14px;
    border-radius: 20px;
}
.how-it-works{
    padding:50px 20px;
    text-align:center;
    background:#f8f9fc;
}

.steps{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
}

.step-card{
    background:white;
    padding:25px;
    width:220px;
    border-radius:15px;
    border-top:4px solid #f4a261;
    box-shadow:0 8px 25px rgba(0,0,0,0.12);
    transition:0.3s;
}
.step-card:hover{
    transform:translateY(-8px);
}

.step-card h3{
    color:#f4a261;
}
.how-it-works h2{
    font-size:2rem;
    color:#1a2744;
    margin-top:60px;
    margin-bottom:35px;
}
.footer{
    background:#1a2744;
    color:white;
    text-align:center;
    padding:40px 20px;
    margin-top:60px;
}

.footer h3{
    color:#f4a261;
    margin-bottom:10px;
}

.footer p{
    margin:8px 0;
}

.footer-links{
    margin:15px 0;
}

.footer-links a{
    color:white;
    text-decoration:none;
    margin:0 10px;
    transition:0.3s;
}

.footer-links a:hover{
    color:#f4a261;
}

.copyright{
    font-size:14px;
    opacity:0.8;
}
.about-section p{
    line-height:1.6;
    color:#555;
}

/* ADD HERE */

.hero-stats{
    display:flex;
    justify-content:center;
    gap:20px;
    margin-top:30px;
    flex-wrap:wrap;
}

.stat-box{
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(10px);
    padding:12px px 20px;
    border-radius:18px;
    text-align:center;
    color:white;
    min-width:140px;
    transition:0.3s ease;
    border:1px solid rgba(255,255,255,0.15);
}
.stat-box:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
}

.stat-box h3{
    color:#ffb24a;
    font-size:34px;
    font-weight:700;
    margin:0;
}
.stat-box p{
    margin-top:8px;
    font-size:15px;
    opacity:0.9;
}
#loader{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:#0f172a;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.spinner{
    width:60px;
    height:60px;
    border:6px solid rgba(255,255,255,.2);
    border-top:6px solid #ff9e1b;
    border-radius:50%;
    animation:spin 1s linear infinite;
}

#loader h2{
    color:white;
    margin-top:20px;
}

@keyframes spin{
  from {transform:rotate(0deg);}
  to{transform:rotate(360deg);}
}
html, body{
  overflow-x:hidden;
}

@media (max-width:768px){
  header{
    overflow-x:hidden;
}

.header-inner{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    height:auto;
    padding:15px 10px;
    gap:15px;
}

.logo{
    margin:0;
}
.logo-text{
  font-size:28px;
}

.nav-links{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    align-items:center;
    gap:10px;
    width:100%;
    margin:0;
}
.nav-links a{
  font-size:16px;
}

.btn-login{
    padding:8px 18px;
    font-size:14px;
}

.header-stats{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
    flex-wrap:nowrap;   /* Keep them on one line */
    width:100%;
}

.stat-pill{
    font-size:12px;
    padding:6px 8px;
}
.hero-stats{
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top:18px;
}

.stat-box{
    padding:8px 15px !important;
    min: height 80px !important;
    border-radius: 16px;
}

.stat-box h3{
    font-size:28px !important;
    margin:0 !important;
    line-height:1;
}

.stat-box p{
    font: size 16px !important;
    margin:4px!important;
    
}
.header > div[style]{
    display:flex !important;
    justify-content:center;
    align-items:center;
    flex-wrap:wrap;
    gap:10px !important;
    margin-top:10px;
    margin-bottom:20px;
}

#themeBtn{
    order:1;
}

.btn-report{
    order:2;
    padding:10px 16px;
    font-size:14px;
}
.btn-login{
  order:3;
}

.hero h1{
    font-size:38px;
    text-align:center;
}

.hero p{
    text-align:center;
    font-size:18px;
}

.hero-stats{
    display:grid;
    grid-template-columns:1fr;
    gap:10px;
    margin-top: 12px;
}
.stat-box{
    padding:10px 15px;
    min-height:75px;
}

.stat-box h3{
    font-size:28px;
    margin:0;
}

.stat-box p{
    margin-top:2px;
    font-size:14px;
}

.filters{
    flex-direction:column;
    align-items:stretch;
    gap:12px;
    margin-top: 18px;
}

.filters button,
.filters select{
    width:100%;
}

.issues-grid{
    grid-template-columns:1fr;
}

.steps{
    flex-direction:column;
    align-items:center;
}

footer{
    text-align:center;
}

}
</style>

</head>
<body>
<div id="loader">
    <div class="spinner"></div>
    <h2>CivicVoice</h2>
</div>
<!-- HEADER -->
<header>
  <div class="header-inner">
    <a class="logo" href="#">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="#1a2744" stroke-width="2.5" stroke-linecap="round">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
          <circle cx="12" cy="9" r="2.5"/>
        </svg>
      </div>
      <span class="logo-text">Civic<span>Voice</span></span>
    </a>
    <div class="nav-links">
  <a href="#home">Home</a>
  <a href="#reports">Reports</a>
  <a href="#about">About</a>
  <button class="btn-login" onclick="openLoginModal()">Login</button></div>


    <div class="header-stats">
      <div class="stat-pill">🔴 <strong id="stat-active">0</strong> active issues</div>
      <div class="stat-pill">✅ <strong id="stat-in-progress">0</strong> in-progress</div>
    </div>
  </div>

    <div 
    style="display:flex;align-items:center;gap:10px;">
    

          <button id="themeBtn"
           style="background:white;border:none;border-radius:8px;padding:8px 12px;cursor:pointer;">
    🌙
    </button>
    

    <button class="btn-report" onclick="openModal()">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Report Issue
    </button>
  </div>



</header>

<!-- HERO -->
<div class="hero" id="home">
  <div class="hero-grid-bg"></div>
  <h1>Your city.<br>Your <em>voice.</em></h1>
  <p>Report local issues — broken roads, water leaks, garbage, street lights — and let your community amplify what matters most.</p>
  <div class="hero-stats">
    <div class="stat-box">
        <h3 id="hero-total-reports">5</h3>
        <p>Reports</p>
    </div>

    <div class="stat-box">
        <h3>2</h3>
        <p>In Progress</p>
    </div>

    <div class="stat-box">
        <h3>5</h3>
        <p>Categories</p>
    </div>
</div>
</div>

<!-- FILTER BAR -->
<div class="filter-bar">
  <div class="filter-inner">

      <input
      type= "text"
      id="searchInput"
      placeholder="🔍 Search Issues"
      onkeyup="searchIssues()"
      style="
padding:10px 14px;
border:2px solid transparent;
border-radius:10px;
transition:0.3s;
outline:none;
">
  <span class="filter-label">Filter</span>
  <button class="filter-chip active"
    data-filter="all"
    onclick="setFilter('all', this)">
    All
</button>

<button class="filter-chip"
    data-filter="Roads & Potholes"
    onclick="setFilter('Roads & Potholes', this)">
    <span class="dot"></span>Roads
</button>

<button class="filter-chip"
    data-filter="Water & Drainage"
    onclick="setFilter('Water & Drainage', this)">
    <span class="dot"></span>Water
</button>

<button class="filter-chip"
    data-filter="Garbage & Waste"
    onclick="setFilter('Garbage & Waste', this)">
    <span class="dot"></span>Garbage
</button>

<button class="filter-chip"
    data-filter="Street Lighting"
    onclick="setFilter('Street Lighting', this)">
    <span class="dot"></span>Lighting
</button>

<button class="filter-chip"
    data-filter="Other"
    onclick="setFilter('Other', this)">
    <span class="dot"></span>Other
</button>

<select class="sort-select" onchange="setSort(this.value)">
    <option value="votes">Sort: Most Voted</option>
    <option value="newest">Sort: Newest</option>
    <option value="status">Sort: Status</option>
</select>
  </div>
</div>

<!-- HOW IT WORKS -->

<section class="how-it-works">
  <h2>How It Works</h2>

  <div class="steps">

    <div class="step-card">
      <h3>1. 📢Report</h3>
      <p>Citizens report local issues.</p>
    </div>

    <div class="step-card">
      <h3>2. 👍Vote</h3>
      <p>Community members upvote important issues.</p>
    </div>

    <div class="step-card">
      <h3>3. 🏛️ Resolve</h3>
      <p>Authorities resolve the issue.</p>
    </div>

  </div>
</section>

<main class="main" id="reports">
<!-- MAIN -->

  <div class="section-header">
    <div>
      <span class="section-title">Community Reports</span>
      <span class="count-badge" id="issue-count">0</span>
    </div>
  </div>
  <div class="issues-grid" id="issues-grid"></div>
</main>

<section class="about-section" id="about">
    <h2>About CivicVoice</h2>

<p>
CivicVoice is a community-driven platform that empowers citizens to report local civic issues such as potholes, garbage accumulation, water leakage, and faulty street lights.
</p>

<h3>🎯 Our Mission</h3>

<p>
To bridge the gap between citizens and local authorities by providing a simple, transparent, and community-powered reporting platform that promotes faster issue resolution and a cleaner, safer city.
</p>

<div class="about-highlights">
    <span>📍 Community Driven</span>
    <span>📢 Transparent Reporting</span>
    <span>⚡ Faster Action</span>
</div>
</section>

<AL -->
<div class="modal-overlay" id="modal" onclick="handleOverlayClick(event)">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title">Report an Issue</span>
      <button class="modal-close" onclick="closeModal()">✕</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label class="form-label">Issue Title *</label>
        <input type="text" class="form-input" id="f-title" placeholder="e.g. Large pothole on Main Street" maxlength="80">
      </div>
      <div class="form-group">
        <label class="form-label">Description *</label>
        <textarea class="form-textarea" id="f-desc" placeholder="Describe the problem clearly — what, where, how bad..."></textarea>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Category *</label>
          <select class="form-select" id="f-category">
            <option value="">Select category</option>
            <option value="Roads & Potholes">🛣Roads & Potholes</option>
            <option value="Water & Drainage">💧Water & Drainage</option>
            <option value="Garbage & Waste">🗑Garbage & Waste</option>
            <option value="Street Lighting">💡Street Lighting</option>
            <option value="Other">📌 Other</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Location *</label>
          <input type="text" class="form-input" id="f-location" placeholder="e.g. Park Street, Ward 5">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Severity</label>
        <div class="severity-row">
          <button class="severity-btn" data-sev="Low" onclick="setSeverity('Low', this)">🟢 Low</button>
          <button class="severity-btn" data-sev="Medium" onclick="setSeverity('Medium', this)">🟡 Medium</button>
          <button class="severity-btn" data-sev="High" onclick="setSeverity('High', this)">🔴 High</button>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Your Name (optional)</label>
        <input type="text" class="form-input" id="f-name" placeholder="Anonymous if left blank">
      </div>
      <div class="form-group">
  <label class="form-label">Upload Image</label>
  <input type="file" id="f-image" class="form-input" accept="image/*">
</div>
      <button class="submit-btn" onclick="submitIssue()">📡 Broadcast Issue</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <span class="toast-icon">✓</span>
  <span id="toast-msg">Issue reported!</span>
</div>

<script>
// ── STATE ──
let issues = [];

fetch("get_issues.php")
  .then(response => response.json())
  .then(data => {
      issues = data;

      console.log(issues.map(i => ({
    id: i.id,
    category: i.category,
    status: i.status
})));
      issues.forEach(issue => {
      if (!issue.status) {
          issue.status = 'reported';
      }
   });
      nextId = issues.length + 1;
      renderCards();
  });
  
let isAdmin = false;


let currentFilter = 'all';
let currentSort = 'votes';
let selectedSeverity = 'Medium';
let votedIds = new Set(JSON.parse(localStorage.getItem('civicsignal_voted') || '[]'));
let nextId = 1;

// ── CATEGORY CONFIG ──
const catConfig = {
  "Roads & Potholes": {
    color: "#ef4444",
    bg: "rgba(239,68,68,0.1)",
    icon: "🛣️"
  },
  "Water & Drainage": {
    color: "#3b82f6",
    bg: "rgba(59,130,246,0.1)",
    icon: "💧"
  },
  "Garbage & Waste": {
    color: "#10b981",
    bg: "rgba(16,185,129,0.1)",
    icon: "🗑️"
  },
  "Street Lighting": {
    color: "#f59e0b",
    bg: "rgba(245,158,11,0.1)",
    icon: "💡"
  },
  "Other": {
    color: "#8b5cf6",
    bg: "rgba(139,92,246,0.1)",
    icon: "📌"
  }
};

// ── SEED DATA ──
function seedData() {
  
}
    

// ── RENDER ──
function signalBars(votes) {
  const level = votes >= 50 ? 4 : votes >= 25 ? 3 : votes >= 10 ? 2 : 1;
  let bars = '';
  for (let i = 1; i <= 4; i++) {
    bars += `<div class="signal-bar ${i <= level ? 'active' : ''}"></div>`;
  }
  return bars;
}

function timeAgo(ts) {
  const diff = Date.now() - ts;
  const h = Math.floor(diff / 3600000);
  if (h < 1) return 'just now';
  if (h < 24) return `${h}h ago`;
  return `${Math.floor(h/24)}d ago`;
}

function statusLabel(s) {
  if (s === 'in-Progress') return ['In Progress', 'status-inprogress'];
  return ['Reported', 'status-reported'];
}

function renderCards() {
  const grid = document.getElementById('issues-grid');
  let filtered = currentFilter === 'all' ? [...issues] : issues.filter(i => i.category === currentFilter);

  if (currentSort === 'votes') filtered.sort((a,b) => b.votes - a.votes);
  else if (currentSort === 'newest') filtered.sort((a,b) => b.time - a.time);
  else if (currentSort === 'status') {
    const order = { 'in-Progress': 0, reported: 1};
    filtered.sort((a,b) => order[a.status] - order[b.status]);
  }

   document.getElementById('issue-count').textContent = filtered.length;

const active = issues.length;
const inprogress = issues.filter(i => i.status === 'in-Progress').length;
console.log("In Progress:",inprogress);
console.log(issues);
document.getElementById('stat-active').textContent = active;
document.getElementById('stat-in-progress').textContent = 2;
document.getElementById('hero-total-reports').textContent = active;


 if (filtered.length === 0) {
    grid.innerHTML = `
        <div style="
            text-align:center;
            padding:50px;
            color:#777;
            font-size:18px;">
            🔍 <br><br>
            <strong>No issues found</strong><br>
            Try another search or category.
        </div>
    `;
    return;
}

  grid.innerHTML = filtered.map(issue => {
    const cat = catConfig[issue.category] || catConfig.Other;
    const [statusText, statusClass] = statusLabel(issue.status);
    const voted = votedIds.has(issue.id);
    return `
    <div class="issue-card" id="card-${issue.id}">
      <div class="card-accent" style="background:${cat.color}"></div>
      <div class="card-top">
        <span class="category-badge" style="color:${cat.color};background:${cat.bg}">${cat.icon} ${issue.category}</span>
        <span class="status-badge ${statusClass}">${statusText}</span>
      </div>
      <div class="card-title">${escHtml(issue.title)}</div>
      <div class="card-desc">${escHtml(issue.description)}</div>
      ${issue.image ? `
<img src="${issue.image}"
     style="width:100%;
            border-radius:10px;
            margin-top:10px;
            max-height:220px;
            object-fit:cover;">
` : ''}

      <div class="card-meta">
        <span class="meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
          ${escHtml(issue.location)}
        </span>
        <span class="meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          ${timeAgo(issue.time)}
        </span>
        <span class="meta-item">👤 ${escHtml(issue.reporter)}</span>
        <span class="meta-item" style="color:${issue.severity==='High'?'#ef4444':issue.severity==='Medium'?'#d97706':'#10b981'}">
          ● ${issue.severity}
        </span>
      </div>
      <div class="card-footer">
        <div class="signal-meter" title="${issue.votes} upvotes">${signalBars(issue.votes)}</div>
        <button class="upvote-btn ${voted?'voted':''}" onclick="upvote(${issue.id})" id="uvbtn-${issue.id}">
          <svg viewBox="0 0 24 24" fill="${voted?'currentColor':'none'}" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z"/><path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
          <span class="upvote-count" id="vc-${issue.id}">${issue.votes}</span>
        </button>
      </div>
  
${isAdmin ? `
<button class="delete-btn" onclick="deleteIssue(${issue.id})">
🗑 Delete
</button>

` : ""}
</div>
`;
}).join('');
}

function escHtml(str) {
  return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// ── ACTIONS ──
function upvote(id) {
    if (votedIds.has(id)) {
        alert("You have already voted for this issue.");
        return;
    }

    fetch("upvote_issue.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + encodeURIComponent(id)
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {

            const issue = issues.find(i => i.id == id);
            if (issue) {
                issue.votes++;
            }

            votedIds.add(id);
            localStorage.setItem(
                "civicsignal_voted",
                JSON.stringify([...votedIds])
            );

            renderCards();

        } else {
            alert("Vote failed!");
        }
    });
}
function deleteIssue(id) {
    if (!confirm("Are you sure you want to delete this report?")) return;

    fetch("delete_issue.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + encodeURIComponent(id)
    })
    .then(res => res.text())
    .then(data => {
        if (data.trim() === "success") {
            issues = issues.filter(issue => issue.id != id);
            renderCards();
        } else {
            alert("Delete failed!");
        }
    });
}
  function changeStatus(id, status) {
    const issue = issues.find(i => i.id === id);
    if (!issue) return;

    issue.status = status;

    fetch("save_issue.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(issues)
});

    renderCards();
}

function setFilter(val, btn) {
  currentFilter = val;
  document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
  btn.classList.add('active');
  renderCards();
}

function setSort(val) {
  currentSort = val;
  renderCards();
}

function setSeverity(val, btn) {
    selectedSeverity = val;

    document.querySelectorAll(".severity-btn").forEach(b => {
        b.className = "severity-btn";
    });

    if (val === "Low") {
        btn.classList.add("active-low");
    } else if (val === "Medium") {
        btn.classList.add("active-medium");
    } else {
        btn.classList.add("active-high");
    }
}

// ── MODAL ──
function openModal() {
  document.getElementById('modal').classList.add('open');
  document.body.style.overflow = 'hidden';
  // reset severity
  setSeverity('Medium', document.querySelector('[data-sev="Medium"]'));
}
function closeModal() {
  document.getElementById('modal').classList.remove('open');
  document.body.style.overflow = '';
}
function handleOverlayClick(e) {
  if (e.target === document.getElementById('modal')) closeModal();
}

function submitIssue() {
  const title = document.getElementById('f-title').value.trim();
  const desc = document.getElementById('f-desc').value.trim();
  const category = document.getElementById('f-category').value;
  const location = document.getElementById('f-location').value.trim();
  const name = document.getElementById('f-name').value.trim() || 'Anonymous';
  const imageFile = document.getElementById('f-image').files[0];

  if (!title) { shakeFocus('f-title'); return; }
  if (!desc)  { shakeFocus('f-desc'); return; }
  if (!category) { shakeFocus('f-category'); return; }
  if (!location) { shakeFocus('f-location'); return; }

  issues.unshift({
    id: nextId++,
    title,
    description: desc,
    category,
    location,
    image: imageFile ? URL.createObjectURL(imageFile) : '',
    severity: selectedSeverity,
    votes: 0,
    status: 'reported',
    reporter: name,
    time: Date.now()
  });

  const formData = new FormData();

formData.append("title", title);
formData.append("description", desc);
formData.append("category", category);
formData.append("location", location);
formData.append("severity", selectedSeverity);
formData.append("reporter", name);
formData.append("image", imageFile );

fetch("save_issue.php", {
    method: "POST",
    body: formData
})
.then(res => res.text())
.then(data => console.log(data));

  // reset form
  ['f-title','f-desc','f-location','f-name'].forEach(id => document.getElementById(id).value = '');
  document.getElementById('f-category').value = '';
  selectedSeverity = 'Medium';

  closeModal();
  currentFilter = 'all';
  currentSort = 'newest';
  document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
  document.querySelector('[data-filter="all"]').classList.add('active');
  document.querySelector('.sort-select').value = 'newest';

  renderCards();
  showToast('📡 Issue broadcasted to the community!');
}

function shakeFocus(id) {
  const el = document.getElementById(id);
  el.style.borderColor = '#ef4444';
  el.focus();
  setTimeout(() => el.style.borderColor = '', 2000);
}

function showToast(msg) {

}


function searchIssues() {
    const value = document.getElementById("searchInput").value.toLowerCase();

    const cards = document.querySelectorAll(".issue-card");
    let found = false;

    cards.forEach(card => {

    const text = (
        card.querySelector(".card-title").innerText + " " +
        card.querySelector(".card-desc").innerText
    ).toLowerCase();

    if (text.includes(value)) {
        card.style.display = "block";
        found = true;
    } else {
        card.style.display = "none";
    }

});

    let msg = document.getElementById("noResults");

    if (!found) {
        if (!msg) {
            msg = document.createElement("div");
            msg.id = "noResults";
            msg.style.textAlign = "center";
            msg.style.padding = "40px";
            msg.style.fontSize = "20px";
            msg.innerHTML = "🔍<br><b>No issues found</b><br>Try another search.";
            document.getElementById("issues-grid").appendChild(msg);
        }
    } else {
        if (msg) msg.remove();
    }
}

// ── INIT ──

if (issues.length === 0) {
  seedData();
  fetch("save_issue.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify(issues)
});
}


function openLoginModal(){
    document.getElementById("loginModal").style.display="flex";
}

function closeLoginModal(){
    document.getElementById("loginModal").style.display="none";
}

function login() {
    const user = document.getElementById("username").value;
    const pass = document.getElementById("password").value;

    if (user == "admin" && pass == "1234") {
        isAdmin = true;
        console.log(isAdmin);
        renderCards();
        closeLoginModal();
        const btn = document.querySelector(".btn-login");
        btn.innerText = "Logout";
        btn.style.background = "green";
        btn.onclick = logout;
        alert("Welcome Admin!");
    } else {
        alert("Wrong Username or Password");
    }
}
function logout() {
    isAdmin = false;
    renderCards();

    const btn = document.querySelector(".btn-login");
    btn.innerText = "Login";
    btn.style.background = "#ff9e1b";
    btn.onclick = openLoginModal;

    alert("Logged out successfully!");
}
window.addEventListener("load", () => {
    setTimeout(() => {
        document.getElementById("loader").style.display = "none";
    }, 800);
});

document.getElementById("themeBtn")
.addEventListener("click", function() {

document.body.classList.toggle("dark");
});

</script>

<footer class="footer">
    <h3>CivicVoice</h3>

<p>Empowering citizens to report and solve local issues.</p>

<p>
📍 Community Driven &nbsp; | &nbsp;
📢 Transparent Reporting &nbsp; | &nbsp;
⚡ Faster Action
</p>

<div class="footer-links">
<a href="#">Home</a>
<a href="#reports">Reports</a>
<a href="#about">About</a>
</div>

<p>© 2026 CivicVoice | Web Development Project</p>
</footer>
<div id="loginModal" class="login-overlay" style="display:none;">
    <div class="login-modal">
    <h2 style="color:#1a2744;">🔐 Admin Login</h2>

    <input type="text" id="username" placeholder="Username">

    <input type="password" id="password" placeholder="Password">

    <button onclick="login()">Login</button>

    <button onclick="closeLoginModal()">Cancel</button>
  </div>
</div>
</body>
</html>

