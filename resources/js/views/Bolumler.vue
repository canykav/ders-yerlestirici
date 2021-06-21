<template>
               <CRow>
      <CCol sm="6">
        <CCard>
          <CCardHeader>
            Bölümler
           <div class="card-header-actions">
              <CButton type="submit" color="dark">Bölüm Ekle</CButton>
            </div>
          </CCardHeader>
          <CCardBody>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Bölüm Adı</th>
      <th scope="col">Öğretim</th>
      <th scope="col" style="width:187px">İşlem</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="dark">Seç</CButton>
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
        </CButtonGroup>
      </td>
    </tr>
    <tr>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="dark">Seç</CButton>
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
        </CButtonGroup>
      </td>
    </tr>
    <tr>
      <td>Larry</td>
      <td>the Bird</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="dark">Seç</CButton>
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
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

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Ders Kodu</th>
      <th scope="col">Ders</th>
      <th scope="col">Teorik</th>
      <th scope="col">Uygulama</th>
      <th scope="col">Öğretmen</th>
      <th scope="col">İşlem</th>
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
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
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
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
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
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
        </CButtonGroup>
      </td> 
    </tr>
  </tbody>
</table>
       </CCardBody>
        </CCard>
      </CCol>

    </CRow>
</template>

<script>
import CTableWrapper from './base/Table.vue'
import usersData from './users/UsersData'

export default {
    components: { CTableWrapper },
data(){
    return {
        ogretmenler: [{'ad':'Zekeriya Filiz'}],
    }
},
methods:{
      getShuffledUsersData () {
      return this.shuffleArray(usersData.slice(0))
    },
        shuffleArray (array) {
      for (let i = array.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1))
        let temp = array[i]
        array[i] = array[j]
        array[j] = temp
      }
      return array
    },
}
}
</script>

<style>

</style>