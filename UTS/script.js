const MENU = [ // daftar menu makanan & minuman
  // Minuman
  {id:'m1', title:'Americano', price:15000, image:'img/americano.jpg', category:'minuman'},
  {id:'m2', title:'Latte', price:18000, image:'img/latte.jpg', category:'minuman'},
  {id:'m3', title:'Cappucino', price:18000, image:'img/cappucino.jpg', category:'minuman'},
  {id:'m4', title:'Chocolate', price:15000, image:'img/chocolate.jpg', category:'minuman'},
  {id:'m5', title:'Red Velvet', price:16000, image:'img/redvelvet.jpg', category:'minuman'},
  {id:'m6', title:'Taro', price:16000, image:'img/taro.jpg', category:'minuman'},
  {id:'m7', title:'Cookies and Cream', price:18000, image:'img/vanilla.jpg', category:'minuman'},
  {id:'m8', title:'Matcha', price:15000, image:'img/greentea.jpg', category:'minuman'},
  {id:'m9', title:'Thai Tea', price:13000, image:'img/thaitea.jpg', category:'minuman'},
  {id:'m10', title:'Lychee Tea', price:16000, image:'img/leci.jpg', category:'minuman'},
  {id:'m11', title:'Lemon Tea', price:10000, image:'img/lemontea.jpg', category:'minuman'},
  {id:'m12', title:'Original Tea', price:8000, image:'img/tea.jpg', category:'minuman'},

  // Makanan
  {id:'f1', title:'Croissant', price:20000, image:'img/croissant.jpg', category:'makanan'},
  {id:'f2', title:'Mile Crepes', price:18000, image:'img/MileCrepes.jpg', category:'makanan'},
  {id:'f3', title:'Cheese Cake', price:15000, image:'img/Cheesecake.jpg', category:'makanan'},
  {id:'f4', title:'Pudding Caramel', price:15000, image:'img/puding.jpg', category:'makanan'},
  {id:'f5', title:'French fries', price:10000, image:'img/kentang.jpg', category:'makanan'},
  {id:'f6', title:'Nuget', price:10000, image:'img/nuget.jpg', category:'makanan'},
  {id:'f7', title:'Onion Ring', price:13000, image:'img/OnionRing.jpg', category:'makanan'},
  {id:'f8', title:'Dimsum', price:20000, image:'img/dimsum.jpg', category:'makanan'},
];

// ==== FUNGSI DASAR ====
const id = x => document.getElementById(x);                // mempersingkat pemanggilan elemen DOM
const fmt = n => 'Rp' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // format angka jadi rupiah

// ==== STATE ====
let state = { cart: loadCart() };                          // menyimpan data keranjang di memori

// ==== AMBIL ELEMEN DOM ====
const menuGrid = id('menuGrid');                           // tempat daftar menu ditampilkan
const cartList = id('cartList');                           // tempat daftar isi keranjang
const cartCount = id('cartCount');                         // menampilkan jumlah item keranjang
const cartTotal = id('cartTotal');                         // menampilkan total harga
const payInput = id('payInput');                           // input uang bayar
const changeDisplay = id('changeDisplay');                 // menampilkan kembalian
const receiptModal = id('receiptModal');                   // popup struk pembayaran
const receiptContent = id('receiptContent');               // isi struk pembayaran
const closeReceiptBtn = id('closeReceiptBtn');             // tombol tutup struk

id('checkoutBtn').onclick = checkout;                      // saat tombol Bayar ditekan → jalankan checkout()
closeReceiptBtn.onclick = () => receiptModal.style.display = 'none'; // tutup struk jika diklik

// ==== SIMPAN & MUAT KERANJANG ====
function loadCart() {                                      // ambil data keranjang dari localStorage
  try { return JSON.parse(localStorage.getItem('kasir_cart')) || {}; }
  catch { return {}; }
}

function saveCart() {                                      // simpan data keranjang ke localStorage
  localStorage.setItem('kasir_cart', JSON.stringify(state.cart));
}

// ==== TAMPILKAN MENU ====
function renderMenu() {                                    // tampilkan semua menu di halaman
  menuGrid.innerHTML = MENU.map(m => `
    <div class="menu-item">
      <img src="${m.image}" alt="${m.title}">
      <h3>${m.title}</h3>
      <p>${fmt(m.price)}</p>
      <button onclick="addToCart('${m.id}')">Tambah</button>
    </div>
  `).join('');

  // efek animasi saat muncul
  const items = document.querySelectorAll('.menu-item');
  items.forEach((item, i) => {
    setTimeout(() => item.classList.add('show'), i * 100); // efek fade muncul satu-satu
  });
}

