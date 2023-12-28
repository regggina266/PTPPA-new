<style>
   #apps {
      color: #31304D;
   }

   .wrappers {
      padding: 2em;
   }

   .header i {
      padding-right: 0.4em;
   }

   .blurs {
      color: #84878c;
   }

   .box {
      padding: 1.5em 2em;
      padding-top: 4em;
      position: relative;
      outline: 0.1em solid rgb(240, 240, 240);
      border-radius: 0.5em;
      margin: 2em 0;
      box-shadow: 2px 2px 2px 0 rgb(240, 240, 240);
   }

   .box h4 {
      background: #1B9C85;
      color: white;
      position: absolute;
      font-size: 1em;
      border-radius: 0.4em 0 0.5em 0;
      top: 0;
      left: 0;
      padding: 0.7em;
   }

   .flex {
      display: flex;
      gap: 2em;
   }

   .formsec {
      flex: 1;
   }

   .formsec input {
      padding: 0.75em;
      width: 100%;
      outline: 0.05em solid rgb(230, 230, 230);
      border-radius: 0.5em;
      background: rgb(250, 250, 250);
      border: none;
      color: rgb(40, 40, 40);
   }

   .formsec label {
      display: flex;
      color: rgb(150, 150, 150);
      font-weight: 400;
      margin-bottom: 0.5em;
   }

   .nosurat p {
      position: absolute;
      top: 1em;
      right: 1.5em;
      font-size: 1.2em;
      font-weight: 600
   }

   .listitemarea {
      padding: 2em 0;
   }

   .tiitem {
      display: flex;
      align-items: center;
      justify-content: space-between;
   }

   .flexright {
      justify-content: flex-end;
   }

   .tiitem button {
      border: none;
      transition: all 0.3s;
      background: #0079FF;
      padding: 0.75em;
      border-radius: 0.5em;
      color: white;
      display: flex;
      gap: 0.5em;
      align-items: center;
   }

   .tiitem .green {
      background: #1B9C85;
   }

   .twrapper {
      padding: 1.5em 0.5em;
      padding-bottom: 0;
      width: 100%;
   }

   .dataTables_length,
   .dataTables_filter {
      display: inline;
      margin-right: 2em;
   }

   .dataTables_length select,
   .dataTables_filter input {
      padding: 0.75em;
      border: none;
      outline: 0.05em solid rgb(230, 230, 230) !important;
      border-radius: 0.5em;
      background: rgb(250, 250, 250);
   }

   .twrapper table {
      width: 100%;
      border: 0.1em solid rgb(240, 240, 240);
   }

   .twrapper table th {
      background: rgb(240, 240, 240);
   }

   .twrapper table td,
   .twrapper table th {
      padding: 0.9em;
      text-align: center !important;
      border-bottom: 0.05em solid rgb(230, 230, 230);
   }

   .tiitem button:hover, .loadingbox a:hover {
      background: #0052b0;
   }

   .tiitem .green:hover {
      background: #136e5d;
   }

   .formtambah {
      padding: 1.5em 0;
      margin: 1.5em 0;
      border-top: 0.1em solid rgb(230, 230, 230);
      border-bottom: 0.1em solid rgb(230, 230, 230);
   }

   .mt {
      margin-top: 1em;
   }

   .buttons {
      padding-top: 2em;
      justify-content: flex-end;
      gap: 2em;
   }

   .dataTables_paginate a {
      margin: 0 !important;
      cursor: pointer;
   }

   .dataTables_paginate {
      display: flex;
      justify-content: flex-end;
      gap: 1em;
      align-items: center;
   }
   .reds{
      color: #FF0060;
      cursor: pointer;
   }
   @keyframes showup{
      from {opacity: 0; transform: translateY(0.5em)}
      to {opacity: 1; transform: translateY(0em)}
   }
   .loadingbox{
      position: fixed;
      top: 0;
      left: 0;
      background: rgba(30,30,30, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      backdrop-filter: blur(0.5em);
      width: 100%;
      height: 100%;
      z-index: 1000;
   }
   .loadingbox>div{
      transition: all 0.3s;
      padding: 2.5em;
      animation: showup 1s ease;
      border-radius: 0.7em;
      text-align: center;
      background: white;
   }
   .loadingbox h5{
      font-size: 1.7em;
      margin-bottom: 0.5em;
   }
   .loadingbox p{
      font-size: 1.2em;
   }
   .loadingbox a {
      padding: 0.9em;
      display: block;
      background: #0079FF;
      color:white;
      margin-top: 2em;
      border-radius: 0.4em;
   }
</style>

<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
   integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
   crossOrigin="anonymous" referrerPolicy="no-referrer" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.3/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.0/uuid.min.js"
   integrity="sha512-ItCQZ+YZvhn8MTzDZtxcv5wMW5+tk/Xe5kVobGs6Xf/D/zmu/vQet9tfjrfUblAIgetyvQy8+LdwtegId3hw0Q=="
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div id="apps"></div>
<script type="text/babel">
   const { useState, useEffect, useRef } = React
   const App = () => {
      // initial data
      const id = '<?=$last->id?>'
      const nrp = '<?=$nrp?>'
      let initialVal = {
         nama_barang: '',
         kuantitas: '',
         satuan: '',
         agenda: '',
         agenda_date: '',
      }
      const [listItem, setListItem] = useState([])
      const [catatan, setCatatan] = useState('')
      const [success, setSuccess] = useState(false)
      const [item, setItem] = useState(initialVal)
      const [showForm, setShowForm] = useState(false)
      const inputref = useRef()
      // tambah item
      const addItem = (e) => {
         e.preventDefault()
         setListItem(prev => [...prev, item])
         inputref.current.focus()
         setItem(initialVal)
      }
      // submit request
      const submitRequest = () => {
         let confirm = window.confirm('Ajukan permohonan dengan daftar barang tersebut?')
         if(confirm){
            let request = {
               no_surat: $('.textsurat').text(),
               nrp,
               created_date: new Date().toLocaleDateString('fr-CA'),
               catatan,
               status: 1
            }
            request.daftar_item = listItem.map(it => ({...it, id_permohonan: ''}) )
            // post data
            $.ajax({
               url: `<?=base_url()?>/Laporanadm/new_permohonan`,
               method: 'POST',
               data: request,
               success: data => {
                  if(data > 0){
                     setSuccess(true)
                  }
               }
            })
         }
      }
      useEffect(() => {
         setTimeout(() => {
            $('#tdata').DataTable({
               destroy: true,
               data: listItem.sort((a, b) => a.nama_barang.localeCompare(b.nama_barang)),
               columns: [
                  { data: 'nama_barang', title: 'Nama Barang' },
                  { data: 'kuantitas', title: 'Kuantitas' },
                  { data: 'satuan', title: 'Satuan' },
                  { data: 'agenda', title: 'Nama Agenda' },
                  { data: 'agenda_date', title: 'Tanggal Agenda' },
                  { data: 'agenda', title: 'Action', render: data => {
                     return `<i title="Hapus Barang / Item" class="fa-solid fa-trash reds"></i>`
                  } },
               ],
               createdRow: function(data, row){
                  $(data).off().on('click', () => {
                     setListItem(prev => [...prev].filter(it => it.agenda != row.agenda && it.nama_barang != row.nama_barang))
                  })
               }
            })
         }, 200)
      }, [listItem])
      return (
         <div className="wrappers">
            { /* pesan berhasil simpan pengajuan */
               success ? (
                  <div className="loadingbox">
                     <div>
                        <h5>Berhasil Disimpan</h5>
                        <p>Permohon berhasil di-submit, Terima kasih.</p>
                        <a href="<?=base_url()?>Laporanadm">Selesai</a>
                     </div>
                  </div>
               ) : false
            }
            <div className="header">
               <h3><i className="fa-solid fa-cart-plus"></i> Pengajuan Baru </h3>
            </div>
            <div className="box">
               <h4>Informasi Permohonan</h4>
               <div className="nosurat">
                  <p className="textsurat">{parseInt(id)+1}/HCGA/PPA-GRYA/RKB/{getMonth(new Date().getMonth() + 1)}/{new Date().getFullYear()}</p>
               </div>
               <div className="flex">
                  <div className="formsec">
                     <label>Catatan Permohonan</label>
                     <input
                        type="text"
                        value={catatan}
                        onChange={e => setCatatan(e.target.value)}
                        placeholder="e.g. Barang diantar ke Main Office"
                     />
                  </div>
               </div>
               <div className="listitemarea">
                  <div className="tiitem">
                     <div>
                        <h5>Daftar Item</h5>
                        <p className="blurs">
                           { /* tampilkan info barang yang ditambahkan */
                              listItem.length ? `Anda telah menambahkan ${listItem.length} barang.` : 'Anda belum menambahkan item / barang apapun.'
                           }
                        </p>
                     </div>
                     {showForm ? false : (
                        <button className="green" onClick={() => {
                           setShowForm(true)
                           setTimeout(() => inputref.current.focus(), 500)
                        }}><i className="fa-solid fa-plus"></i> Tambah Barang</button>
                     )}
                  </div>
                  { /* tampilkan form tambah barang */
                     showForm ? (
                        <form className="formtambah">
                           <div className="flex">
                              <div className="formsec">
                                 <label>Nama Barang</label>
                                 <input
                                    type="text"
                                    ref={inputref}
                                    required
                                    name="nama"
                                    value={item.nama_barang || ''}
                                    placeholder="e.g. Air Mineral"
                                    onChange={e => setItem(prev => ({ ...prev, nama_barang: e.target.value }))}
                                 />
                              </div>
                              <div className="formsec">
                                 <label>Kuantitas / Jumlah </label>
                                 <input
                                    required
                                    type="number"
                                    value={item.kuantitas || ''}
                                    placeholder="e.g. 1"
                                    onChange={e => setItem(prev => ({ ...prev, kuantitas: e.target.value }))}
                                 />
                              </div>
                              <div className="formsec">
                                 <label>Satuan</label>
                                 <input
                                    required
                                    type="text"
                                    value={item.satuan || ''}
                                    placeholder="e.g. Dus"
                                    onChange={e => setItem(prev => ({ ...prev, satuan: e.target.value }))}
                                 />
                              </div>
                           </div>
                           <div className="flex mt">
                              <div className="formsec">
                                 <label>Agenda</label>
                                 <input
                                    type="text"
                                    value={item.agenda || ''}
                                    placeholder="e.g. Meeting Bulanan"
                                    onChange={e => setItem(prev => ({ ...prev, agenda: e.target.value }))}
                                 />
                              </div>
                              <div className="formsec">
                                 <label>Tanggal Agenda</label>
                                 <input
                                    type="date"
                                    placeholder="e.g. Meeting Bulanan"
                                    value={item.agenda_date || ''}
                                    onChange={e => setItem(prev => ({ ...prev, agenda_date: e.target.value }))}
                                 />
                              </div>
                           </div>
                           <div className="tiitem buttons">
                              <a href="#" onClick={() => {
                                 setShowForm(false)
                                 setItem(initialVal)
                              }}>Batal</a>
                              <button onClick={addItem}>Tambah</button>
                           </div>
                        </form>
                     ) : false
                  }
                  <div className="twrapper">
                     <table id="tdata"></table>
                  </div>
               </div>
               { /* tombol selesaikan pengajuan ketika item ada, minimal 1 */
                  listItem.length ? (
                     <div className="tiitem flexright">
                        <button onClick={submitRequest}>Selesaikan Pengajuan</button>
                     </div>
                  ) : false
               }
            </div>
         </div>
      )
   }
   const el = document.querySelector('#apps')
   const root = ReactDOM.createRoot(el)
   root.render(<App />)

   function getMonth(param) {
      let month
      if (param == 1) {
         month = 'I'
      } else if (param == 2) {
         month = 'II'
      } else if (param == 3) {
         month = 'III'
      } else if (param == 4) {
         month = 'IV'
      } else if (param == 5) {
         month = 'V'
      } else if (param == 6) {
         month = 'VI'
      } else if (param == 7) {
         month = 'VII'
      } else if (param == 8) {
         month = 'VIII'
      } else if (param == 9) {
         month = 'IX'
      } else if (param == 10) {
         month = 'X'
      } else if (param == 11) {
         month = 'XI'
      } else if (param == 12) {
         month = 'XII'
      }
      return month
   }
</script>
<!-- all line chart activation -->
<script src="<?= base_url('')?>assets/js/line-chart.js"></script>
<!-- all bar chart activation -->
<script src="<?= base_url('')?>assets/js/bar-chart.js"></script>
<!-- all pie chart -->
<script src="<?= base_url('')?>assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="<?= base_url('')?>assets/js/plugins.js"></script>
<script src="<?= base_url('')?>assets/js/scripts.js"></script>