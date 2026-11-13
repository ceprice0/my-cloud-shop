<?php
require_once __DIR__ . '/auth.php';
$signedInUser = signed_in_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Price Prestige Motors - a curated collection of luxury and performance vehicles.">
<title>Price Prestige Motors | Luxury &amp; Performance Cars</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap');

:root {
    --ink: #171717;
    --muted: #737373;
    --cream: #f5f3ef;
    --white: #fff;
    --gold: #b79b68;
    --line: #dedbd4;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background: var(--cream);
    color: var(--ink);
    font-family: "DM Sans", Arial, sans-serif;
}

a {
    color: inherit;
    text-decoration: none;
}

.topbar {
    align-items: center;
    background: var(--ink);
    color: #d7d2c7;
    display: flex;
    font-size: 0.72rem;
    justify-content: space-between;
    letter-spacing: 0.14em;
    padding: 11px 6vw;
    text-transform: uppercase;
}

.topbar a:hover,
.nav-links a:hover {
    color: var(--gold);
}

.nav {
    align-items: center;
    background: var(--white);
    display: flex;
    justify-content: space-between;
    padding: 22px 6vw;
}

.brand {
    font-family: "Playfair Display", Georgia, serif;
    font-size: 1.45rem;
    letter-spacing: 0.03em;
}

.brand span {
    color: var(--gold);
    display: block;
    font-family: "DM Sans", Arial, sans-serif;
    font-size: 0.58rem;
    letter-spacing: 0.34em;
    margin-top: 3px;
    text-transform: uppercase;
}

.nav-links {
    align-items: center;
    display: flex;
    gap: 29px;
    letter-spacing: 0.1em;
    font-size: 0.74rem;
    text-transform: uppercase;
}

.nav-links .nav-button {
    border: 1px solid var(--ink);
    padding: 11px 17px;
}

.hero {
    background: linear-gradient(90deg, rgba(10, 10, 10, 0.78), rgba(10, 10, 10, 0.12)),
        url("https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=2000&q=85") center 63% / cover;
    color: var(--white);
    min-height: 570px;
    padding: 150px 6vw 90px;
}

.eyebrow {
    color: var(--gold);
    font-size: 0.72rem;
    font-weight: 600;
    letter-spacing: 0.24em;
    text-transform: uppercase;
}

.hero h1 {
    font-family: "Playfair Display", Georgia, serif;
    font-size: clamp(3rem, 7vw, 6.4rem);
    font-weight: 500;
    line-height: 0.98;
    margin: 22px 0;
    max-width: 720px;
}

.hero p {
    color: #e5e1da;
    font-size: 1.05rem;
    line-height: 1.7;
    max-width: 480px;
}

.hero-actions {
    display: flex;
    gap: 13px;
    margin-top: 33px;
}

.button {
    border: 1px solid var(--white);
    display: inline-block;
    font-size: 0.74rem;
    letter-spacing: 0.14em;
    padding: 15px 23px;
    text-transform: uppercase;
}

.button.primary {
    background: var(--gold);
    border-color: var(--gold);
    color: var(--ink);
}

.button:hover {
    opacity: 0.82;
}

.search-panel {
    background: var(--white);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    margin: -52px auto 0;
    max-width: 1130px;
    padding: 28px 32px;
    position: relative;
}

.search-panel h2 {
    font-family: "Playfair Display", Georgia, serif;
    font-size: 1.45rem;
    font-weight: 500;
    margin-bottom: 20px;
}

.search-fields {
    display: grid;
    gap: 12px;
    grid-template-columns: repeat(4, 1fr) auto;
}

select,
.search-button {
    background: var(--cream);
    border: 1px solid var(--line);
    color: var(--ink);
    font: inherit;
    font-size: 0.75rem;
    padding: 14px;
}

.search-button {
    background: var(--ink);
    color: var(--white);
    cursor: pointer;
    letter-spacing: 0.12em;
    padding: 14px 22px;
    text-transform: uppercase;
}

.section {
    margin: 0 auto;
    max-width: 1250px;
    padding: 100px 6vw;
}

