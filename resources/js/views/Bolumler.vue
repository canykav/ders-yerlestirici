<template>
<div>
      <CAlert :show.sync="dismissCountDown" closeButton color="success">
        {{message}}
      </CAlert>
               <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Bölümler
           <div class="card-header-actions">
              <CButton type="submit" color="dark" @click="bolumEkleModal=true;">Bölüm Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>
            <div class="table-responsive">
                <!--<CRow>
                    <CCol :col="8">
                        <CInput placeholder="Bölüm Ara.."/>
                    </CCol>
                    <CCol :col="4" class="pl-0">
                        <CSelect
                            placeholder="Öğretim"
                            :options="ogretim"
                        />
                    </CCol>
                </CRow>-->
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Bölüm Adı</th>
      <th scope="col">Öğretim</th>
      <th scope="col" style="width:150px">İşlem</th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="bolum in bolumler" :key="bolum.id" v-bind:id="'bolum-'+bolum.id">
      <td>{{bolum.ad}}</td>
      <td>{{bolum.ogretim}}</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="dark" title="Seç ve Görüntüle" @click="listBolumDersleri(bolum.id)"><CIcon :content="$options.zoom"/></CButton>
          <CButton type="submit" color="info" title="Düzenle" @click="showBolumDuzenleModal(bolum)"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger" title="Sil" @click="showBolumSilModal(bolum)"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td>
    </tr>
  </tbody>
</table>
</div>
          </CCardBody>
        </CCard>
      </CCol>

      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Bölüm Dersleri
            <div class="card-header-actions" v-if="selectedBolum!=null">
              <CButton type="submit" color="dark" @click="dersEkleModal=true;">Bölüme Ders Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>
          <CAlert v-if="selectedBolum==null" show color="primary" class="d-flex flex-column justify-content-center align-items-center">
            <CIcon :content="$options.zoom" height="42px" class="mb-1"/>
            Seçtiğiniz bölümün dersleri burada görüntülecektir.
          </CAlert>
                <div class="table-responsive" v-if="selectedBolum!=null" style="position:relative;">
                    <div v-if="derslerTableIsLoading==true" class="table-loading" style="width:100%;height:100%;position:absolute;background: #ffffff78; z-index: 500;">
                    <div class="spinner-border" role="status" style="position:absolute;top: calc(50% - 21px); left: calc(50% - 21px);">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
<table class="table table-bordered" v-if="selectedBolumContent.length>0">
  <thead>
    <tr>
      <th scope="col">Ders Kodu</th>
      <th scope="col">Ders</th>
      <th scope="col">Teorik</th>
      <th scope="col">Uygulama</th>
      <th scope="col">Öğretmen</th>
      <th scope="col" style="width:108px">İşlem</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="ders in selectedBolumContent">
      <td>{{ders.kod}}</td>
      <td>{{ders.ad}}</td>
      <td>{{ders.teorik}}</td>
      <td>{{ders.lab}}</td>
      <td>{{ders.ogretmen_adi}}</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="info" title="Düzenle" @click="showDersDuzenleModal(ders)"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger" title="Sil" @click="showDersSilModal(ders)"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td>
    </tr>
  </tbody>
</table>
          <CAlert v-if="selectedBolumContent.length==0" show color="dark" class="d-flex flex-column justify-content-center align-items-center">
            <CIcon :content="$options.sad" height="42px" class="mb-1"/>
            Seçtiğiniz bölüme ait ders bulunamadı.
          </CAlert>
