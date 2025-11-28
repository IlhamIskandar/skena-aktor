<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin — Skena Aktor</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <style>
    :root{
      --bg:#f7f8fb;
      --card:#ffffff;
      --muted:#6b7280;
      --accent:#ffd54b; /* kuning theme */
      --accent-dark:#f2c200;
      --sidebar:#ffffff;
      --radius:12px;
      --shadow: 0 6px 20px rgba(20,20,60,0.06);
      font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      background:var(--bg);
      color:#0f172a;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
    }

    /* Layout */
    .app {
      display:flex;
      min-height:100vh;
      gap:24px;
    }
    aside.sidebar{
      width:260px;
      background:var(--sidebar);
      border-right:1px solid rgba(15,23,42,0.03);
      padding:20px;
      box-shadow: var(--shadow);
    }
    .brand {
      display:flex;
      align-items:center;
      gap:12px;
      margin-bottom:18px;
    }
    .logo {
      width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,var(--accent),var(--accent-dark));
      display:flex;align-items:center;justify-content:center;font-weight:700;color:#111;
      box-shadow:0 4px 10px rgba(0,0,0,0.06)
    }
    .brand h1{font-size:16px;margin:0}
    nav.menu{display:flex;flex-direction:column;gap:8px;margin-top:18px}
    nav .menu-item{
      display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:10px;color:#0f172a;text-decoration:none;cursor:pointer;
    }
    nav .menu-item.active{background:linear-gradient(90deg, rgba(255,213,75,0.15), rgba(242,194,0,0.07));font-weight:600}
    nav .menu-item:hover{background:rgba(15,23,42,0.03)}
    .menu-item .dot{width:10px;height:10px;border-radius:50%;background:var(--accent)}

    main.content{
      flex:1;padding:28px;
      overflow:auto;
    }

    /* Header */
    .topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
    .search {display:flex;gap:8px;align-items:center;background:var(--card);padding:8px 12px;border-radius:12px;box-shadow:var(--shadow);width:420px}
    .search input{border:0;outline:none;background:transparent;font-size:14px}
    .profile {
      display:flex;align-items:center;gap:12px;
    }
    .profile .avatar{width:44px;height:44px;border-radius:12px;background:#111;color:white;display:flex;align-items:center;justify-content:center;font-weight:700}
    .badge{background:var(--accent);padding:10px 14px;border-radius:12px;box-shadow:var(--shadow)}

    /* Cards & grid */
    .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:18px}
    .card{background:var(--card);padding:16px;border-radius:var(--radius);box-shadow:var(--shadow)}
    .kpi {display:flex;justify-content:space-between;align-items:center;gap:12px}
    .kpi .value{font-size:20px;font-weight:700}
    .kpi .label{color:var(--muted);font-size:13px}

    /* sections */
    .section-title{display:flex;justify-content:space-between;align-items:center;margin:12px 0}
    .section-title h2{margin:0;font-size:18px}
    .btn{padding:8px 12px;border-radius:10px;border:0;cursor:pointer;font-weight:600}
    .btn-primary{background:var(--accent);color:#111}
    .btn-ghost{background:transparent;border:1px solid rgba(15,23,42,0.06)}
    .muted{color:var(--muted)}

    /* table */
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px 12px;text-align:left;border-bottom:1px solid rgba(15,23,42,0.04)}
    th{color:var(--muted);font-weight:600;font-size:13px}
    tr:hover td{background:rgba(15,23,42,0.02)}

    /* forms */
    .form-row{display:flex;gap:12px;align-items:center}
    .input, textarea, select{
      padding:8px 10px;border-radius:8px;border:1px solid rgba(15,23,42,0.06);background:#fff;outline:none;width:100%;
    }
    .controls{display:flex;gap:8px;flex-wrap:wrap}

    /* responsive */
    @media (max-width:1100px){
      .grid{grid-template-columns:repeat(2,1fr)}
      aside.sidebar{display:none}
    }
    @media (max-width:640px){
      .grid{grid-template-columns:1fr}
      .search{width:100%}
    }

    /* small helpers */
    .small{font-size:13px;color:var(--muted)}
    .pill{padding:6px 10px;border-radius:999px;background:rgba(15,23,42,0.04);font-weight:600}
    .status-active{color:green;font-weight:600}
    .status-inactive{color:#b91c1c;font-weight:600}
    .card-empty{height:120px;display:flex;align-items:center;justify-content:center;color:var(--muted)}
    .right{margin-left:auto}
    .mb-8{margin-bottom:8px}
    .mt-12{margin-top:12px}
    .textarea{min-height:100px}
    .small-muted{font-size:12px;color:#94a3b8}
    .table-actions button{margin-right:6px}
    .notice{padding:8px 12px;border-radius:10px;background:linear-gradient(90deg, rgba(255,213,75,0.12), rgba(242,194,0,0.03));color:#111}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar" role="navigation" aria-label="Sidebar">
      <div class="brand">
        <div class="logo">SA</div>
        <div>
          <h1>Skena Aktor</h1>
          <div class="small-muted">Admin Panel</div>
        </div>
      </div>

      <nav class="menu" id="menu">
        <div class="menu-item active" data-view="dashboard"><div class="dot"></div> Dashboard</div>
        <div class="menu-item" data-view="participants"><div class="dot"></div> Participants</div>
        <div class="menu-item" data-view="classes"><div class="dot"></div> Classes</div>
        <div class="menu-item" data-view="certificates"><div class="dot"></div> Certificates</div>
        <div class="menu-item" data-view="notifications"><div class="dot"></div> Notifications</div>
        <div class="menu-item" data-view="chatbot"><div class="dot"></div> Chatbot</div>
      </nav>

      <div style="margin-top:20px" class="small-muted">
        <div>Logged in as</div>
        <div style="display:flex;align-items:center;gap:8px;margin-top:8px">
          <div class="avatar" style="width:36px;height:36px;border-radius:8px;background:#111;color:#fff;display:flex;align-items:center;justify-content:center">I</div>
          <div>
            <div style="font-weight:700">Ilham</div>
            <div class="small-muted">Super Admin</div>
          </div>
        </div>
      </div>
    </aside>

    <main class="content">
      <!-- Topbar -->
      <div class="topbar">
        <div style="display:flex;gap:12px;align-items:center">
          <div style="background:linear-gradient(90deg,var(--accent),var(--accent-dark));padding:10px 14px;border-radius:10px;font-weight:700">Dashboard</div>
          <div class="search" role="search">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M21 21l-4.35-4.35" stroke="#0f172a" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="11" cy="11" r="6" stroke="#0f172a" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <input id="globalSearch" placeholder="Cari peserta, kelas, atau sertifikat..." />
          </div>
        </div>

        <div class="profile">
          <div class="badge">Online</div>
          <div class="profile-info" style="text-align:right">
            <div style="font-weight:700">Ilham</div>
            <div class="small-muted">Administrator</div>
          </div>
          <div class="avatar">I</div>
        </div>
      </div>

      <!-- VIEWS -->
      <!-- Dashboard View -->
      <section id="view-dashboard" class="view">
        <div class="grid">
          <div class="card kpi">
            <div>
              <div class="label small-muted">Total Peserta</div>
              <div class="value" id="kpi-total">65</div>
            </div>
            <div class="pill">+2% minggu ini</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Total Kelas</div>
              <div class="value" id="kpi-classes">12</div>
            </div>
            <div class="pill">Stabil</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Sertifikat Diterbitkan</div>
              <div class="value" id="kpi-certs">45</div>
            </div>
            <div class="pill">+8 baru</div>
          </div>

          <div class="card kpi">
            <div>
              <div class="label small-muted">Pesan Aktif</div>
              <div class="value" id="kpi-notifs">8</div>
            </div>
            <div class="pill">Baru</div>
          </div>
        </div>

        <div class="card" style="margin-bottom:16px;">
          <div class="section-title">
            <h2>Analytics Peserta</h2>
            <div>
              <button class="btn btn-ghost" onclick="downloadSampleCSV()">Download CSV</button>
              <button class="btn btn-primary" onclick="showParticipantsView()">Kelola Peserta</button>
            </div>
          </div>
          <div style="display:flex;gap:16px;align-items:center;flex-wrap:wrap">
            <div style="flex:1;min-width:320px">
              <canvas id="chart-registrations" height="140"></canvas>
            </div>
            <div style="width:320px">
              <div class="small-muted">Distribusi Kelas</div>
              <canvas id="chart-classes" height="180"></canvas>
            </div>
          </div>
        </div>

        <div style="display:grid;grid-template-columns:1fr 360px;gap:16px">
          <div class="card">
            <div class="section-title">
              <h2>Peserta Terbaru</h2>
              <div class="small-muted">Update 2 menit lalu</div>
            </div>
            <table>
              <thead><tr><th>Nama</th><th>Kelas</th><th>Status</th><th></th></tr></thead>
              <tbody id="latestParticipants">
                <!-- filled by JS -->
              </tbody>
            </table>
          </div>

          <div class="card">
            <h3 style="margin-top:0">Notifikasi Terakhir</h3>
            <div class="card-empty" id="recentNotifs">Belum ada notifikasi</div>
          </div>
        </div>
      </section>

      <!-- Participants View -->
      <section id="view-participants" class="view" style="display:none">
        <div class="section-title">
          <h2>Kelola Peserta</h2>
          <div class="controls">
            <input id="filterName" class="input" placeholder="Cari nama..." style="width:220px" />
            <select id="filterClass" class="input" style="width:220px">
              <option value="">Semua Kelas</option>
            </select>
            <select id="filterStatus" class="input" style="width:160px">
              <option value="">Semua Status</option>
              <option value="active">Aktif</option>
              <option value="inactive">Tidak Aktif</option>
            </select>
            <button class="btn btn-primary" onclick="exportFilteredCSV()">Ekspor CSV</button>
          </div>
        </div>

        <div class="card" style="margin-bottom:12px">
          <table>
            <thead><tr><th>#</th><th>Nama</th><th>Email</th><th>Kelas</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody id="participantsTable"></tbody>
          </table>
        </div>

        <div class="card">
          <h3>Tambah Peserta Baru</h3>
          <div style="margin-top:12px">
            <div class="form-row mb-8">
              <input id="newName" class="input" placeholder="Nama lengkap" />
              <input id="newEmail" class="input" placeholder="Email" />
            </div>
            <div class="form-row mb-8">
              <select id="newClass" class="input">
                <!-- filled by JS -->
              </select>
              <select id="newStatus" class="input">
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
              </select>
            </div>
            <div style="display:flex;gap:8px">
              <button class="btn btn-primary" onclick="addParticipant()">Tambah</button>
              <button class="btn btn-ghost" onclick="clearParticipantForm()">Bersihkan</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Classes View -->
      <section id="view-classes" class="view" style="display:none">
        <div class="section-title">
          <h2>Manajemen Kelas</h2>
          <div>
            <button class="btn btn-primary" onclick="openClassModal()">Tambah Kelas</button>
            <button class="btn btn-ghost" onclick="renderClasses()">Refresh</button>
          </div>
        </div>

        <div class="card" id="classesList">
          <table>
            <thead><tr><th>Nama Kelas</th><th>Pengajar</th><th>Kuota</th><th>Terdaftar</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody id="classesTable"></tbody>
          </table>
        </div>

        <!-- class modal (simple) -->
        <div id="classModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.35);align-items:center;justify-content:center;padding:24px">
          <div style="background:#fff;padding:20px;border-radius:12px;min-width:420px;box-shadow:var(--shadow)">
            <h3 id="classModalTitle">Tambah Kelas</h3>
            <div class="mt-12">
              <input id="className" class="input mb-8" placeholder="Nama Kelas" />
              <input id="classTeacher" class="input mb-8" placeholder="Pengajar" />
              <div class="form-row mb-8">
                <input id="classQuota" class="input" type="number" placeholder="Kuota" />
                <select id="classStatus" class="input">
                  <option value="active">Aktif</option>
                  <option value="inactive">Tidak Aktif</option>
                </select>
              </div>
              <div style="display:flex;gap:8px;justify-content:flex-end">
                <button class="btn btn-ghost" onclick="closeClassModal()">Batal</button>
                <button class="btn btn-primary" onclick="saveClass()">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Certificates View -->
      <section id="view-certificates" class="view" style="display:none">
        <div class="section-title">
          <h2>Manajemen Sertifikat</h2>
          <div>
            <button class="btn btn-primary" onclick="generateDemoCertificate()">Generate Sertifikat Demo</button>
            <button class="btn btn-ghost" onclick="renderCertificates()">Refresh</button>
          </div>
        </div>

        <div class="card">
          <table>
            <thead><tr><th>Nama</th><th>Kelas</th><th>Tanggal</th><th>File</th><th>Aksi</th></tr></thead>
            <tbody id="certsTable"></tbody>
          </table>
        </div>
      </section>

      <!-- Notifications View -->
      <section id="view-notifications" class="view" style="display:none">
        <div class="section-title">
          <h2>Broadcast Notifikasi</h2>
          <div class="small-muted">Kirim pesan ke peserta terdaftar (demo)</div>
        </div>

        <div class="card">
          <div class="form-row mb-8">
            <input id="notifTitle" class="input" placeholder="Judul notifikasi" />
          </div>
          <div class="form-row mb-8">
            <textarea id="notifMessage" class="input textarea" placeholder="Tulis pesan..."></textarea>
          </div>
          <div style="display:flex;gap:8px">
            <button class="btn btn-primary" onclick="broadcastNotif()">Kirim Broadcast</button>
            <button class="btn btn-ghost" onclick="clearNotifForm()">Bersihkan</button>
          </div>
        </div>

        <div class="card mt-12">
          <h3>Riwayat Notifikasi</h3>
          <table>
            <thead><tr><th>Waktu</th><th>Judul</th><th>Pesan</th></tr></thead>
            <tbody id="notifHistory"></tbody>
          </table>
        </div>
      </section>

      <!-- Chatbot View -->
      <section id="view-chatbot" class="view" style="display:none">
        <div class="section-title">
          <h2>Pengaturan Chatbot AI</h2>
          <div>
            <button class="btn btn-primary" onclick="trainChatbot()">Latih Model (Demo)</button>
            <button class="btn btn-ghost" onclick="clearChatLogs()">Bersihkan Log</button>
          </div>
        </div>

        <div class="card">
          <h3>Data Pelatihan (FAQ & Respon)</h3>
          <div style="margin-top:12px">
            <textarea id="qaPairs" class="input textarea" placeholder="Masukkan pasangan Q/A, satu per baris, pisah dengan '||' contoh: Apa itu Skena Aktor?||Skena Aktor adalah..."></textarea>
            <div style="display:flex;gap:8px;margin-top:8px">
              <button class="btn btn-primary" onclick="saveQAPairs()">Simpan Data</button>
              <button class="btn btn-ghost" onclick="loadQAPairs()">Muat Data</button>
            </div>
          </div>
        </div>

        <div class="card mt-12">
          <h3>Simulasi Chat</h3>
          <div id="chatWindow" style="border:1px solid rgba(15,23,42,0.04);padding:12px;border-radius:10px;height:280px;overflow:auto;background:#fff"></div>
          <div style="display:flex;gap:8px;margin-top:8px">
            <input id="chatInput" class="input" placeholder="Tanya chatbot..." />
            <button class="btn btn-primary" onclick="sendChat()">Kirim</button>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    /* ========== Demo data ========== */
    let classes = [
      {id:1,name:'Acting Beginner',teacher:'Rudi',quota:30,registered:20,status:'active'},
      {id:2,name:'Technique Fighting',teacher:'Sari',quota:20,registered:18,status:'active'},
      {id:3,name:'Modeling Basics',teacher:'Tina',quota:25,registered:12,status:'inactive'},
      {id:4,name:'Script Writing',teacher:'Andi',quota:15,registered:10,status:'active'},
    ];

    let participants = [
      {id:1,name:'Anna Putri',email:'anna@example.com',classId:1,status:'active',joined:'2025-09-21'},
      {id:2,name:'Budi Santoso',email:'budi@example.com',classId:2,status:'active',joined:'2025-10-03'},
      {id:3,name:'Citra Dewi',email:'citra@example.com',classId:1,status:'inactive',joined:'2025-08-15'},
      {id:4,name:'Dedi Kurnia',email:'dedi@example.com',classId:3,status:'active',joined:'2025-09-30'},
      {id:5,name:'Eka Pratama',email:'eka@example.com',classId:4,status:'active',joined:'2025-10-18'}
    ];

    let certs = [
      {id:1,name:'Anna Putri',className:'Acting Beginner',date:'2025-10-10',file:'#'},
      {id:2,name:'Budi Santoso',className:'Technique Fighting',date:'2025-10-12',file:'#'}
    ];

    let notifHistory = [];

    /* ========== Navigation ========== */
    document.querySelectorAll('[data-view]').forEach(el=>{
      el.addEventListener('click',()=>{
        document.querySelectorAll('.menu-item').forEach(i=>i.classList.remove('active'));
        el.classList.add('active');
        showView(el.getAttribute('data-view'));
      });
    });

    function showView(view){
      document.querySelectorAll('.view').forEach(v=>v.style.display='none');
      document.getElementById('view-'+view).style.display='block';
    }

    function showParticipantsView(){ document.querySelector('[data-view="participants"]').click(); }

    /* ========== Render Dashboard charts ========== */
    function renderDashboard(){
      // Registrations line chart
      const ctx = document.getElementById('chart-registrations');
      const regChart = new Chart(ctx, {
        type:'line',
        data:{
          labels:['Apr','Mei','Jun','Jul','Agu','Sep','Okt'],
          datasets:[{
            label:'Pendaftaran',
            data:[8,12,9,15,22,30,28],
            tension:0.4,
            fill:true,
            backgroundColor:'rgba(255,213,75,0.15)',
            borderColor:'#f2c200',
            pointRadius:4
          }]
        },
        options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true}}}
      });

      // Classes pie chart
      const ctx2 = document.getElementById('chart-classes');
      const pieChart = new Chart(ctx2, {
        type:'doughnut',
        data:{
          labels: classes.map(c=>c.name),
          datasets:[{data: classes.map(c=>c.registered), hoverOffset:6}]
        },
        options:{plugins:{legend:{position:'right'}}}
      });

      // latest participants table
      const latestTbody = document.getElementById('latestParticipants');
      latestTbody.innerHTML = '';
      participants.slice(0,5).forEach(p=>{
        const cls = classes.find(c=>c.id===p.classId);
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${p.name}</td><td>${cls?cls.name:'-'}</td><td>${p.status==='active'?'<span class="status-active">Aktif</span>':'<span class="status-inactive">Tidak Aktif</span>'}</td><td><button class="btn btn-ghost" onclick="viewParticipant(${p.id})">View</button></td>`;
        latestTbody.appendChild(tr);
      });
    }

    /* ========== Participants ========== */
    function populateClassFilters(){
      const sel = document.getElementById('filterClass');
      const newSel = document.getElementById('newClass');
      sel.innerHTML='<option value="">Semua Kelas</option>';
      newSel.innerHTML='';
      classes.forEach(c=>{
        sel.innerHTML += `<option value="${c.id}">${c.name}</option>`;
        newSel.innerHTML += `<option value="${c.id}">${c.name}</option>`;
      });
    }

    function renderParticipants(){
      const tbody = document.getElementById('participantsTable');
      tbody.innerHTML='';
      const fName = document.getElementById('filterName').value.toLowerCase();
      const fClass = document.getElementById('filterClass').value;
      const fStatus = document.getElementById('filterStatus').value;
      let filtered = participants.filter(p=>{
        if(fName && !p.name.toLowerCase().includes(fName) && !p.email.toLowerCase().includes(fName)) return false;
        if(fClass && String(p.classId)!==fClass) return false;
        if(fStatus && p.status!==fStatus) return false;
        return true;
      });
      filtered.forEach((p,i)=>{
        const cls = classes.find(c=>c.id===p.classId);
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${i+1}</td>
          <td>${p.name}</td>
          <td>${p.email}</td>
          <td>${cls?cls.name:'-'}</td>
          <td>${p.status==='active'?'<span class="status-active">Aktif</span>':'<span class="status-inactive">Tidak Aktif</span>'}</td>
          <td class="table-actions">
            <button class="btn btn-ghost" onclick="editParticipant(${p.id})">Edit</button>
            <button class="btn" onclick="deleteParticipant(${p.id})" style="background:#ffefef;border:1px solid rgba(185,28,28,0.06);color:#b91c1c">Hapus</button>
          </td>`;
        tbody.appendChild(tr);
      });
    }

    function addParticipant(){
      const name = document.getElementById('newName').value.trim();
      const email = document.getElementById('newEmail').value.trim();
      const classId = Number(document.getElementById('newClass').value);
      const status = document.getElementById('newStatus').value;
      if(!name || !email || !classId){ alert('Lengkapi data peserta.'); return; }
      const id = participants.length?Math.max(...participants.map(p=>p.id))+1:1;
      participants.unshift({id,name,email,classId,status,joined:new Date().toISOString().slice(0,10)});
      renderParticipants(); populateClassCounts(); renderDashboard();
      clearParticipantForm();
    }

    function clearParticipantForm(){
      document.getElementById('newName').value='';
      document.getElementById('newEmail').value='';
      document.getElementById('newStatus').value='active';
    }

    function editParticipant(id){
      const p = participants.find(x=>x.id===id);
      if(!p) return alert('Peserta tidak ditemukan');
      const newName = prompt('Nama',p.name);
      if(newName!==null) p.name = newName;
      renderParticipants();
    }

    function deleteParticipant(id){
      if(!confirm('Hapus peserta ini?')) return;
      participants = participants.filter(p=>p.id!==id);
      renderParticipants(); populateClassCounts(); renderDashboard();
    }

    function viewParticipant(id){
      const p = participants.find(x=>x.id===id);
      if(!p) return;
      alert(`Nama: ${p.name}\nEmail: ${p.email}\nKelas: ${classes.find(c=>c.id===p.classId)?.name || '-'}\nStatus: ${p.status}`);
    }

    /* ========== CSV export ========== */
    function exportFilteredCSV(){
      const fName = document.getElementById('filterName').value.toLowerCase();
      const fClass = document.getElementById('filterClass').value;
      const fStatus = document.getElementById('filterStatus').value;
      const filtered = participants.filter(p=>{
        if(fName && !p.name.toLowerCase().includes(fName) && !p.email.toLowerCase().includes(fName)) return false;
        if(fClass && String(p.classId)!==fClass) return false;
        if(fStatus && p.status!==fStatus) return false;
        return true;
      });
      downloadCSV(filtered,'participants-export.csv');
    }

    function downloadSampleCSV(){
      downloadCSV(participants,'participants-sample.csv');
    }

    function downloadCSV(arr, filename='export.csv'){
      if(!arr.length){ alert('Tidak ada data untuk diekspor'); return; }
      const csvRows = [];
      const keys = Object.keys(arr[0]);
      csvRows.push(keys.join(','));
      for(const row of arr){
        csvRows.push(keys.map(k=>`"${String(row[k]||'').replace(/"/g,'""')}"`).join(','));
      }
      const blob = new Blob([csvRows.join('\n')], {type:'text/csv'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a'); a.href = url; a.download = filename; a.click();
      URL.revokeObjectURL(url);
    }

    /* ========== Classes ========== */
    function renderClasses(){
      const tbody = document.getElementById('classesTable');
      tbody.innerHTML = '';
      classes.forEach(c=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${c.name}</td><td>${c.teacher}</td><td>${c.quota}</td><td>${c.registered}</td><td>${c.status==='active'?'<span class="status-active">Aktif</span>':'<span class="status-inactive">Tidak Aktif</span>'}</td>
          <td>
            <button class="btn btn-ghost" onclick="editClass(${c.id})">Edit</button>
            <button class="btn" onclick="deleteClass(${c.id})" style="background:#ffefef;border:1px solid rgba(185,28,28,0.06);color:#b91c1c">Hapus</button>
          </td>`;
        tbody.appendChild(tr);
      });
      populateClassFilters(); populateClassCounts();
    }

    function populateClassCounts(){
      const total = classes.reduce((s,c)=>s + (c.registered||0),0);
      document.getElementById('kpi-classes').textContent = classes.length;
      document.getElementById('kpi-total').textContent = Math.max(participants.length, total);
    }

    function openClassModal(editId=null){
      document.getElementById('classModal').style.display='flex';
      document.getElementById('classModalTitle').textContent = editId? 'Edit Kelas' : 'Tambah Kelas';
      if(editId){
        const c = classes.find(x=>x.id===editId);
        document.getElementById('className').value = c.name;
        document.getElementById('classTeacher').value = c.teacher;
        document.getElementById('classQuota').value = c.quota;
        document.getElementById('classStatus').value = c.status;
        document.getElementById('classModal').dataset.editId = editId;
      } else {
        document.getElementById('className').value='';
        document.getElementById('classTeacher').value='';
        document.getElementById('classQuota').value='';
        document.getElementById('classStatus').value='active';
        delete document.getElementById('classModal').dataset.editId;
      }
    }
    function closeClassModal(){ document.getElementById('classModal').style.display='none'; }

    function saveClass(){
      const editId = Number(document.getElementById('classModal').dataset.editId||0);
      const name = document.getElementById('className').value.trim();
      const teacher = document.getElementById('classTeacher').value.trim();
      const quota = Number(document.getElementById('classQuota').value);
      const status = document.getElementById('classStatus').value;
      if(!name || !teacher || !quota) return alert('Lengkapi data kelas.');
      if(editId){
        const c = classes.find(x=>x.id===editId);
        c.name=name; c.teacher=teacher; c.quota=quota; c.status=status;
      } else {
        const id = classes.length?Math.max(...classes.map(x=>x.id))+1:1;
        classes.push({id,name,teacher,quota,registered:0,status});
      }
      closeClassModal(); renderClasses(); renderParticipants(); renderDashboard();
    }

    function editClass(id){ openClassModal(id); }
    function deleteClass(id){
      if(!confirm('Hapus kelas ini?')) return;
      classes = classes.filter(c=>c.id!==id);
      // also remove class from participants
      participants = participants.map(p=>p.classId===id?{...p,classId:null}:p);
      renderClasses(); renderParticipants(); renderDashboard();
    }

    /* ========== Certificates ========== */
    function renderCertificates(){
      const tbody = document.getElementById('certsTable');
      tbody.innerHTML = '';
      certs.forEach(c=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${c.name}</td><td>${c.className}</td><td>${c.date}</td><td><a href="${c.file}" download class="small-muted">Download</a></td>
          <td><button class="btn btn-ghost" onclick="reissueCert(${c.id})">Reissue</button></td>`;
        tbody.appendChild(tr);
      });
    }

    function generateDemoCertificate(){
      // This demo function creates a "fake" certificate entry and a downloadable text file
      const p = participants[0];
      if(!p){ alert('Tidak ada peserta untuk dibuat sertifikat.'); return; }
      const id = certs.length?Math.max(...certs.map(x=>x.id))+1:1;
      const classname = classes.find(c=>c.id===p.classId)?.name || 'General';
      const filename = `sertifikat-${p.name.replace(/\s+/g,'_')}.txt`;
      const content = `SERTIFIKAT\n\nDiberikan kepada: ${p.name}\nKelas: ${classname}\nTanggal: ${new Date().toISOString().slice(0,10)}\n\n(Sertifikat demo)`;
      const blob = new Blob([content],{type:'text/plain'});
      const url = URL.createObjectURL(blob);
      certs.push({id,name:p.name,className:classname,date:new Date().toISOString().slice(0,10),file:url});
      renderCertificates(); alert('Sertifikat demo dibuat dan siap didownload (tabel).');
    }

    function reissueCert(id){
      alert('Sertifikat akan di-issue ulang (demo).');
    }

    /* ========== Notifications ========== */
    function broadcastNotif(){
      const title = document.getElementById('notifTitle').value.trim();
      const msg = document.getElementById('notifMessage').value.trim();
      if(!title||!msg) return alert('Isi judul dan pesan.');
      const time = new Date().toLocaleString();
      notifHistory.unshift({time,title,message:msg});
      renderNotifHistory();
      // show small preview on dashboard
      document.getElementById('recentNotifs').textContent = `${time} — ${title}`;
      document.getElementById('notifTitle').value=''; document.getElementById('notifMessage').value='';
      alert('Broadcast terkirim (demo).');
    }

    function renderNotifHistory(){
      const tbody = document.getElementById('notifHistory');
      tbody.innerHTML='';
      notifHistory.forEach(n=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `<td>${n.time}</td><td>${n.title}</td><td>${n.message}</td>`;
        tbody.appendChild(tr);
      });
    }

    function clearNotifForm(){ document.getElementById('notifTitle').value=''; document.getElementById('notifMessage').value=''; }

    /* ========== Chatbot Admin (simple demo) ========== */
    function saveQAPairs(){
      const raw = document.getElementById('qaPairs').value.trim();
      if(!raw) { alert('Masukkan data Q/A.'); return; }
      // store in localStorage as demo (format: "Q||A\nQ2||A2")
      localStorage.setItem('sa_qa', raw);
      alert('Data Q/A tersimpan (localStorage).');
    }
    function loadQAPairs(){
      const raw = localStorage.getItem('sa_qa') || '';
      document.getElementById('qaPairs').value = raw;
      alert('Data Q/A dimuat.');
    }
    function trainChatbot(){
      // demo only
      const raw = localStorage.getItem('sa_qa');
      if(!raw) return alert('Tidak ada data Q/A untuk dilatih.');
      alert('Proses pelatihan dimulai (demo) — model disimpan secara lokal (simulasi).');
    }

    function sendChat(){
      const input = document.getElementById('chatInput').value.trim();
      if(!input) return;
      appendChat('admin',input);
      // simple rule-based reply using stored Q/A
      const raw = localStorage.getItem('sa_qa') || '';
      const pairs = raw.split('\n').map(r=>r.split('||').map(s=>s.trim()));
      let reply = "Maaf, saya belum mengerti. Coba gunakan kata kunci.";
      for(const [q,a] of pairs){
        if(!q) continue;
        if(input.toLowerCase().includes(q.toLowerCase().split(' ')[0])){ reply = a; break; }
      }
      setTimeout(()=> appendChat('bot',reply), 600);
      document.getElementById('chatInput').value='';
    }

    function appendChat(sender,msg){
      const win = document.getElementById('chatWindow');
      const el = document.createElement('div');
      el.style.marginBottom='8px';
      el.innerHTML = `<div style="font-size:12px;color:#6b7280">${sender==='bot'?'Chatbot':'Anda'}</div><div style="background:${sender==='bot'?'#f8fafc':'#fff'};padding:8px;border-radius:8px;border:1px solid rgba(15,23,42,0.04)">${msg}</div>`;
      win.appendChild(el);
      win.scrollTop = win.scrollHeight;
    }

    function clearChatLogs(){ document.getElementById('chatWindow').innerHTML=''; alert('Log chat dibersihkan.'); }

    /* ========== Init ========== */
    document.getElementById('filterName').addEventListener('input',renderParticipants);
    document.getElementById('filterClass').addEventListener('change',renderParticipants);
    document.getElementById('filterStatus').addEventListener('change',renderParticipants);
    document.getElementById('globalSearch').addEventListener('input', e=>{
      const q = e.target.value.toLowerCase();
      // simple search jump: if q matches a class name, open classes, otherwise participants
      if(!q) return;
      const foundClass = classes.find(c=>c.name.toLowerCase().includes(q));
      if(foundClass) { showView('classes'); document.querySelector('[data-view="classes"]').classList.add('active'); }
    });

    // initial render
    populateClassFilters(); renderParticipants(); renderClasses(); renderCertificates(); renderDashboard(); renderNotifHistory();
  </script>
</body>
</html>