.section-heading {
    align-items: end;
    display: flex;
    justify-content: space-between;
    margin-bottom: 35px;
}

.section-heading h2 {
    font-family: "Playfair Display", Georgia, serif;
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 500;
    margin-top: 13px;
}

.section-heading a {
    border-bottom: 1px solid var(--ink);
    font-size: 0.72rem;
    letter-spacing: 0.14em;
    padding-bottom: 7px;
    text-transform: uppercase;
}

.inventory-grid {
    display: grid;
    gap: 22px;
    grid-template-columns: repeat(3, 1fr);
}

.vehicle-card {
    background: var(--white);
}

.vehicle-image {
    height: 245px;
    overflow: hidden;
    position: relative;
}

.vehicle-image img {
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
    width: 100%;
}

.vehicle-card:hover .vehicle-image img {
    transform: scale(1.05);
}

.vehicle-tag {
    background: var(--white);
    font-size: 0.65rem;
    left: 15px;
    letter-spacing: 0.12em;
    padding: 8px 10px;
    position: absolute;
    text-transform: uppercase;
    top: 15px;
}

.vehicle-info {
    padding: 23px;
}

.vehicle-info h3 {
    font-family: "Playfair Display", Georgia, serif;
    font-size: 1.45rem;
    font-weight: 500;
}

.vehicle-meta {
    color: var(--muted);
    font-size: 0.78rem;
    margin: 8px 0 20px;
}

.vehicle-bottom {
    align-items: center;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
    padding-top: 15px;
}

.vehicle-price {
    font-size: 1.05rem;
    font-weight: 600;
}

