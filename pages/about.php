<?php $pageTitle = 'About'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>
<?php $assetBase = ($baseUrl !== '' ? $baseUrl : '') . '/'; ?>

<style>
  /* ── Hero Section ── */
  .about-hero {
    background: linear-gradient(135deg, #f0f6ff 0%, #f8fafc 60%, #e8f4f0 100%);
    padding: 80px 0 72px;
  }

  .about-hero .label {
    font-size: 0.72rem;
    letter-spacing: 0.14em;
    font-weight: 700;
    color: #2563eb;
    text-transform: uppercase;
    margin-bottom: 12px;
  }

  .about-hero h1 {
    font-size: clamp(1.75rem, 3.5vw, 2.5rem);
    font-weight: 800;
    line-height: 1.2;
    color: #0f172a;
    margin-bottom: 18px;
  }

  .about-hero p {
    font-size: 1rem;
    line-height: 1.75;
    color: #475569;
  }

  /* Values card */
  .values-card {
    border: 0;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(15,23,42,0.08);
    background: #fff;
    overflow: hidden;
  }

  .values-card .card-body {
    padding: 32px 36px;
  }

  .values-card h2 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 20px;
  }

  .values-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .values-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 10px 0;
    font-size: 0.95rem;
    color: #334155;
    border-bottom: 1px solid #f1f5f9;
  }

  .values-list li:last-child {
    border-bottom: none;
    padding-bottom: 0;
  }

  .values-list li::before {
    content: '';
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    margin-top: 1px;
    background: #dbeafe;
    border-radius: 50%;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232563eb'%3E%3Cpath d='M13.78 4.22a.75.75 0 0 1 0 1.06l-7.25 7.25a.75.75 0 0 1-1.06 0L2.22 9.28a.75.75 0 0 1 1.06-1.06L6 10.94l6.72-6.72a.75.75 0 0 1 1.06 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: center;
    background-size: 11px;
  }

  /* ── Team Photo Section ── */
  .team-section {
    padding: 80px 0;
    background: #fff;
  }

  .team-section .section-label {
    font-size: 0.72rem;
    letter-spacing: 0.14em;
    font-weight: 700;
    color: #2563eb;
    text-transform: uppercase;
    margin-bottom: 10px;
  }

  .team-section h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 8px;
  }

  .team-section .section-sub {
    font-size: 0.97rem;
    color: #64748b;
    margin-bottom: 40px;
    max-width: 520px;
  }

  /* Photo grid — equal height, equal width, object-fit crop */
  .about-photo-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  @media (max-width: 767px) {
    .about-photo-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (min-width: 768px) and (max-width: 991px) {
    .about-photo-grid {
      grid-template-columns: repeat(2, 1fr);
    }
    .about-photo-frame:nth-child(3) {
      grid-column: 1 / -1;
    }
  }

  .about-photo-frame {
    margin: 0;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 2px 16px rgba(15,23,42,0.09);
    aspect-ratio: 4 / 3;          /* fixed ratio keeps all cards equal height */
    position: relative;
    background: #e2e8f0;           /* placeholder while loading */
    transition: box-shadow 0.25s ease, transform 0.25s ease;
  }

  .about-photo-frame:hover {
    box-shadow: 0 8px 32px rgba(15,23,42,0.14);
    transform: translateY(-3px);
  }

  .about-photo-img {
    width: 100%;
    height: 100%;
    object-fit: cover;             /* fills the frame, crops uniformly */
    object-position: center;
    display: block;
    transition: transform 0.4s ease;
  }

  .about-photo-frame:hover .about-photo-img {
    transform: scale(1.04);
  }

  /* Optional caption overlay */
  .about-photo-frame figcaption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px 14px;
    font-size: 0.78rem;
    color: #fff;
    background: linear-gradient(to top, rgba(15,23,42,0.65) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .about-photo-frame:hover figcaption {
    opacity: 1;
  }
</style>

<!-- ─── Hero ─── -->
<section class="about-hero">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7">
                <p class="label">About Coliconstruct</p>
                <h1>Built Around Reliable Home And Commercial HVAC Service</h1>
                <p class="mb-3">
                    Coliconstruct Engineering Services supports homeowners, offices, and commercial facilities with
                    complete HVAC solutions. From the first site visit to final testing, our team focuses on safe,
                    efficient, and standards-compliant work.
                </p>
                <p class="mb-0">
                    We combine practical field experience with organized service coordination so clients always know
                    what has been completed, what is next, and how to maintain long-term system performance.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="values-card card">
                    <div class="card-body">
                        <h2>What We Stand For</h2>
                        <ul class="values-list">
                            <li>Safety-first workmanship on every job</li>
                            <li>Clear communication from start to finish</li>
                            <li>Quality checks before handover</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── Team Photos ─── -->
<section class="team-section">
    <div class="container">
        <p class="section-label">Our People</p>
        <h2>Our Team In Action</h2>
        <p class="section-sub">A glimpse of our technicians at work — in the field, on-site, and getting the job done right.</p>

        <?php
        $aboutPhotos = [
            ['file' => 'assets/img/29472573_1886287614717830_6583482397096935424_n.jpg', 'alt' => 'Technician installing a ceiling cassette AC unit'],
            ['file' => 'assets/img/37295105_2035281156485141_2584649359534587904_n.jpg', 'alt' => 'Technician repairing internal unit wiring'],
            ['file' => 'assets/img/492536138_1263499459118021_1464243761203641130_n.jpg', 'alt' => 'Field team performing HVAC cleaning in a commercial kitchen'],
        ];
        ?>

        <div class="about-photo-grid">
            <?php foreach ($aboutPhotos as $photo): ?>
            <figure class="about-photo-frame">
                <img
                    class="about-photo-img"
                    src="<?php echo htmlspecialchars($assetBase . $photo['file'], ENT_QUOTES, 'UTF-8'); ?>"
                    alt="<?php echo htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8'); ?>"
                    loading="lazy"
                    onerror="this.onerror=null;this.src='<?php echo htmlspecialchars($assetBase . 'assets/img/imageSample.png', ENT_QUOTES, 'UTF-8'); ?>';"
                >
                <figcaption><?php echo htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8'); ?></figcaption>
            </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>