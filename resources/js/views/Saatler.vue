<template>
      <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Ders Saati Ekle
          </CCardHeader>
          <CCardBody>
    
                <CRow form class="form-group" :key="name">
                  <CCol tag="label" sm="3" class="col-form-label">
                    Günler
                  </CCol>
                  <CCol sm="9" :class="key % 2 === 1 ? 'form-inline' : ''">
                    <CInputCheckbox
                      v-for="(option, optionIndex) in gunler"
                      :key="key + option"
                      :label="option"
                      :value="option"
                      :custom="key > 1"
                      :name="`Option 1${key}`"
                      :checked="optionIndex === key"
                      :inline="key % 2 === 1"
                    />
                  </CCol>
                </CRow>

              <CSelect
                label="Öğretim"
                horizontal
                :options="ogretim"
                placeholder="Seçiniz"
              />

                <CInput
                  label="Ders Başlangıcı"
                  horizontal
                  type="time"
                />
                  <CInput
                  label="Ders Bitişi"
                  horizontal
                  type="time"
                />
             <div class="form-actions">
                  <CButton type="submit" color="info">Ekle</CButton>
                </div>
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
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
       </CCardBody>
        </CCard>
      </CCol>

    </CRow>
</template>

<script>


export default {    
    data() {
        return {
            ogretim: [
                'Örgün Öğretim','İkinci Öğretim'
            ],
            gunler: [
                'Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi','Pazar'
            ],
            }      
    },
}
</script>

<style>

</style>