</div>
       </CCardBody>
        </CCard>
      </CCol>
    </CRow>

      <form @submit.prevent="createBolum()" id="createBolumForm">
         <CModal
      title="Yeni Bölüm"
      size="sm"
      :show.sync="bolumEkleModal"
      >
          <CInput
            label="Bölüm Adı"
            :value.sync="yeniBolum.ad"
            required
          />
          <CSelect
            label="Öğretim"
            :options="['Örgün Öğretim', 'İkinci Öğretim']"
            placeholder="Seçiniz"
            :value.sync="yeniBolum.ogretim"
            required
          />
      <template #footer>
        <CButton @click="bolumEkleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="createBolumForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
    </form>

      <form @submit.prevent="createDers()" id="createDersForm">
      <CModal
        title="Yeni Ders"
        size="sm"
        :show.sync="dersEkleModal"
      >
                <CInput
            label="Ders Kodu"
            :value.sync="yeniDers.kod"
            required
          />
          <CInput
            label="Ders Adı"
            :value.sync="yeniDers.ad"
            required
          />
          <div class="form-group">
            <label>Öğretmen</label>
            <select class="form-control" v-model="yeniDers.ogretmen" required>
              <option v-if="ogretmenler.length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="ogretmenler.length==0" :value="undefined" selected hidden>Listelenecek öğretmen bulunamadı</option>
              <option v-for="ogretmen in ogretmenler" :key="ogretmen.id" :value="ogretmen.id">{{ogretmen.ad}}</option>
            </select>
          </div>
          <CInput
            label="Teorik Ders saati"
            type="number"
            :value.sync="yeniDers.teorik"
            required
          />
          <div class="form-group">
            <label>Teorik Dersliği</label>
            <select class="form-control" v-model="yeniDers.teorik_derslik">
              <option v-if="derslikler['sinif'].length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="derslikler['sinif'].length==0" :value="undefined" selected hidden>Listelenecek derslik bulunamadı</option>
              <option v-for="derslik in derslikler['sinif']" :key="derslik.id" :value="derslik.id">{{derslik.ad}}</option>
            </select>
          </div>
          <CInput
            label="Laboratuvar Ders saati"
            type="number"
            :value.sync="yeniDers.lab"
            required
          />
          <div class="form-group">
            <label>Laboratuvar Dersliği</label>
            <select class="form-control" v-model="yeniDers.lab_derslik">
              <option v-if="derslikler['laboratuvar'].length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="derslikler['laboratuvar'].length==0" :value="undefined" selected hidden>Listelenecek derslik bulunamadı</option>
              <option v-for="derslik in derslikler['laboratuvar']" :key="derslik.id" :value="derslik.id">{{derslik.ad}}</option>
            </select>
          </div>
      <template #footer>
        <CButton @click="dersEkleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="createDersForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
    </form>

 <form @submit.prevent="updateBolum()" id="updateBolumForm">
      <CModal
        title="Bölüm Düzenleme"
        size="sm"
        :show.sync="bolumDuzenleModal"
      >
      <CInput
        label="Bölüm Adı"
        :value.sync="processedBolum.ad"
        required
      />
      <CSelect
        label="Öğretim"
        :options="['Örgün Öğretim', 'İkinci Öğretim']"
        placeholder="Seçiniz"
        :value.sync="processedBolum.ogretim"
        required
      />
      <template #footer>
        <CButton @click="bolumDuzenleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="updateBolumForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
    </form>

    <form @submit.prevent="updateDers()" id="updateDersForm">
        <CModal
            title="Ders Düzenleme"
            size="sm"
            :show.sync="dersDuzenleModal"
        >
        <CInput
                label="Ders Kodu"
                :value.sync="processedDers.kod"
                required
            />
        <CInput
            label="Ders Adı"
            :value.sync="processedDers.ad"
            required
        />


        <div class="form-group">
           <label>Öğretmen</label>
           <select class="form-control" v-model="processedDers.ogretmen" required>
              <option v-if="ogretmenler.length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="ogretmenler.length==0" :value="undefined" selected hidden>Listelenecek öğretmen bulunamadı</option>
              <option v-for="ogretmen in ogretmenler" :key="ogretmen.id" :value="ogretmen.id">{{ogretmen.ad}}</option>
            </select>
        </div>
          <CInput
            label="Teorik Ders saati"
            type="number"
            :value.sync="processedDers.teorik"
            required
          />
          <div class="form-group">
            <label>Teorik Dersliği</label>
            <select class="form-control" v-model="processedDers.teorik_derslik">
              <option v-if="derslikler['sinif'].length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="derslikler['sinif'].length==0" :value="undefined" selected hidden>Listelenecek derslik bulunamadı</option>
              <option v-for="derslik in derslikler['sinif']" :key="derslik.id" :value="derslik.id">{{derslik.ad}}</option>
            </select>
          </div>
          <CInput
            label="Laboratuvar Ders saati"
            type="number"
            :value.sync="processedDers.lab"
            required
          />
          <div class="form-group">
            <label>Laboratuvar Dersliği</label>
            <select class="form-control" v-model="processedDers.lab_derslik">
              <option v-if="derslikler['laboratuvar'].length!=0" :value="undefined" selected hidden>Seçiniz</option>
              <option v-if="derslikler['laboratuvar'].length==0" :value="undefined" selected hidden>Listelenecek derslik bulunamadı</option>
              <option v-for="derslik in derslikler['laboratuvar']" :key="derslik.id" :value="derslik.id">{{derslik.ad}}</option>
            </select>
          </div>

      <template #footer>
        <CButton @click="dersDuzenleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="updateDersForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
    </form>


     <form @submit.prevent="deleteBolum()" id="deleteBolumForm">
      <CModal
        title="Bölüm Silme"
        size="sm"
        color="danger"
        :show.sync="bolumSilModal"
      >
         {{processedBolum.ad}} ({{processedBolum.ogretim}}) Bölümü dersleriyle beraber silinecektir. Emin misiniz?
      <template #footer>
        <CButton @click="bolumSilModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="deleteBolumForm" type="submit" color="danger">Sil</CButton>
      </template>
    </CModal>
    </form>

<form @submit.prevent="deleteDers()" id="deleteDersForm">
      <CModal
        title="Ders Silme"
        size="sm"
        color="danger"
        :show.sync="dersSilModal"
      >
         {{processedDers.ad}} dersi silinecektir. Emin misiniz?
      <template #footer>
        <CButton @click="dersSilModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="deleteDersForm" type="submit" color="danger">Sil</CButton>
      </template>
    </CModal>
    </form>


    </div>
</template>