.vehicle-link {
    color: var(--gold);
    font-size: 0.7rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

.brand-strip {
    background: var(--ink);
    color: #e2ddd3;
    display: grid;
    gap: 25px;
    grid-template-columns: repeat(3, 1fr);
    padding: 46px 8vw;
    text-align: center;
}

.brand-strip strong {
    color: var(--gold);
    display: block;
    font-family: "Playfair Display", Georgia, serif;
    font-size: 2rem;
    font-weight: 500;
    margin-bottom: 7px;
}

.brand-strip span {
    font-size: 0.7rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
}

footer {
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 30px 6vw;
}

footer p,
footer a {
    color: var(--muted);
    font-size: 0.75rem;
}

@media (max-width: 800px) {
    .topbar,
    .nav,
    footer {
        align-items: flex-start;
        flex-direction: column;
        gap: 14px;
    }

    .nav-links {
        flex-wrap: wrap;
        gap: 15px;
    }

    .hero {
        min-height: 500px;
        padding-top: 105px;
    }

    .search-fields,
    .inventory-grid {
        grid-template-columns: 1fr;
    }

    .search-panel {
        margin: 0;
    }

    .section-heading {
        align-items: flex-start;
        flex-direction: column;
        gap: 20px;
    }

    .brand-strip {
        grid-template-columns: 1fr;
    }
}
</style>
</head>

<body>
<div class="topbar">
    <span>Curated luxury &amp; performance vehicles</span>
    <a href="<?php echo $signedInUser ? 'enquiry.php' : 'signin.php'; ?>">Enquire with our team &rarr;</a>
</div>

<nav class="nav">
    <a class="brand" href="index.php">
        Price Prestige Motors
        <span>Luxury &amp; Performance</span>
    </a>
    <div class="nav-links">
        <a href="#inventory">Inventory</a>
        <a href="#about">Our Approach</a>
        <?php if ($signedInUser): ?>
            <a href="account.php">My account</a>
            <a href="enquiry.php">My enquiry</a>
            <a class="nav-button" href="logout.php">Sign out</a>
        <?php else: ?>
            <a href="signin.php">Sign in</a>
            <a class="nav-button" href="register.php">Create account</a>
        <?php endif; ?>
    </div>
</nav>

<main>
    <section class="hero">
        <div class="eyebrow">The Price Prestige Collection</div>
        <h1>Cars worth<br>driving.</h1>
        <p>Exceptional sports and luxury vehicles, selected for their character, provenance and ability to make every journey memorable.</p>
        <div class="hero-actions">
            <a class="button primary" href="#inventory">Explore inventory</a>
            <a class="button" href="<?php echo $signedInUser ? 'enquiry.php' : 'signin.php'; ?>">Arrange a viewing</a>
        </div>
    </section>

    <section class="search-panel" aria-label="Search inventory">
        <h2>Find your next car</h2>
        <form class="search-fields">
            <select aria-label="Make">
                <option>Any make</option>
                <option>Aston Martin</option>
                <option>Porsche</option>
                <option>Mercedes-Benz</option>
            </select>
            <select aria-label="Model">
                <option>Any model</option>
                <option>911</option>
                <option>DBX</option>
                <option>AMG GT</option>
            </select>
            <select aria-label="Price">
                <option>Any price</option>
                <option>Under &pound;50,000</option>
                <option>&pound;50,000 - &pound;100,000</option>
                <option>Over &pound;100,000</option>
            </select>
            <select aria-label="Vehicle type">
                <option>All vehicles</option>
                <option>Sports cars</option>
                <option>Luxury SUVs</option>
            </select>
            <button class="search-button" type="submit">Search</button>
        </form>
    </section>

    <section class="section" id="inventory">
        <div class="section-heading">
            <div>
                <div class="eyebrow">The latest arrivals</div>
                <h2>Featured vehicles</h2>
            </div>
            <a href="products.php">View all inventory &rarr;</a>
        </div>
        <div class="inventory-grid">
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1000&q=85" alt="Performance sports car">
                    <span class="vehicle-tag">New arrival</span>
                </div>
                <div class="vehicle-info">
                    <h3>Porsche 911 Carrera 4S</h3>
                    <p class="vehicle-meta">2023 &nbsp;·&nbsp; 8,420 miles &nbsp;·&nbsp; Automatic</p>
                    <div class="vehicle-bottom">
                        <span class="vehicle-price">&pound;112,950</span>
                        <a class="vehicle-link" href="<?php echo $signedInUser ? 'enquiry.php' : 'signin.php'; ?>">Enquire &rarr;</a>
                    </div>
                </div>
            </article>
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="https://images.unsplash.com/photo-1542282088-72c9c27ed0cd?auto=format&fit=crop&w=1000&q=85" alt="Luxury sports coupe">
                    <span class="vehicle-tag">Featured</span>
                </div>
                <div class="vehicle-info">
                    <h3>Aston Martin Vantage</h3>
                    <p class="vehicle-meta">2022 &nbsp;·&nbsp; 12,180 miles &nbsp;·&nbsp; Automatic</p>
                    <div class="vehicle-bottom">
                        <span class="vehicle-price">&pound;84,500</span>
                        <a class="vehicle-link" href="<?php echo $signedInUser ? 'enquiry.php' : 'signin.php'; ?>">Enquire &rarr;</a>
                    </div>
                </div>
            </article>
            <article class="vehicle-card">
                <div class="vehicle-image">
                    <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?auto=format&fit=crop&w=1000&q=85" alt="Luxury performance car">
                    <span class="vehicle-tag">Collection</span>
                </div>
                <div class="vehicle-info">
                    <h3>Mercedes-AMG GT</h3>
                    <p class="vehicle-meta">2024 &nbsp;·&nbsp; 2,100 miles &nbsp;·&nbsp; Automatic</p>
                    <div class="vehicle-bottom">
                        <span class="vehicle-price">&pound;126,750</span>
                        <a class="vehicle-link" href="<?php echo $signedInUser ? 'enquiry.php' : 'signin.php'; ?>">Enquire &rarr;</a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="brand-strip" id="about">
        <div><strong>01</strong><span>Carefully curated</span></div>
        <div><strong>02</strong><span>Expertly prepared</span></div>
        <div><strong>03</strong><span>Personally delivered</span></div>
    </section>
</main>

<footer>
    <p>&copy; Price Prestige Motors &nbsp;·&nbsp; Luxury vehicles, exceptional service</p>
    <a href="stats.php">Dashboard</a>
</footer>
</body>
</html>
