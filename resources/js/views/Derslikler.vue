<template>
          <CCard>
          <CCardHeader>
            Derslikler
            <div class="card-header-actions">
              <CButton type="submit" color="dark">Derslik Ekle</CButton>
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
    <tr>
      <td>C-2</td>
      <td>Laboratuvar</td>
      <td>
        <CButtonGroup>
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
        </CButtonGroup>
      </td>
    </tr>
    <tr>
      <td>A-1</td>
      <td>Sınıf</td>
      <td>
        <CButtonGroup>
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
          <CButton type="submit" color="info">Düzenle</CButton>
          <CButton type="submit" color="danger">Sil</CButton>
        </CButtonGroup>
      </td>
    </tr>
  </tbody>
</table>
       </CCardBody>
        </CCard>
</template>

<script>
export default {

}
</script>

<style>

</style>