<script>
import { cilTrash, cilZoom, cilSad } from '@coreui/icons'
export default {
  trash: cilTrash,
  zoom: cilZoom,
  sad: cilSad,
  data(){
      return {
        bolumEkleModal: false,
        dersEkleModal: false,
        bolumDuzenleModal: false,
        bolumSilModal: false,
        selectedBolum: null,
        processedBolum: {},
        selectedBolumContent: {},
        ogretmenler: null,
        derslikler: {sinif: [], laboratuvar: [],},
        bolumler: {},
        yeniBolum: {},
        yeniDers: {},
        message: null,
        dismissSecs: 5,
        dismissCountDown: 0,
        dersSilModal: false,
        dersDuzenleModal: false,
        processedDers: {},
        derslerTableIsLoading: false,
        ogretim: [
            'Tümü','Örgün Öğretim','İkinci Öğretim'
        ],
      }
  },
  mounted() {
    this.listBolumler();
    this.listOgretmenler();
    this.listDerslikler();
  },
  methods: {
    createBolum(){
      axios.post('/api/bolumler', {
        ad: this.yeniBolum.ad,
        ogretim: this.yeniBolum.ogretim,
      })
          .then(response => {
              this.listBolumler();
              this.bolumEkleModal=false;
              this.message = 'Bölüm başarıyla eklendi.';
              this.showAlert();
              this.yeniBolum = {};
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    listBolumler() {
      axios.get('/api/bolumler')
          .then(response => {
              this.bolumler = response.data.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    listOgretmenler() {
      axios.get('/api/ogretmenler')
          .then(response => {
              this.ogretmenler = response.data.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    listDerslikler() {
      axios.get('/api/derslikler', {
        params: {
          seperate: 1
        }
      })
      .then(response => {
          this.derslikler = response.data.data;
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    showAlert(){
      this.dismissCountDown = this.dismissSecs;
    },
    showBolumDuzenleModal(bolum){
      Object.assign(this.processedBolum, bolum);
      this.bolumDuzenleModal=true;
    },
    updateBolum(){
      axios.put('/api/bolumler/'+this.processedBolum.id, {
        ad: this.processedBolum.ad,
        ogretim: this.processedBolum.ogretim
      })
      .then(response => {
          this.listBolumler();
          this.bolumDuzenleModal=false;
          this.processedBolum = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    showBolumSilModal(bolum){
      Object.assign(this.processedBolum, bolum);
      this.bolumSilModal=true;
    },

    showDersSilModal(ders){
      Object.assign(this.processedDers, ders);
      this.dersSilModal=true;
    },

    deleteBolum(){
      axios.delete('/api/bolumler/'+this.processedBolum.id)
      .then(response => {
        this.listBolumler();
        this.bolumSilModal=false;
        if(this.processedBolum.id==this.selectedBolum) {
          this.selectedBolum = null;
          this.selectedBolumContent= null;
        }
        this.processedBolum = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },

deleteDers(){
      axios.delete('/api/dersler/'+this.processedDers.id)
      .then(response => {
        this.listBolumDersleri(this.processedDers.bolum);
        this.dersSilModal=false;
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },


updateDers(){
      axios.put('/api/dersler/'+this.processedDers.id, {
        kod: this.processedDers.kod,
        ad: this.processedDers.ad,
        ogretmen: this.processedDers.ogretmen,
        teorik: this.processedDers.teorik,
        teorik_derslik: this.processedDers.teorik_derslik,
        lab: this.processedDers.lab,
        lab_derslik: this.processedDers.lab_derslik,
      })
      .then(response => {
          this.listBolumDersleri(this.processedDers.bolum);
          this.dersDuzenleModal=false;
          this.processedDers = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    showDersDuzenleModal(ders){
      Object.assign(this.processedDers, ders);
      this.dersDuzenleModal=true;
    },

    listBolumDersleri(bolum){
        this.derslerTableIsLoading = true;
        if(this.selectedBolum){
            document.getElementById('bolum-'+this.selectedBolum).style.backgroundColor = "#ffffff";
        }
      document.getElementById('bolum-'+bolum).style.backgroundColor = "#00001513";
      this.selectedBolum = bolum;
      axios.get('/api/dersler/', {
        params: {
          bolum: bolum
        }
      })
      .then(response => {
          this.selectedBolumContent = response.data.data;
          this.derslerTableIsLoading = false;
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    createDers(){
      axios.post('/api/dersler', {
        bolum: this.selectedBolum,
        kod: this.yeniDers.kod,
        ad: this.yeniDers.ad,
        ogretmen: this.yeniDers.ogretmen,
        teorik: this.yeniDers.teorik,
        teorik_derslik: this.yeniDers.teorik_derslik,
        lab: this.yeniDers.lab,
        lab_derslik: this.yeniDers.lab_derslik,
      })
      .then(response => {
          this.dersEkleModal=false;
          this.listBolumDersleri(this.selectedBolum);
          this.message = 'Ders başarıyla eklendi.';
          this.showAlert();
          this.yeniDers = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
  }
}
</script>

<style>

</style>
