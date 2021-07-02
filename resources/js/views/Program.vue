<template>
<div>
            <CAlert :show.sync="dismissCountDown" closeButton color="success">
              {{message}}
            </CAlert>
            <CCard>
          <CCardHeader>
            Ders Programı
          </CCardHeader>
          <CCardBody>

            <CButton color="info" @click="deleteOgretmen()">
              Tamamlama Kontrolü
            </CButton>
            <CButton color="danger" @click="deleteOgretmen()">
              Otomatik Yerleştir
            </CButton>
          </CCardBody>
        </CCard>
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
            <CInput
                label="Toplam Ders Saati"
                :value.sync="yeniOgretmen.toplamSaat"
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
       axios.delete('/api/ogretmenler', {
         params: {
           id: this.selectedOgretmen
         }
       })
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
        toplam_saat: this.yeniOgretmen.toplamSaat,
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