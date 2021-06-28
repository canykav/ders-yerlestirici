<template>
<div>
            <CAlert
              :key="error"
              v-for="error in errors"
              :show.sync="dismissCountDown"
              closeButton
              color="danger"
            >
              {{error[0]}}
            </CAlert>
      <CRow>
      <CCol sm="6">
                <CCard>
          <CCardHeader>
            Ders Günleri
          </CCardHeader>
          <CCardBody>
          <form @submit.prevent="createGun()">
<div class="table-responsive">
              <table  v-if='kayitliGunler==false' class="table table-bordered table-sm" style="border-top:none;">            
               <tbody>
                <tr>
                  <td :key="gun" v-for="gun in tumGunler">
                    <div class="ml-4">
                    <input type="checkbox" class="form-check-input" v-model="gunler[gun]">
                    <label class="form-check-label"> {{gun}} </label>
                    </div>
                  </td>
                </tr>
              </tbody>
              </table>
              <span v-if='kayitliGunler==true'>Eklenen günler tabloda listelenmektedir.</span>
              </div>

              <div class="form-actions mt-3">
                <CButton
                  type="submit"
                  color="info" 
                  v-if="kayitliGunler==false"
                >
                Kaydet
                </CButton>

                <CButton 
                  color="danger" 
                  v-if="kayitliGunler==true"
                  @click="resetGunler()"
                >
                Sıfırla
                </CButton>
              </div>
            </form>
          </CCardBody>
        </CCard>

        <CCard>
          <CCardHeader>
            Ders Saatleri
          </CCardHeader>
          <CCardBody>
            
          <form @submit.prevent="createSaat()">
              <CSelect
                label="Öğretim"
                horizontal
                :options="ogretim"
                placeholder="Seçiniz"
                :value.sync="saat.ogretim"
              />

                <CInput
                  label="Ders Başlangıcı"
                  horizontal
                  type="time"
                  v-model="saat.baslangic"
                />
                  <CInput
                  label="Ders Bitişi"
                  horizontal
                  type="time"
                  v-model="saat.bitis"
                />
             <div class="form-actions">
                  <CButton type="submit" color="info">Ekle</CButton>
                </div>
            </form>
          </CCardBody>
        </CCard>
      </CCol>
          
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Eklenen Ders Saatleri
          </CCardHeader>
          <CCardBody>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th scope="col" v-for="gun in gunler" :key="gun.id">{{gun.gun}}</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(saat, saatIndex) in gunlerVeSaatler">
      <td>{{saat.baslangic}} - {{saat.bitis}}</td>
      <td v-if="saat[0]!=null" v-bind:class=" { 'bg-success': saat[0]!=0, 'bg-danger': saat[0]==0 }" :value="saat[0]"></td>
      <td v-if="saat[1]!=null" v-bind:class=" { 'bg-success': saat[1]!=0, 'bg-danger': saat[1]==0 }" :value="saat[1]"></td>
      <td v-if="saat[2]!=null" v-bind:class=" { 'bg-success': saat[2]!=0, 'bg-danger': saat[2]==0 }" :value="saat[2]"></td>
      <td v-if="saat[3]!=null" v-bind:class=" { 'bg-success': saat[3]!=0, 'bg-danger': saat[3]==0 }" :value="saat[3]"></td>
      <td v-if="saat[4]!=null" v-bind:class=" { 'bg-success': saat[4]!=0, 'bg-danger': saat[4]==0 }" :value="saat[4]"></td>
      <td v-if="saat[5]!=null" v-bind:class=" { 'bg-success': saat[5]!=0, 'bg-danger': saat[5]==0 }" :value="saat[5]"></td>
      <td v-if="saat[6]!=null" v-bind:class=" { 'bg-success': saat[6]!=0, 'bg-danger': saat[6]==0 }" :value="saat[6]"></td>
    </tr>
  </tbody>
</table>

       </CCardBody>
        </CCard>
      </CCol>

    </CRow>
</div>
</template>

<script>


export default {    
    data() {
        return {
          ogretim: [
              'Örgün Öğretim','İkinci Öğretim'
          ],
          tumGunler: [
              'Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar'
            ],
          gunler: {},
          kayitliGunler: {},
          gunlerVeSaatler: null,
          saat: {
            gun: {},
            baslangic: null,
            bitis: null,
            ogretim: null,
          },
          errors: null,
          dismissSecs: 5,
          dismissCountDown: 5,
        }      
    },
    mounted() {
      this.ListSaatler();
      this.ListGunler();
    },
    methods: {
      createGun(){
        axios.post('/api/gunler',{
                gun: this.gunler,
            })
            .then(response => {
                this.ListGunler();
            })
            .catch(error => {
              this.errors = error.response.data.errors;
              this.showAlert();
            });
      },
      resetGunler(){
        axios.delete('/api/gunler')
            .then(response => {
                this.ListGunler();
                this.ListSaatler();
            })
            .catch(error => {
              this.errors = error.response.data.errors;
              this.showAlert();
            });
            this.gunler = {};
      },
      createSaat() {
        axios.post('/api/saatler',{
                ogretim: this.saat.ogretim,
                baslangic: this.saat.baslangic,
                bitis: this.saat.bitis,
            })
            .then(response => {
                this.saat.baslangic=null;
                this.saat.bitis=null;
            })
            .catch(error => {
				      console.log(error.response.data);
              this.errors = error.response.data.errors;
              this.showAlert();
            })
            .then( () => {
                this.ListSaatler();
            });
      },
      ListSaatler() {
        axios.get('/api/saatler')
            .then(response => {
                this.gunlerVeSaatler = response.data.data;
            })
            .catch(error => {
				      console.log(error.response.data);
            });
      },
      ListGunler() {
      axios.get('/api/gunler')
            .then(response => {
                console.log(response);
                if(response.status==204) {
                  this.kayitliGunler=false;
                } else {
                  this.kayitliGunler=true;
                  this.gunler=response.data;
                }
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

<style scoped>
.form-check-input {
  position:unset!important;
}
</style>