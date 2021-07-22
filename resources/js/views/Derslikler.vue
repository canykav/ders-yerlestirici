<template>
<div>
        <CAlert :show.sync="dismissCountDown" closeButton color="success">
          {{message}}
        </CAlert>
          <CCard>
          <CCardHeader>
            Derslikler
            <div class="card-header-actions">
              <CButton type="submit" color="dark" @click="derslikEkleModal=true;">Derslik Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Derslik Adı</th>
      <th scope="col">Türü</th>
      <th scope="col" style="width:187px">İşlem</th>
    </tr>
  </thead>
    <tbody>
    <tr v-for="derslik in derslikler" :key="derslik.id">
      <td>{{derslik.ad}}</td>
      <td>{{derslik.tur}}</td>
      <td>
        <CButtonGroup>
          <CButton color="info" @click="showDerslikDuzenleModal(derslik)">
            <CIcon name="cil-pencil"/>
          </CButton>
          <CButton color="danger" @click="showDerslikSilModal(derslik)">
              <CIcon :content="$options.trash"/>
          </CButton>
        </CButtonGroup>
      </td>
    </tr>
  </tbody>
</table>
       </CCardBody>
        </CCard>
      <form @submit.prevent="createDerslik()" id="createDerslikForm">
      <CModal
      title="Yeni Derslik"
      size="sm"
      :show.sync="derslikEkleModal"
    >
          <CInput
            label="Derslik Adı"
            :value.sync="yeniDerslik.ad"
            required
          />
          <CSelect
            label="Türü"
            :options="['Sınıf', 'Laboratuvar']"
            placeholder="Seçiniz"
            :value.sync="yeniDerslik.tur"
            required
          />
            <template #footer>
        <CButton @click="derslikEkleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="createDerslikForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
        </form>

              <form @submit.prevent="updateDerslik()" id="updateDerslikForm">
      <CModal
      title="Derslik Güncelle"
      size="sm"
      :show.sync="derslikGuncelleModal"
    >
          <CInput
            label="Derslik Adı"
            :value.sync="processedDerslik.ad"
            required
          />
          <CSelect
            label="Türü"
            :options="['Sınıf', 'Laboratuvar']"
            placeholder="Seçiniz"
            :value.sync="processedDerslik.tur"
            required
          />
            <template #footer>
        <CButton @click="derslikGuncelleModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="updateDerslikForm" type="submit" color="primary">Kaydet</CButton>
      </template>
    </CModal>
        </form>

      <form @submit.prevent="deleteDerslik()" id="deleteDerslikForm">
      <CModal
        title="Derslik Silme"
        size="sm"
        color="danger"
        :show.sync="derslikSilModal"
      >
         {{processedDerslik.ad}} dersliği silinecektir. Emin misiniz?
      <template #footer>
        <CButton @click="derslikSilModal = false" color="secondary">Vazgeç</CButton>
        <CButton form="deleteDerslikForm" type="submit" color="danger">Sil</CButton>
      </template>
    </CModal>
    </form>
    </div>
</template>

<script>
import { cilTrash, cilZoom, cilCursor } from '@coreui/icons'
export default {
  trash: cilTrash,
  zoom: cilZoom,
  cursor: cilCursor,
  data() {
    return {
      derslikEkleModal: false,
      derslikGuncelleModal: false,
      derslikSilModal: false,
      derslikler: {},
      yeniDerslik: {},
      message: null,
      dismissSecs: 5,
      dismissCountDown: 0,
      processedDerslik: {},
    }
  },
   mounted() {
    this.listDerslikler();
  },
  methods: {
    createDerslik(){
      axios.post('/api/derslikler', {
        ad: this.yeniDerslik.ad,
        tur: this.yeniDerslik.tur,
      })
          .then(response => {
            this.listDerslikler();
            this.derslikEkleModal=false;
            this.message = 'Derslik başarıyla eklendi.';
            this.showAlert();
            this.yeniDerslik = {};
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    listDerslikler() {
    axios.get('/api/derslikler')
        .then(response => {
            this.derslikler = response.data.data;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },
    showDerslikDuzenleModal(derslik){
     Object.assign(this.processedDerslik, derslik);
     this.derslikGuncelleModal = true;
    },
    updateDerslik(){
      axios.put('/api/derslikler/'+this.processedDerslik.id, {
        ad: this.processedDerslik.ad,
        tur: this.processedDerslik.tur
      })
      .then(response => {
          this.listDerslikler();
          this.derslikGuncelleModal = false;
          this.processedDerslik = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    deleteDerslik(){
      axios.delete('/api/derslikler/'+this.processedDerslik.id)
      .then(response => {
        this.listDerslikler();
        this.derslikSilModal=false;
        this.processedDerslik = {};
      })
      .catch(error => {
        console.log(error.response.data);
      });
    },
    showAlert(){
      this.dismissCountDown = this.dismissSecs;
    },
    showDerslikSilModal(derslik) {
      Object.assign(this.processedDerslik, derslik);
      this.derslikSilModal = true;
    }
  }
}
</script>

<style>

</style>


