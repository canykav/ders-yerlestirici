<template>
<div>
            <CAlert :show.sync="dismissCountDown" closeButton color="success">
              {{message}}
            </CAlert>
            <CCard>
          <CCardHeader>
            Öğretmenler
            <div class="card-header-actions">
              <CButton type="submit" color="dark" @click="ogretmenEkleModal=true;">Öğretmen Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>
              <div class="d-flex align-items-center justify-content-between">

        <div class="form-group" style="width:100%">
          <select class="form-control" v-model="selectedOgretmen" @change="getOgretmenInfo(selectedOgretmen)">
            <option v-if="ogretmenler.length!=0" :value="undefined" selected hidden>Seçiniz</option>
            <option v-if="ogretmenler.length==0" :value="undefined" selected hidden>Listelenecek öğretmen bulunamadı</option>
            <option v-for="ogretmen in ogretmenler" :key="ogretmen.id" :value="ogretmen.id">{{ogretmen.ad}}</option>
          </select>
        </div>
            <CButton color="danger" style="margin-bottom: 16px;width: 150px;margin-left: 10px;" @click="deleteOgretmen()">
              Öğretmeni Sil
            </CButton>
</diV>
     
          </CCardBody>
        </CCard>
               <CRow>
      <CCol>
                <CCard>
          <CCardHeader>
            Öğretmen Bilgisi
          </CCardHeader>
          <CCardBody>
            <label>Girdiği Dersler</label>
            <select class="custom-select" size="4">
              <option v-for="ders in ogretmen.dersler" :key="ders.id" :value="ders.id">{{ders.ad}}</option>
            </select>

          <CRow>
              <CCol sm="6" class="mt-2">
                <CInput
                  label="Toplam Ders Saati"
                  :value="ogretmen.toplam_saat"
                  readonly
                />
              </CCol>
                <CCol sm="6" class="mt-2">
                <CInput
                  label="Uygun Ders Saati"
                  readonly
                />
              </CCol>
            </CRow>
          </CCardBody>
        </CCard>
        
      </CCol>
        
    </CRow>

      <form @submit.prevent="createOgretmen()" id="createOgretmenForm">
        <CModal
          title="Yeni Öğretmen"
          size="sm"
          :show.sync="ogretmenEkleModal"
        >
            <CInput
              label="Adı Soyadı"
              :value.sync="yeniOgretmen.ad"
              required
            />
              <template #footer>
          <CButton @click="ogretmenEkleModal = false" color="secondary">Vazgeç</CButton>
          <CButton form="createOgretmenForm" type="submit" color="primary">Kaydet</CButton>
        </template>
      </CModal>
    </form>

    </div>
</template>

<script>
export default {
  data(){
      return {
          ogretmenler: null,
          ogretmenEkleModal: false,
          yeniOgretmen: {},
          ogretmen: [],
          message: null,
          dismissSecs: 5,
          dismissCountDown: 0,
      }
  },
  props: {
    selectedOgretmen: Number,
  },
  mounted() {
    this.listOgretmenler();
  },
  methods: {
    listOgretmenler() {
      axios.get('/api/ogretmenler')
          .then(response => {
              this.ogretmenler = response.data.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });
    },
    deleteOgretmen() {
       axios.delete('/api/ogretmenler/'+this.selectedOgretmen)
          .then(response => {
              this.listOgretmenler();
              this.message = 'Öğretmen başarıyla silindi.';
              this.showAlert();
          })
          .catch(error => {
            console.log(error.response.data);
          });     
    },
    createOgretmen(){
      axios.post('/api/ogretmenler', {
        ad: this.yeniOgretmen.ad,
      })
          .then(response => {
              this.listOgretmenler();
              this.ogretmenEkleModal=false;
              this.message = 'Öğretmen başarıyla eklendi.';
              this.showAlert();
              this.yeniOgretmen = {};
          })
          .catch(error => {
            console.log(error.response.data);
          });      
    },
    getOgretmenInfo(ogretmen) {
      axios.get('/api/ogretmenler/'+ogretmen)
          .then(response => {
              this.ogretmen = response.data.data;
          })
          .catch(error => {
            console.log(error.response.data);
          });      
    },
    showAlert(){
      this.dismissCountDown = this.dismissSecs;
    }
  },
}
</script>

<style>

</style>