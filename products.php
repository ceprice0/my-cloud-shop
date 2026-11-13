<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';
$signedInUser = signed_in_user();

$vehicles = vehicle_catalogue();

$makes = array_unique(array_map(function ($vehicle) {
    return $vehicle['make'];
}, $vehicles));
sort($makes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Browse the Price Prestige Motors collection of luxury and performance vehicles.">
<title>Inventory | Price Prestige Motors</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap');
:root{--ink:#171717;--muted:#737373;--cream:#f5f3ef;--white:#fff;--gold:#b79b68;--line:#dedbd4}
*{box-sizing:border-box;margin:0;padding:0}
body{background:var(--cream);color:var(--ink);font-family:"DM Sans",Arial,sans-serif}
a{color:inherit;text-decoration:none}
.nav{align-items:center;background:var(--white);display:flex;justify-content:space-between;padding:22px 6vw}
.brand{font-family:"Playfair Display",Georgia,serif;font-size:1.45rem}
.brand span{color:var(--gold);display:block;font-family:"DM Sans",Arial,sans-serif;font-size:.58rem;letter-spacing:.34em;margin-top:3px;text-transform:uppercase}
.nav-links{align-items:center;display:flex;gap:26px;font-size:.72rem;letter-spacing:.1em;text-transform:uppercase}
.nav-links a:hover{color:var(--gold)}
.nav-button{border:1px solid var(--ink);padding:11px 17px}
.menu-toggle{display:none}
.intro{background:var(--ink);color:var(--white);padding:80px 6vw}
.eyebrow{color:var(--gold);font-size:.72rem;font-weight:600;letter-spacing:.24em;text-transform:uppercase}
h1,h2{font-family:"Playfair Display",Georgia,serif;font-weight:500}
h1{font-size:clamp(2.8rem,6vw,5.2rem);line-height:1;margin:18px 0}
.intro p{color:#d7d2c7;line-height:1.7;max-width:570px}
.catalogue{margin:0 auto;max-width:1250px;padding:60px 6vw 90px}
.filters{background:var(--white);display:flex;flex-wrap:wrap;gap:12px;margin-bottom:38px;padding:20px}
select{background:var(--cream);border:1px solid var(--line);font:inherit;font-size:.75rem;padding:13px;min-width:170px}
.count{color:var(--muted);font-size:.75rem;letter-spacing:.08em;margin-left:auto;padding:14px 0;text-transform:uppercase}
.grid{display:grid;gap:22px;grid-template-columns:repeat(3,1fr)}
.card{background:var(--white)}
.photo{background:#d7d3cb;height:220px;overflow:hidden;position:relative}
.photo img{height:100%;object-fit:cover;width:100%}
.photo::after{border:1px solid rgba(255,255,255,.55);content:"";height:70%;left:9%;position:absolute;top:15%;width:82%}
.photo-credit{background:rgba(23,23,23,.72);bottom:0;color:#fff;font-size:.58rem;letter-spacing:.08em;padding:6px 9px;position:absolute;right:0;text-transform:uppercase}
.tag{background:var(--white);font-size:.63rem;left:14px;letter-spacing:.1em;padding:8px 10px;position:absolute;text-transform:uppercase;top:14px;z-index:2}
.details{padding:21px}
.details h2{font-size:1.35rem}
.meta{color:var(--muted);font-size:.76rem;line-height:1.7;margin:8px 0 18px}
.bottom{align-items:center;border-top:1px solid var(--line);display:flex;justify-content:space-between;padding-top:14px}
.price{font-size:1rem;font-weight:600}
.enquire{color:var(--gold);font-size:.68rem;letter-spacing:.12em;text-transform:uppercase}
.empty{display:none;grid-column:1/-1;padding:35px;text-align:center}
footer{border-top:1px solid var(--line);display:flex;justify-content:space-between;padding:27px 6vw}
footer p,footer a{color:var(--muted);font-size:.74rem}
@media(max-width:850px){.nav,footer{align-items:flex-start;flex-direction:column;gap:16px}.nav{position:relative}.menu-toggle{background:none;border:0;display:block;font-size:1.6rem;position:absolute;right:6vw;top:18px}.nav-links{display:none;flex-wrap:wrap;gap:14px;width:100%}.nav-links.open{display:flex}.grid{grid-template-columns:repeat(2,1fr)}.count{margin-left:0;width:100%}}
@media(max-width:550px){.grid{grid-template-columns:1fr}.intro{padding:60px 6vw}.filters{align-items:stretch;flex-direction:column}.filters select{width:100%}}
</style>
</head>
<body>
<nav class="nav">
    <a class="brand" href="index.php">Price Prestige Motors<span>Luxury &amp; Performance</span></a>
    <button class="menu-toggle" type="button" aria-label="Open menu" aria-expanded="false" onclick="this.nextElementSibling.classList.toggle('open'); this.setAttribute('aria-expanded', this.nextElementSibling.classList.contains('open'));">&#9776;</button>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="products.php">Inventory</a>
        <?php if ($signedInUser): ?>
            <a href="account.php">My account</a>
            <a href="favourites.php">Favourites</a>
            <a href="compare.php">Compare</a>
            <a href="enquiry.php">My enquiry</a>
            <a href="logout.php">Sign out</a>
        <?php else: ?>
            <a href="signin.php">Sign in</a>
            <a href="register.php">Create account</a>
        <?php endif; ?>
        <a class="nav-button" href="cart.php">Enquiry list</a>
    </div>
</nav>

<header class="intro">
    <div class="eyebrow">The Price Prestige Collection</div>
    <h1>Find your next<br>great drive.</h1>
    <p>A considered selection of luxury and performance vehicles. Every listing is prepared for an informed conversation with our team.</p>
</header>

<main class="catalogue">
    <form class="filters" id="filters">
        <select id="make" aria-label="Filter by make">
            <option value="">All makes</option>
            <?php foreach ($makes as $make): ?>
                <option value="<?php echo htmlspecialchars($make, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($make, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
        <select id="type" aria-label="Filter by vehicle type">
            <option value="">All vehicle types</option>
            <option>Sports car</option>
            <option>Luxury SUV</option>
            <option>Grand tourer</option>
        </select>
        <select id="sort" aria-label="Sort inventory">
            <option value="featured">Sort: Featured</option>
            <option value="low">Price: Low to high</option>
            <option value="high">Price: High to low</option>
            <option value="newest">Year: Newest first</option>
        </select>
        <span class="count" id="count"><?php echo count($vehicles); ?> vehicles available</span>
    </form>

    <div class="grid" id="inventory">
        <?php foreach ($vehicles as $vehicle): ?>
            <article class="card" data-make="<?php echo htmlspecialchars($vehicle['make'], ENT_QUOTES, 'UTF-8'); ?>" data-type="<?php echo htmlspecialchars($vehicle['type'], ENT_QUOTES, 'UTF-8'); ?>" data-price="<?php echo $vehicle['price']; ?>" data-year="<?php echo $vehicle['year']; ?>">
                <div class="photo">
                    <span class="tag"><?php echo htmlspecialchars($vehicle['tag'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <img src="<?php echo htmlspecialchars($vehicle['photo'], ENT_QUOTES, 'UTF-8'); ?>" alt="Representative <?php echo htmlspecialchars($vehicle['make'] . ' ' . $vehicle['model'], ENT_QUOTES, 'UTF-8'); ?> photography" loading="lazy">
                    <span class="photo-credit">Representative image</span>
                </div>
                <div class="details">
                    <h2><a href="vehicle.php?id=<?php echo urlencode($vehicle['id']); ?>"><?php echo htmlspecialchars($vehicle['make'] . ' ' . $vehicle['model'], ENT_QUOTES, 'UTF-8'); ?></a></h2>
                    <p class="meta"><?php echo $vehicle['year']; ?> &nbsp;·&nbsp; <?php echo htmlspecialchars($vehicle['mileage'], ENT_QUOTES, 'UTF-8'); ?><br><?php echo htmlspecialchars($vehicle['engine'], ENT_QUOTES, 'UTF-8'); ?> &nbsp;·&nbsp; <?php echo htmlspecialchars($vehicle['type'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="bottom">
                        <span class="price">&pound;<?php echo number_format($vehicle['price']); ?></span>
                        <a class="enquire" href="vehicle.php?id=<?php echo urlencode($vehicle['id']); ?>">View details &rarr;</a>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        <p class="empty" id="empty">No vehicles match those filters.</p>
    </div>
</main>

<footer>
    <p>&copy; Price Prestige Motors &nbsp;·&nbsp; Premium vehicles, exceptional service</p>
    <a href="stats.php">Dashboard</a>
</footer>
<script>
const filters = document.getElementById("filters");
const inventory = document.getElementById("inventory");
const count = document.getElementById("count");
const empty = document.getElementById("empty");
const cards = Array.from(inventory.querySelectorAll(".card"));

function updateInventory() {
    const make = document.getElementById("make").value;
    const type = document.getElementById("type").value;
    const sort = document.getElementById("sort").value;
    const visible = cards.filter((card) => (!make || card.dataset.make === make) && (!type || card.dataset.type === type));

    cards.forEach((card) => { card.hidden = !visible.includes(card); });
    visible.sort((a, b) => {
        if (sort === "low") return Number(a.dataset.price) - Number(b.dataset.price);
        if (sort === "high") return Number(b.dataset.price) - Number(a.dataset.price);
        if (sort === "newest") return Number(b.dataset.year) - Number(a.dataset.year);
        return cards.indexOf(a) - cards.indexOf(b);
    }).forEach((card) => inventory.appendChild(card));
    count.textContent = `${visible.length} vehicle${visible.length === 1 ? "" : "s"} available`;
    empty.style.display = visible.length ? "none" : "block";
}

filters.addEventListener("change", updateInventory);
</script>
</body>
</html>
