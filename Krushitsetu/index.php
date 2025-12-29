<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KrushitSetu – Digital Agriculture Platform</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif}
body{background:#f5f7f6;color:#333}

/* HEADER */
header{
  position:fixed;top:0;left:0;width:100%;
  background:#1b5e20;padding:12px 40px;
  display:flex;justify-content:space-between;align-items:center;
  z-index:1000
}
.logo{display:flex;align-items:center;gap:10px;color:#fff}
.logo img{width:42px;height:42px;border-radius:50%;background:#fff}

nav{display:flex;align-items:center}
nav a,nav button{
  margin-left:10px;padding:8px 16px;border-radius:20px;
  border:none;cursor:pointer;font-weight:600;
  text-decoration:none;color:#fff;transition:.3s;
  position:relative;background:none
}
nav a:hover{background:rgba(255,255,255,.2)}
nav a.active-link::after{
  content:'';
  position:absolute;left:20%;bottom:-6px;
  width:60%;height:3px;background:#00e676;border-radius:5px
}
.icon-btn{font-size:18px}

.buyer-btn{background:#fff;color:#1b5e20}
.farmer-btn{background:#c8e6c9;color:#1b5e20}

/* HERO */
.hero{
  height:100vh;
  background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
  url('https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHZlZ2V0YWJsZXN8ZW58MHx8MHx8fDA%3D') center/cover;
  display:flex;align-items:center;justify-content:center;
  text-align:center;color:#fff;padding-top:90px;flex-direction: column;
}
.hero h1{font-size:46px}
.hero p{font-size:20px;margin-top:10px}

/* SECTIONS */
.highlights,.how,.categories,.about{padding:80px 40px;background:#fff}
.highlights{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:25px}
.highlight{
  background:#f1f8e9;padding:30px;border-radius:18px;
  text-align:center;transition:.3s
}
.highlight:hover{transform:translateY(-10px);box-shadow:0 18px 30px rgba(0,0,0,.2)}
.highlight i{font-size:34px;color:#2e7d32;margin-bottom:10px}
 /* How it works */
    .how{padding:80px 40px;text-align:center}
    .how h2{color:#2e7d32;margin-bottom:40px}
    .steps{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:30px}
    .step{background:#fff;padding:30px;border-radius:18px;box-shadow:0 10px 20px rgba(0,0,0,.12)}
    .step i{font-size:34px;color:#43a047;margin-bottom:15px}


html{
  scroll-behavior:smooth;
  scroll-padding-top:90px;
}


/* CATEGORIES */
.cat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:25px}
.cat-card{
  background:#fff;border-radius:18px;overflow:hidden;
  box-shadow:0 10px 20px rgba(0,0,0,.15);
  cursor:pointer;transition:.3s
}
.cat-card:hover{transform:scale(1.05)}
.cat-card img{width:100%;height:150px;object-fit:cover}
.cat-card h3{text-align:center;padding:15px}

/* PRODUCTS */
.products{display:none;padding:60px 40px}
.product-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:25px}
.product{
  background:#fff;border-radius:18px;
  box-shadow:0 10px 20px rgba(0,0,0,.15);overflow:hidden
}
.product img{width:100%;height:150px;object-fit:cover}
.pcontent{padding:15px}
.pcontent input{width:100%;padding:8px;border-radius:8px;border:1px solid #ccc}

/* FORMS */
.form-section{display:none;padding:80px 20px;max-width:850px;margin:auto}
.active-form{display:block}
form{
  background:#fff;padding:40px;border-radius:22px;
  box-shadow:0 15px 30px rgba(0,0,0,.15)
}
.field{margin-bottom:15px}
.field label{display:block;font-weight:600;margin-bottom:6px}
.field input,.field select,.field textarea{
  width:100%;padding:10px;border-radius:10px;border:1px solid #ccc
}
.tech-grid{
  display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:25px;margin-top:30px
}
.tech-card{
  background:#f1f8e9;padding:25px;border-radius:18px;
  box-shadow:0 10px 20px rgba(0,0,0,.15);text-align:center
}
.tech-card i{font-size:36px;color:#2e7d32;margin-bottom:10px}

.address-box{
  border:2px solid #c8e6c9;
  padding:20px;border-radius:15px;margin-bottom:20px
}
.address-box legend{padding:0 10px;font-weight:700;color:#2e7d32}
.address-box input{margin-bottom:10px}

.submit-btn{
  width:100%;padding:12px;border:none;border-radius:25px;
  background:#2e7d32;color:#fff;font-size:16px
}
.about-final{
  background:linear-gradient(135deg,#1b5e20,#4caf50);
  color:#fff;padding:80px 40px;text-align:center
}
.about-box{
  max-width:900px;margin:auto;background:rgba(255,255,255,.12);
  padding:40px;border-radius:25px
}
.login-link{text-align:center;margin-top:10px}
.login-link a{color:#2e7d32;font-weight:600;cursor:pointer}

footer{text-align:center;padding:20px;background:#1b5e20;color:#fff}
</style>
</head>

<body>

<header>
  
    
  <img src="K.jpg" style="width:172px;height:88px;">
   

  <nav><span id="profileBox" style="display:none;color:#fff">
  👤 <span id="pname"></span>
</span>

    <a href="#home" class="active-link">Home</a>
    <a href="#categories">Products</a>
    <a href="farmer_tech.php" class="nav-btn">Farmer Tech</a>

    <button class="icon-btn"><i class="fa fa-search"></i></button>
    <button class="icon-btn"><i class="fa fa-cart-shopping"></i></button>
    <button class="buyer-btn" onclick="openBuyer()">Buyer</button>
    <button class="farmer-btn" onclick="openFarmer()">Farmer</button>
  </nav>
</header>

<!-- BUYER / FARMER AUTH -->
<section id="authSection" class="form-section">
  <form id="registerForm" enctype="multipart/form-data">
    <h2 id="roleTitle">Create Account</h2>

    <input type="hidden" name="role" id="role">

    <div class="field">
      <label>Name</label>
      <input name="name" required>
    </div>

    <div class="field">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>

    <div class="field">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>

    <div class="field">
      <label>Contact</label>
      <input name="contact" required>
    </div>

    <fieldset class="address-box">
  <legend>Address</legend>

  <input name="flat_no" placeholder="Flat / Plot No" required>
  <input name="area" placeholder="Area / Locality" required>
  <input name="city" placeholder="City" required>
  <input name="state" placeholder="State" required>
  <input name="pincode" placeholder="Pincode" required>
</fieldset>


    <!-- FARMER EXTRA -->
    <div class="field" id="organicBox" style="display:none">
      <label>
        <input type="checkbox" name="is_organic" value="1" onchange="toggleCert(this)">
        Organic Farmer
      </label>
    </div>
<br>
    <div class="field" id="certBox" style="display:none">
      <label>NPOP Certificate</label>
      <input type="file" name="certificate">
    </div>

    <button type="button" class="submit-btn" onclick="registerUser()">Create Account</button>


    <div class="login-link">
      Already have account?
      <a onclick="openLogin()">Login</a>
    </div>
  </form>
</section>

<!-- LOGIN -->
<section id="loginSection" class="form-section">
  <form>
    <h2>Login</h2>
<br><br>
    <div class="field">
      <label>Email</label>
      <input id="loginEmail">
    </div>

    <div class="field">
      <label>Password</label>
      <input type="password" id="loginPass">
    </div>

    <button type="button" class="submit-btn" onclick="login()">Login</button>

    <div class="login-link">
      New user?
      <a onclick="openRegister()">Create account</a>
    </div>
  </form>
</section>

<section class="hero" id="home">
  <div>
    <h1>From Indian Farms to Every Home</h1>
    <p style=text-align:center;font-size:30px>Krushitsetu connects farmers and consumers directly using technology, ensuring fair pricing, transparency and fresh farm produce.</p>
  </div>
</section>

<section class="highlights">
  <div class="highlight"><i class="fa fa-cart-shopping"></i><h3>Pre-Order</h3></div>
  <div class="highlight"><i class="fa fa-repeat"></i><h3>Subscription</h3></div>
  <div class="highlight"><i class="fa fa-leaf"></i><h3>Organic Verified</h3></div>
  <div class="highlight"><i class="fa fa-handshake"></i><h3>Fair Pricing</h3></div>
</section>
<section class="how">
  <h2>How KisanSetu Works</h2>
  <div class="steps">
    <div class="step"><i class="fa-solid fa-user-plus"></i><h4>Register</h4><p>Buyer or Farmer creates account</p></div>
    <div class="step"><i class="fa-solid fa-seedling"></i><h4>List / Select Produce</h4><p>Farmers list, buyers choose</p></div>
    <div class="step"><i class="fa-solid fa-truck"></i><h4>Farm to Home</h4><p>Fresh delivery ensured</p></div>
  </div>
</section>
<section class="categories" id="categories">
  <h2>Shop by Category</h2><br>
  <div class="cat-grid">
    <div class="cat-card" onclick="showProducts('veg')">
      <img src="https://plus.unsplash.com/premium_photo-1675798983878-604c09f6d154?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
      <h3>Vegetables</h3>
    </div>
    <div class="cat-card" onclick="showProducts('fruit')">
      <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZnJ1aXR8ZW58MHx8MHx8fDA%3D">
      <h3>Fruits</h3>
    </div>
    <div class="cat-card" onclick="showProducts('grain')">
      <img src="https://images.unsplash.com/photo-1621956838481-f8f616950454?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JhaW5zfGVufDB8fDB8fHww">
      <h3>Grains</h3>
    </div>
  </div>
</section>

<section class="products" id="products"></section>



<section class="about-final">
<div class="about-box">
<h2>About KrushitSetu</h2><br>
<p>
KrushitSetu bridges the gap between farmers and consumers using technology.
We empower farmers, ensure fair pricing, and deliver fresh produce directly
from farms to homes across India.
</p>
</div>
</section>




<footer>© 2025 KrushitSetu</footer>

<script>
let currentRole = null;

const productsData={
  veg:[{n:'Tomato',p:40},{n:'Potato',p:30}],
  fruit:[{n:'Apple',p:120},{n:'Banana',p:40}],
  grain:[{n:'Rice',p:50},{n:'Wheat',p:35}]
};

function showProducts(type){
  const sec=document.getElementById('products');
  sec.innerHTML='<h2>'+type.toUpperCase()+'</h2><div class="product-grid">'+
  productsData[type].map(p=>`
    <div class="product">
      <img src="https://via.placeholder.com/300">
      <div class="pcontent">
        <h4>${p.n}</h4>
        <p>₹${p.p}/kg</p>
        <input type="number" placeholder="Quantity">
      </div>
    </div>
  `).join('')+'</div>';
  sec.style.display='block';
}

let selectedRole = '';

function openBuyer(){
  document.getElementById('role').value = 'buyer';
  document.getElementById('roleTitle').innerText = 'Buyer Registration';

  document.getElementById('organicBox').style.display = 'none';
  document.getElementById('certBox').style.display = 'none';

  document.getElementById('authSection').classList.add('active-form');
}

function openFarmer(){
  document.getElementById('role').value = 'farmer';
  document.getElementById('roleTitle').innerText = 'Farmer Registration';

  document.getElementById('organicBox').style.display = 'block';
  document.getElementById('certBox').style.display = 'none';

  document.getElementById('authSection').classList.add('active-form');
}

function toggleCert(box){
  document.getElementById('certBox').style.display =
    box.checked ? 'block' : 'none';
}

function openLogin(){
  document.getElementById('authSection').classList.remove('active-form');
  document.getElementById('loginSection').classList.add('active-form');
}

function openRegister(){
  document.getElementById('loginSection').classList.remove('active-form');
  document.getElementById('authSection').classList.add('active-form');
}



function toggleSearch(){
document.getElementById('searchBox').style.display='block';
}

function searchItem(val){
val=val.toLowerCase();
for(let k in productsData){
if(productsData[k].some(i=>i.includes(val))){
showProducts(k);
}
}
}

function showProducts(type){
document.getElementById('products').innerHTML='<h2>'+type+'</h2>';
document.getElementById('products').style.display='block';
}
</script>




<script>
function login(){
  fetch('login.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: new URLSearchParams({
      email: document.getElementById('loginEmail').value,
      password: document.getElementById('loginPass').value
    })
  })
  .then(r => r.text())
  .then(res => {
    res = res.trim(); // 🔥 VERY IMPORTANT
    console.log("LOGIN RESPONSE:", res);

    if(res === 'FARMER'){
      window.location.href = 'farmer_dashboard.php';
    }
    else if(res === 'BUYER'){
      window.location.href = 'buyer_dashboard.php';
    }
    else if(res === 'INVALID_PASSWORD'){
      alert('Wrong password');
    }
    else if(res === 'INVALID_EMAIL'){
      alert('Email not registered');
    }
    else{
      alert('Unexpected response: ' + res);
    }
  });
}
</script>

<script>
function loadProfile(){
  fetch('profile.php')
  .then(r=>r.json())
  .then(u=>{
    if(u){
      document.getElementById('profileBox').style.display='inline';
      document.getElementById('pname').innerText = u.name;
    }
  });
}

loadProfile();
</script>



</body><script>
function registerUser(){
  const form = document.getElementById("registerForm");
  const formData = new FormData(form);

  fetch("register.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    console.log("SERVER RESPONSE:", data);

    if(data.trim() === "REGISTERED"){
      alert("✅ Account created successfully!");
      window.location.href = "login.html";
    }else{
      alert("❌ Registration failed:\n" + data);
    }
  })
  .catch(err => {
    alert("❌ Network error");
    console.error(err);
  });
}
</script>

</html>