// ==== TAMPILKAN KERANJANG ====
function renderCart() {                                    // menampilkan isi keranjang
  const keys = Object.keys(state.cart);
  if (!keys.length) {                                      // jika kosong
    cartList.innerHTML = 'Keranjang kosong';
    cartCount.textContent = '(0)';
    cartTotal.textContent = fmt(0);
    return;
  }

  let total = 0;
  cartList.innerHTML = keys.map(k => {                     // tampilkan setiap item di keranjang
    const item = MENU.find(m => m.id === k);
    const qty = state.cart[k];
    total += item.price * qty;
    return `
      <div class="cart-item">
        <div>${item.title}</div>
        <div class="qty">
          <button onclick="changeQty('${item.id}', -1)">-</button>  <!-- tombol kurang -->
          <span>${qty}</span>
          <button onclick="changeQty('${item.id}', 1)">+</button>   <!-- tombol tambah -->
        </div>
        <div>${fmt(item.price * qty)}</div>
      </div>
    `;
  }).join('');

  cartCount.textContent = '(' + keys.reduce((a, b) => a + state.cart[b], 0) + ')'; // total jumlah item
  cartTotal.textContent = fmt(total);                         // total harga semua barang
}

// ==== TAMBAH / KURANG JUMLAH ====
function addToCart(id) {                                     // tambahkan item ke keranjang
  state.cart[id] = (state.cart[id] || 0) + 1;
  saveCart();                                                // simpan perubahan
  renderCart();                                              // update tampilan
}

function changeQty(id, delta) {                              // ubah jumlah item (tambah/kurang)
  if (!state.cart[id]) return;
  state.cart[id] += delta;
  if (state.cart[id] <= 0) delete state.cart[id];            // hapus jika jumlahnya 0
  saveCart();
  renderCart();
}

// ==== CHECKOUT & STRUK ====
function checkout() {                                        // fungsi saat tombol Bayar ditekan
  const keys = Object.keys(state.cart);
  if (!keys.length) return alert('Keranjang kosong.');       // validasi: jika belum ada item

  const total = keys.reduce((sum, k) => sum + MENU.find(m => m.id === k).price * state.cart[k], 0); // Baris ini menghitung total semua item di keranjang.
  const pay = parseInt(payInput.value);                      // ambil nominal bayar
  if (isNaN(pay) || pay <= 0) return alert('Masukkan nominal uang customer!'); // validasi input
  if (pay < total) return alert('Uang tidak cukup!');         // jika uang kurang

  const change = pay - total;                                 // hitung kembalian
  const date = new Date().toLocaleString();                   // tanggal transaksi

  const itemsHTML = keys.map(k => {                           // isi tabel struk
    const item = MENU.find(m => m.id === k);
    const qty = state.cart[k];
    return `<tr>
      <td>${item.title}</td>
      <td>${qty}</td>
      <td style="text-align:right">${fmt(item.price * qty)}</td>
    </tr>`;
  }).join('');

  receiptContent.innerHTML = `                               // isi konten struk di modal
    <div style="text-align:center">
      <strong>AYE Coffee House</strong><br>
      <small>${date}</small>
    </div>
    <hr>
    <table>${itemsHTML}</table>
    <hr>
    <table>
      <tr><td>Total</td><td style="text-align:right">${fmt(total)}</td></tr>
      <tr><td>Bayar</td><td style="text-align:right">${fmt(pay)}</td></tr>
      <tr><td>Kembalian</td><td style="text-align:right">${fmt(change)}</td></tr>
    </table>
    <hr>
    <div style="text-align:center">
      <em>Terima kasih telah berbelanja!</em>
    </div>
  `;

  receiptModal.style.display = 'flex';                        // tampilkan popup struk

  // reset keranjang setelah pembayaran
  state.cart = {};
  saveCart();
  renderCart();
  payInput.value = '';
  changeDisplay.textContent = '';
}

// ==== MULAI ====
renderMenu();                                                // tampilkan menu saat halaman dibuka
renderCart();                                                // tampilkan isi keranjang awal
