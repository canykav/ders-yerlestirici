<template>
<div>
            <CCard>
          <CCardHeader>
            Öğretmenler
            <div class="card-header-actions">
              <CButton type="submit" color="dark">Öğretmen Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>
              <div class="d-flex align-items-center justify-content-between">
            <CSelect
                :options="ogretmenler"
                placeholder="Öğretmen Seçiniz"
                style="width:100%"
            />
            <CButton
                type="submit" 
                color="danger" 
                style="margin-bottom: 16px;width: 150px;margin-left: 10px;"
            >
                Öğretmeni Sil
            </CButton>
</diV>
     
          </CCardBody>
        </CCard>
               <CRow>
      <CCol sm="6">
                <CCard>
          <CCardHeader>
            Öğretmen Bilgisi
          </CCardHeader>
          <CCardBody>
            <label>Girdiği Dersler</label>
            <select class="custom-select" multiple>
  <option selected>Görsel Programlama</option>
  <option value="1">Bilgisayarlar ve Network</option>
</select>

          <CRow>
              <CCol sm="6" class="mt-2">
                <CInput
                  label="Toplam Ders Saati"
                />
              </CCol>
                <CCol sm="6" class="mt-2">
                <CInput
                  label="Uygun Ders Saati"
                />
              </CCol>
            </CRow>
          </CCardBody>
        </CCard>
        
      </CCol>
          
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Öğretmenin Haftalık Programı
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
    </div>
</template>

<script>
export default {
data(){
    return {
        ogretmenler: ['Test'],
    }
}
}
</script>

<style>

</style>