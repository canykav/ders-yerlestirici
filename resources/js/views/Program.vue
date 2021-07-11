<template>
<div>
            <CAlert :show.sync="dismissCountDown" closeButton color="success">
              {{message}}
            </CAlert>
          <CRow>
          <CCol sm="3">
                    <CCard>
          <CCardHeader>
            Ders Programı
          </CCardHeader>
          <CCardBody>
            <div class="form-group">
            <label>Bölümler</label>
            <select class="custom-select" size="4" @click="listProgram($event.target.value.replace(/[^a-z][0-9]/g, ''), $event.target.value.replace( /^\D+/g, ''))" v-model="selected">
              <option v-for="bolum in bolumler" :key="bolum.id" :value="'bolum-'+bolum.id">{{bolum.ad}}-{{bolum.ogretim}}</option>
            </select>
          </div>
            <div class="form-group">
            <label>Öğretmenler</label>
            <select class="custom-select" size="4" v-model="selected" @click="listProgram($event.target.value.replace(/[^a-z][0-9]/g, ''), $event.target.value.replace( /^\D+/g, ''))"> 
              <option v-for="ogretmen in ogretmenler" :key="ogretmen.id" :value="'ogretmen-'+ogretmen.id">{{ogretmen.ad}}</option>
            </select>
          </div>
            <div class="form-group">
            <label>Derslikler</label>
            <select class="custom-select" size="4" v-model="selected" @click="listProgram($event.target.value.replace(/[^a-z][0-9]/g, ''), $event.target.value.replace( /^\D+/g, ''))">
              <option v-for="derslik in derslikler" :key="derslik.id" :value="'derslik-'+derslik.id">{{derslik.ad}} ({{derslik.tur}})</option>
            </select>
          </div>
          </CCardBody>
        </CCard>

      </CCol>
            <CCol sm="9">
            <CCard>
          <CCardHeader>
            Ders Programı
          </CCardHeader>
          <CCardBody>
           <!-- <CButton color="info">
              Tamamlama Kontrolü
            </CButton>
            <CButton color="danger">
              Otomatik Yerleştir
            </CButton>-->
<table class="table table-bordered" v-if="program.length>0">
  <thead>
    <tr>
      <th style="width:160px">#</th>
      <th scope="col" v-for="gun in gunler" :key="gun.id">{{gun.gun}}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="ders in program">
      <td>{{ders.baslangic}} - {{ders.bitis}}</td>
      <td 
        v-for="(item, index) in 6" 
        :key="index"
        v-if="ders[index]!=null"
        v-bind:class=" { 'bg-dark': ders[index]==0 }"
        :value="ders[index]['saat']" 
        @click="showDersYerlestirModal(ders[index]['saat'])"
        @mouseover="hoverTable(ders[index]['saat'])"
        @mouseout="unHoverTable()"
        role="button"
        :id="'program-'+ders[index]['saat']"
      >
        <span v-if="ders[index].ders!==undefined">{{ders[index].ders['ad']}}</span><br/>
        <span v-if="ders[index].ogretmen!==undefined">{{ders[index].ogretmen['ad']}} / </span>
        <span v-if="ders[index].derslik!==undefined">{{ders[index].derslik['ad']}}</span>
      </td>      
    </tr>
  </tbody>
</table>
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
          ogretmenler: [],
          ogretmenEkleModal: false,
          yeniOgretmen: {},
          ogretmen: [],
          bolumler: {},
          gunler: [],
          message: null,
          dismissSecs: 5,
          dismissCountDown: 0,
          bolumDersleri: [],
          derslikler: [],
          selected: null,
          program: [],
          selectedSaat: "",
          hoveredCell: null,
      }
  },
  props: {
    selectedOgretmen: Number,
  },
  mounted() {
    this.listBolumler();
    this.listOgretmenler();
    this.listDerslikler();
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
    showAlert(){
      this.dismissCountDown = this.dismissSecs;
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
    listBolumDersleri(bolum){
      axios.get('/api/dersler/', {
        params: {
          bolum: bolum
        }
      })
      .then(response => {
          this.bolumDersleri = response.data.data;
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
    showDersYerlestirModal(val){
      this.selectedSaat = val;
    },
    listProgram(filter, id){
    axios.get('/api/program', {
      params: {
        filter: filter,
        id: id,
      }
    })
        .then(response => {
            this.program= null;
            this.program = response.data.data.saatler;
            this.gunler = response.data.data.gunler;
        })
        .catch(error => {
          console.log(error.response.data);
        });
    },  
    hoverTable(val){
      if(this.hoveredCell){
        document.getElementById(this.hoveredCell).removeAttribute('style');
      }
      document.getElementById('program-'+val).style.backgroundColor = "#00001513";
      this.hoveredCell = 'program-'+val;
    }   , 
    unHoverTable(){
        document.getElementById(this.hoveredCell).removeAttribute('style');
    }
  },
}
</script>

<style>

</style>