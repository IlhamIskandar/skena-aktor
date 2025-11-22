<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>@yield('title', 'Admin — Skena Aktor')</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    {{-- <style>
        /* === COPY CSS ASLI DARI FILE HTML === */
        {!! file_get_contents(base_path('resources/raw/admin.css')) !!}
    </style> --}}
</head>

<body>
<div class="app">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    <main class="content">
        {{-- TOPBAR --}}
        @include('admin.partials.topbar')

        {{-- HALAMAN --}}
        @yield('content')
    </main>

</div>

{{-- JS GLOBAL --}}
{{-- <script>
    {!! file_get_contents(base_path('resources/raw/admin-global.js')) !!}
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
{{-- @stack('scripts') --}}
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
