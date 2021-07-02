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
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Bölüm Adı</th>
      <th scope="col">Öğretim</th>
      <th scope="col" style="width:150px">İşlem</th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="bolum in bolumler" :key="bolum.id">
      <td>{{bolum.ad}}</td>
      <td>{{bolum.ogretim}}</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="dark" title="Seç ve Görüntüle"><CIcon :content="$options.zoom"/></CButton>
          <CButton type="submit" color="info" title="Düzenle"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger" title="Sil"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td>
    </tr>
  </tbody>
</table>

          
          </CCardBody>
        </CCard>
      </CCol>
          
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Seçili Bölüme Ait Dersler
            <div class="card-header-actions">
              <CButton type="submit" color="dark">Bölüme Ders Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>

<table class="table table-bordered table-hover">
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
    <tr>
      <th>1</th>
      <td>Veri Tabanı</td>
      <td>4</td>
      <td>0</td>
      <td>Nurcan Seylan</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="info"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td>      
    </tr>
    <tr>
      <th>1</th>
      <td>Veri Tabanı</td>
      <td>4</td>
      <td>0</td>
      <td>Nurcan Seylan</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="info"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td> 
    </tr>
    <tr>
      <th>1</th>
      <td>Veri Tabanı</td>
      <td>4</td>
      <td>0</td>
      <td>Nurcan Seylan</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="info"><CIcon name="cil-pencil"/></CButton>
          <CButton type="submit" color="danger"><CIcon :content="$options.trash"/></CButton>
        </CButtonGroup>
      </td> 
    </tr>
  </tbody>
</table>
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
    </div>
</template>

<script>
import CTableWrapper from './base/Table.vue'
import usersData from './users/UsersData'
import { cilTrash, cilZoom } from '@coreui/icons'
export default {
  trash: cilTrash,
  zoom: cilZoom,
  components: { CTableWrapper },
  data(){
      return {
          bolumEkleModal: false,
          bolumler: {},
          yeniBolum: {},
          message: null,
          dismissSecs: 5,
          dismissCountDown: 0,
      }
  },
  mounted() {
    this.listBolumler();
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
    showAlert(){
      this.dismissCountDown = this.dismissSecs;
    }
  }
}
</script>

<style>

</style>